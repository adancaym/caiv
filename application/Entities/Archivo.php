<?php
/**
 * Created by PhpStorm.
 * User: caym
 * Date: 3/11/18
 * Time: 04:28 PM
 */

namespace App\Entities;

use CodeIgniter\Entity;

class Archivo extends Entity
{
    protected $id_cuenta;
    protected $id_archivo;
    protected $archivo;
    protected $type;
    protected $size;
    protected $tmp_name;
    protected $error;
    protected $blob;

}