<?php
/**
 * Created by PhpStorm.
 * User: caym
 * Date: 3/11/18
 * Time: 04:27 PM
 */

namespace App\Models;

use CodeIgniter\Model;

class GradoModel extends Model
{





    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_cuenta', 'id_grado','grado'];

    protected $useTimestamps = false;

    protected $validationRules    = [];

    protected $validationMessages = [];

    protected $skipValidation     = false;

    // necesarios para el crud

    public $table      = 'grado';

    public $plural    = 'Grados';

    public $primaryKey = 'id_grado';

    public $returnType = 'App\Entities\Grado';

    public $module = 'Grado';

    public $headers = ['Grado'];

    public $fields = ['grado'];

    public $selecField = 'grado';
}