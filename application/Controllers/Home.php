<?php namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Model\CuentaModel;


class Home extends Controller
{
	public function index()
	{
		return view('app/sbadmin/layout');
	}

	public function admin(){

	    $cuentaModel = new CuentaModel();

       // $data['cuentas'] = $cuentaModel->findAll();

	    $this->response->appendBody(view('home/admin'));
	    $this->response->sendJson();
    }

    public function saluda(){
	    $this->response->appendBody(view('home/form'));
        $this->response->sendJsonToModal();
    }
	//--------------------------------------------------------------------

}
