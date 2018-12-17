<?php
/**
 * Created by PhpStorm.
 * User: caym
 * Date: 3/11/18
 * Time: 04:27 PM
 */

namespace App\Models;

use CodeIgniter\Model;

class GrupoModel extends Model
{





    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_cuenta', 'id_grupo','grupo'];

    protected $useTimestamps = false;

    protected $validationRules    = [];

    protected $validationMessages = [];

    protected $skipValidation     = false;

    // necesarios para el crud

    public $table      = 'grupo';

    public $plural    = 'Grupos';

    public $primaryKey = 'id_grupo';

    public $returnType = 'App\Entities\Grupo';

    public $module = 'Grupo';

    public $headers = ['Grupo'];

    public $fields = ['grupo'];

    public $selecField = 'grupo';
}