<?php
/**
 * Created by PhpStorm.
 * User: caym
 * Date: 3/11/18
 * Time: 04:27 PM
 */

namespace App\Models;

use CodeIgniter\Model;

class GrupoEscuelaModel extends Model
{





    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_cuenta', 'id_grupo_escuela','grupo_escuela'];

    protected $useTimestamps = false;

    protected $validationRules    = [];

    protected $validationMessages = [];

    protected $skipValidation     = false;

    // necesarios para el crud

    public $table      = 'grupo_escuela';

    public $plural    = 'grupos_escuelas';

    public $primaryKey = 'id_grupo_escuela';

    public $returnType = 'App\Entities\GrupoEscuela';

    public $module = 'GrupoEscuela';

    public $headers = ['Grupo'];

    public $fields = ['grupo_escuela'];

    public $selecField = 'grupo_escuela';
}