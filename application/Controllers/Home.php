<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CuentaModel;


class Home extends Controller
{
	public function index()
	{
		return view('app/sbadmin/layout');
	}

	public function admin(){


	    $this->response->appendBody(view('home/admin'));
	    $this->response->sendJson();
    }

    public function login(){
        $this->response->appendBody(view('home/login'));
        $this->response->sendJsonToModal('Ingresar');

    }

    public function registrar(){
        $this->response->appendBody('estoy entrando');
        $this->response->sendJsonToModal('');

    }

    public function saluda(){
        $cuentaModel = new CuentaModel();

        $data['cuentas'] = $cuentaModel->findAll();

        $this->response->appendBody(view('home/form',$data));
        $this->response->sendJsonToModal();
    }
	//--------------------------------------------------------------------

}
