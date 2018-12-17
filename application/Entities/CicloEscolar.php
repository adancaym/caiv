<?php
/**
 * Created by PhpStorm.
 * User: caym
 * Date: 3/11/18
 * Time: 04:28 PM
 */

namespace App\Entities;

use CodeIgniter\Entity;

class CicloEscolar extends Entity
{
    protected $id_ciclo_escolar;
    protected $ciclo_escolar;
    protected $fecha_inicio;
    protected $fecha_termino;
    protected $id_cuenta;

}