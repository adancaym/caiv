<?php namespace App\Controllers;

use App\Constants\UsuarioConstants;
use App\Entities\Usuario;
use App\Libraries\Periodo;
use App\Models\AccionModel;
use App\Models\UsuarioModel;
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
        $modelUsuario = new UsuarioModel();
        $modelCuenta = new CuentaModel();
        $modelAccion = new AccionModel();
        $session = \Config\Services::session();


        $usuario = $this->request->getPost('user');
	    $pass    = $this->request->getPost('pass');

	    $existeUsuario = $modelUsuario->buscarUsuario($usuario);

        if ($existeUsuario != null ){
            if ($existeUsuario->bloqueado == UsuarioConstants::USUARIO_DESBLOQUEADO){
                if ($existeUsuario->pass == $pass){


                    $this->response->appendBody('Bienvenido');

                    $cuenta = $modelCuenta->find($existeUsuario->id_cuenta);
                    $cuentaPadre = $modelCuenta->find($cuenta->id_cuenta_padre);


                    $menus = $modelAccion->getAccionesFromCuentaAndUsuario($existeUsuario->id_cuenta,$existeUsuario->id_usuario);

                    foreach ($menus as $menu) {
                        $submenus = $modelAccion->getAccionesSubmenu($menu->id_accion,$cuenta->id_cuenta);
                        $menu->submenus  = $submenus;
                    }
                    $sesion = [
                        'user'  => $existeUsuario,
                        'cuenta' => $cuenta,
                        'cuentaPadre' => $cuentaPadre,
                        'menus' => $menus
                    ];

                    $session->set($sesion);

                    $existeUsuario->bloqueado = UsuarioConstants::USUARIO_DESBLOQUEADO;
                    $existeUsuario->intentos = 0;
                    $modelUsuario->update($existeUsuario->id_usuario,$existeUsuario);

                }
                else{

                    if ($existeUsuario->intentos == UsuarioConstants::NUMERO_MAXIMO_INTENTOS_INICION_SESION){
                        $existeUsuario->bloqueado = UsuarioConstants::USUARIO_BLOQUEADO;
                        $this->response->appendBody('Error en la contraseña se ha bloqueado tu usuario');

                    }else{
                        $this->response->appendBody('Error en la contraseña tienes '.(UsuarioConstants::NUMERO_MAXIMO_INTENTOS_INICION_SESION - $existeUsuario->intentos). ' intentos restantes');
                        $existeUsuario->intentos += 1;
                    }

                    $existeUsuario->fecha_ultimo_error_sesion = date('Y-m-d H:i:s');
                    $existeUsuario->error_inicio_sesion = 'Contraseña incorrecta';
                }
                $modelUsuario->update($existeUsuario->id_usuario,$existeUsuario);
            }
            else{
                $this->response->appendBody('Tu usuario se encuentra bloqueado');
            }
        }
        else
        {

            $this->response->appendBody('No se ha encontrado el usuario');

        }
        $this->response->sendJsonToModal('Iniciar sesión');

    }

    public function salir(){
        $session = \Config\Services::session();
        $session->destroy();
        $this->response->closeSesion();

    }
    public function saluda(){


    }
	//--------------------------------------------------------------------

}
