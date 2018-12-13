<?php namespace App\Controllers;

use App\Libraries\SessionRouter;
use App\Models\GrupoEscuelaModel;
use CodeIgniter\Controller;


class GrupoEscuela extends Controller
{
    public function __construct()
    {
        $this->model = new GrupoEscuelaModel();
        $this->session = new SessionRouter();
        $this->params = array(
            'model' => new GrupoEscuelaModel(),
            'id_cuenta' => $this->session->user->id_cuenta,
        );
    }
}
