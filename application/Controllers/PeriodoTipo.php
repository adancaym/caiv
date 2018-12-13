<?php namespace App\Controllers;

use App\Libraries\SessionRouter;
use App\Models\PeriodoTipoModel;
use CodeIgniter\Controller;


class PeriodoTipo extends Controller
{
    public function __construct()
    {
        $this->model = new PeriodoTipoModel();
        $this->session = new SessionRouter();
        $this->params = array(
            'model' => new PeriodoTipoModel(),
            'id_cuenta' => $this->session->user->id_cuenta,
        );
    }

}
