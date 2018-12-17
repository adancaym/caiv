<?php
/**
 * Created by PhpStorm.
 * User: caym
 * Date: 3/11/18
 * Time: 04:27 PM
 */

namespace App\Models;

use CodeIgniter\Model;

class CuentaModel extends Model
{


    protected $table      = 'cuenta';

    protected $primaryKey = 'id_cuenta';

    protected $returnType = 'App\Entities\Cuenta';

    protected $useSoftDeletes = false;

    protected $allowedFields = ['cuenta', 'id_cuenta_padre'];

    protected $useTimestamps = false;
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;




}