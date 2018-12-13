<?php namespace App\Controllers;

use App\Libraries\SessionRouter;
use App\Models\AsignaturaModel;
use App\Models\GradoModel;
use CodeIgniter\Controller;


class Grado extends Controller
{
    public function __construct()
    {
        $this->model = new GradoModel();
        $this->session = new SessionRouter();
        $this->params = array(
            'model' => new GradoModel(),
            'id_cuenta' => $this->session->user->id_cuenta,
        );

    }

}
