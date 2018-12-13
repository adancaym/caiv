<?php
/**
 * Created by PhpStorm.
 * User: caym
 * Date: 3/11/18
 * Time: 04:27 PM
 */

namespace App\Models;

use CodeIgniter\Model;

class AsignaturaModel extends Model
{





    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_cuenta', 'id_asignatura','asignatura'];

    protected $useTimestamps = false;

    protected $validationRules    = [];

    protected $validationMessages = [];

    protected $skipValidation     = false;

    // necesarios para el crud

    public $table      = 'asignatura';

    public $plural    = 'asignatuas';

    public $primaryKey = 'id_asignatura';

    public $returnType = 'App\Entities\Asignatura';

    public $module = 'Asignatura';

    public $headers = ['Asignatura'];

    public $fields = ['asignatura'];

    public $selecField = 'asignatura';
}