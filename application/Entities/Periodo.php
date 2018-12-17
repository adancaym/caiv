<?php
/**
 * Created by PhpStorm.
 * User: caym
 * Date: 3/11/18
 * Time: 04:28 PM
 */

namespace App\Entities;

use CodeIgniter\Entity;

class Periodo extends Entity
{
    protected $id_cuenta;
    protected $id_periodo;
    protected $periodo;
    protected $fecha_inicio;
    protected $fecha_termino;
    protected $id_periodo_tipo;


}