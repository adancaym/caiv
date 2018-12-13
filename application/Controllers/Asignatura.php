<?php namespace App\Controllers;

use App\Libraries\SessionRouter;
use App\Models\AsignaturaModel;
use CodeIgniter\Controller;


class Asignatura extends Controller
{
    public function __construct()
    {
        $this->model = new AsignaturaModel();
        $this->session = new SessionRouter();
        $this->params = array(
            'model' => new AsignaturaModel(),
            'id_cuenta' => $this->session->user->id_cuenta,
        );

    }

}
