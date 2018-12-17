<?php
/**
 * Created by PhpStorm.
 * User: caym
 * Date: 3/11/18
 * Time: 04:28 PM
 */

namespace App\Entities;

use CodeIgniter\Entity;

class Usuario extends Entity
{
    protected $id_usuario;
    protected $usuario;
    protected $pass;
    protected $id_cuenta;
    protected $correo;
    protected $intentos;
    protected $fecha_ultimo_error_sesion;
    protected $error_inicio_sesion;
    protected $bloqueado;

}