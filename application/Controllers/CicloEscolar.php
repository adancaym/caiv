<?php namespace App\Controllers;

use App\Libraries\SessionRouter;
use App\Models\CicloEscolarModel;
use CodeIgniter\Controller;


class CicloEscolar extends Controller
{
    public function __construct()
    {
        $this->model = new CicloEscolarModel();
        $this->session = new SessionRouter();
        $this->params = array(
            'model' => new CicloEscolarModel(),
            'id_cuenta' => $this->session->user->id_cuenta,
        );

    }

}
