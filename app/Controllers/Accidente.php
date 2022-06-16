<?php

namespace App\Controllers;

use App\Models\AccidenteModel;
use App\Models\CentroTechModel;
use App\Models\DispositivoModel;

class Accidente extends BaseController
{
    public function index()
    {
        $model = model(AccidenteModel::class);
        $data = [];

        $db = db_connect();

        if (session()->get('rol_id') == 1) {
            $query = $db->query('call spListarAccidentes()');
            $data = $query->getResult();
        } else {
            $id = session()->get('usuario_id');
            $query = $db->query("call spListarMisAccidenteNotificados($id)");
            $data = $query->getResult();
        }

        $accidentes = json_decode(json_encode($data), true);

        return view('accidentes/index', [
            'modulo' => 'accidentes',
            'accidentes' => $accidentes,
        ]);
    }

    public function detalles($id) {

        $db = db_connect();
        $query = $db->query("call spDetallesAccidente($id)");
        $data = $query->getResult();

        $accidente = json_decode(json_encode($data), true);

        return view('accidentes/detalles', [
            'modulo' => 'accidentes',
            'accidente' => $accidente[0],
        ]);
    }

    public function obtenerDispositivosPorCentroTech($centroTechId) {
        $model = model(DispositivoModel::class);
        $dispositivos = $model->where('centro_tech_id', $centroTechId)->findAll();
        echo json_encode($dispositivos);
    }

    public function agregar() {

        if ($this->request->getMethod() == 'post') {

            $model = model(AccidenteModel::class);

            $titulo = $this->request->getPost('titulo');
            $descripcion = $this->request->getPost('descripcion');
            $tipo_accidente_id = $this->request->getPost('tipo_accidente_id');
            $dispositivo_id = $this->request->getPost('dispositivo_id');

            date_default_timezone_set('America/El_Salvador');
            $fecha_notificacion = date('Y-m-d H:i:s');
            $estado_notificacion_id = 1;
            $usuario_id = session()->get('usuario_id');

            $validationRule = [
                'foto' => [
                    'label' => 'Image File',
                    'rules' => 'uploaded[foto]'
                        . '|is_image[foto]'
                        . '|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                        . '|max_size[foto,1000]'
                        . '|max_dims[foto,1024,768]',
                ],
            ];

            if (!$this->validate($validationRule)) {
                $data = ['errors' => $this->validator->getErrors()];
                return view('accidentes/agregar', $data);
            }

            $file = $this->request->getFile('foto');
            $fileName = $file->getRandomName();

            $absolutePath = ROOTPATH . 'public/uploads';
            $ruta = '';

            if ($file->move($absolutePath, $fileName)) {
                $ruta = 'uploads/' . $fileName;
            }


            $data = [
                'titulo' => $titulo,
                'descripcion' => $descripcion,
                'tipo_accidente_id' => $tipo_accidente_id,
                'dispositivo_id' => $dispositivo_id,
                'fecha_notificacion' => $fecha_notificacion,
                'estado_notificacion_id' => $estado_notificacion_id,
                'foto' => $ruta,
                'usuario_id' => $usuario_id,
            ];

            if ($model->insert($data)) {
                return redirect()->to('/accidentes/agregar')
                    ->with('msg', [
                        'type' => 'success',
                        'content' => 'Notificacion de accidente agregado satisfactoriamente',
                    ]);
            }

        }

        $centrosTechModel = model(CentroTechModel::class);
        $centrosTech = $centrosTechModel->findAll();

        $db = db_connect();

        $query = $db->query("call spListarTiposAccidentes()");
        $data = $query->getResult();

        $tiposAccidentes = json_decode(json_encode($data), true);

        return view('accidentes/agregar', [
            'modulo' => 'accidentes',
            'tiposAccidentes' => $tiposAccidentes,
            'centrosTech' => $centrosTech,
        ]);

    }
}
