<?php
/**
 * Created by PhpStorm.
 * User: caym
 * Date: 3/11/18
 * Time: 04:28 PM
 */

namespace App\Entities;

use CodeIgniter\Entity;

class Cuenta extends Entity
{
    protected $id_cuenta;
    protected $cuenta;
    protected $id_cuenta_padre;

}