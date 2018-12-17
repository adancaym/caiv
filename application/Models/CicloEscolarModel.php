<?php
/**
 * Created by PhpStorm.
 * User: caym
 * Date: 3/11/18
 * Time: 04:27 PM
 */

namespace App\Models;

use CodeIgniter\Model;

class CicloEscolarModel extends Model
{

    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_cuenta', 'id_ciclo_escolar','ciclo_escolar','fecha_inicio','fecha_termino'];

    protected $useTimestamps = false;

    protected $validationRules    = [];

    protected $validationMessages = [];

    protected $skipValidation     = false;

    // necesarios para el crud

    public $table      = 'ciclo_escolar';

    public $plural    = 'ciclos_escolares';

    public $primaryKey = 'id_ciclo_escolar';

    public $returnType = 'App\Entities\CicloEscolar';

    public $module = 'CicloEscolar';

    public $headers = ['Ciclo escolar','Fecha de inicio', 'Fecha de término'];

    public $fields = ['ciclo_escolar','fecha_inicio', 'fecha_termino'];

    public $selecField = 'ciclo_escolar';
}