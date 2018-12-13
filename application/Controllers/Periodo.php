<?php namespace App\Controllers;

use App\Libraries\SessionRouter;
use App\Models\PeriodoModel;
use CodeIgniter\Controller;


class Periodo extends Controller
{
    public function __construct()
    {
        $this->model = new PeriodoModel();
        $this->session = new SessionRouter();
        $this->params = array(
            'model' => new PeriodoModel(),
            'id_cuenta' => $this->session->user->id_cuenta,
        );
    }

}
