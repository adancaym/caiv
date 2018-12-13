<?php
/**
 * Created by PhpStorm.
 * User: caym
 * Date: 3/11/18
 * Time: 04:27 PM
 */

namespace App\Models;

use CodeIgniter\Model;

class PeriodoTipoModel extends Model
{





    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_cuenta', 'id_periodo_tipo','periodo_tipo','dias'];

    protected $useTimestamps = false;

    protected $validationRules    = [];

    protected $validationMessages = [];

    protected $skipValidation     = false;

    // necesarios para el crud

    public $table      = 'periodo_tipo';

    public $plural    = 'periodo_tipo';

    public $primaryKey = 'id_periodo_tipo';

    public $returnType = 'App\Entities\PeriodoTipo';

    public $module = 'PeriodoTipo';

    public $headers = ['Tipo de periodo','Duración en dias'];

    public $fields = ['periodo_tipo','dias'];

    public $selecField = 'periodo_tipo';

}