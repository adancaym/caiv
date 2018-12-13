<?php namespace App\Controllers;

use App\Libraries\SessionRouter;
use App\Models\AsignaturaModel;
use App\Models\GrupoModel;
use CodeIgniter\Controller;


class Grupo extends Controller
{
    public function __construct()
    {
        $this->model = new GrupoModel();
        $this->session = new SessionRouter();
        $this->params = array(
            'model' => new GrupoModel(),
            'id_cuenta' => $this->session->user->id_cuenta,
        );
    }
}
