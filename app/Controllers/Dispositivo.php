<?php

namespace App\Controllers;

use App\Models\DispositivoModel;
use App\Models\CentroTechModel;

class Dispositivo extends BaseController
{
    public function index()
    {
        $model = model(DispositivoModel::class);
        $db = db_connect();

        try {

            $query = $db->query('call spListarDispositivos()');
            $data = $query->getResult();
    
            $dispositivos = json_decode(json_encode($data), true);
    
            return view('dispositivos/index', [
                'dispositivos' => $dispositivos,
                'modulo' => 'dispositivos',
            ]);

        } catch (Exception $ex) {
            throw $ex;
        } finally {
            $db->close();
        }
    }

    public function detalles($id) {
        try {

            $db = db_connect();

            $query = $db->query("call spListarDetallesDispositivo($id)");
            $data = $query->getResult();

            $dispositivo = json_decode(json_encode($data), true);

            return view('dispositivos/detalles', [
                'dispositivo' => $dispositivo[0],
                'modulo' => 'dispositivos',
            ]);

        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function agregar() {

        if ($this->request->getMethod() == 'post') {

            $model = model(DispositivoModel::class);

            $nombre = $this->request->getPost('nombre');
            $descripcion = $this->request->getPost('descripcion');
            $marca = $this->request->getPost('marca');
            $modelo = $this->request->getPost('modelo');
            $num_serie = $this->request->getPost('num_serie');
            $centro_tech_id = $this->request->getPost('centro_tech_id');
            $estado_dispositivo_id = 1;

            $data = [
                'nombre' => $nombre,
                'descripcion' => $descripcion,
                'marca' => $marca,
                'modelo' => $modelo,
                'num_serie' => $num_serie,
                'centro_tech_id' => $centro_tech_id,
                'estado_dispositivo_id' => $estado_dispositivo_id,
            ];

            if ($model->insert($data)) {
                return redirect()
                    ->back()
                    ->with('msg', [
                        'type' => 'success',
                        'content' => 'Dispositivo agregado satisfactoriamente',
                    ]);
            }

        }

        $centrosTechModel = model(CentroTechModel::class);

        $centrosTech = $centrosTechModel->findAll();

        return view('dispositivos/agregar', [
            'centrosTech' => $centrosTech,
            'modulo' => 'dispositivos',
        ]);

    }

    public function editar($id) {

        if ($this->request->getMethod() == 'post') {

            $model = model(DispositivoModel::class);

            $id = $this->request->getPost('id');
            $nombre = $this->request->getPost('nombre');
            $descripcion = $this->request->getPost('descripcion');
            $marca = $this->request->getPost('marca');
            $modelo = $this->request->getPost('modelo');
            $num_serie = $this->request->getPost('num_serie');
            $centro_tech_id = $this->request->getPost('centro_tech_id');
            $estado_dispositivo_id = $this->request->getPost('estado_dispositivo_id');

            $data = [
                'nombre' => $nombre,
                'descripcion' => $descripcion,
                'marca' => $marca,
                'modelo' => $modelo,
                'num_serie' => $num_serie,
                'centro_tech_id' => $centro_tech_id,
                'estado_dispositivo_id' => $estado_dispositivo_id,
            ];

            if ($model->update($id, $data)) {
                return redirect()
                    ->to('/dispositivos')
                    ->with('msg', [
                        'type' => 'success',
                        'content' => 'Dispositivo agregado satisfactoriamente',
                    ]);
            }

        }

        $dispositivoModel = model(DispositivoModel::class);
        $dispositivo = $dispositivoModel->find($id);

        $centrosTechModel = model(CentroTechModel::class);
        $centrosTech = $centrosTechModel->findAll();

        $db = db_connect();
        $query = $db->query("call spListarEstadosDispositivo()");
        $data = $query->getResult();
        $estadosDispositivo = json_decode(json_encode($data), true);

        return view('dispositivos/editar', [
            'dispositivo' => $dispositivo,
            'centrosTech' => $centrosTech,
            'estadosDispositivo' => $estadosDispositivo,
            'modulo' => 'dispositivos',
        ]);

    }

    public function eliminar($id) {

        $model = model(DispositivoModel::class);

        if ($model->delete($id)) {
            return redirect()
                ->to('/dispositivos')
                ->with('msg', [
                    'type' => 'success',
                    'content' => 'Dispositivo eliminado satisfactoriamente',
                ]);
        }
        
        return redirect()
            ->to('/dispositivos')
            ->with('msg', [
                'type' => 'danger',
                'content' => 'No se pudo eliminar el dispositivo',
            ]);
    }

}
