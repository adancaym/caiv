<?php
/**
 * Created by PhpStorm.
 * User: caym
 * Date: 3/11/18
 * Time: 04:27 PM
 */

namespace App\Models;

use CodeIgniter\Model;

class PeriodoModel extends Model
{





    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_cuenta', 'id_periodo','periodo','id_periodo_tipo','fecha_inicio','fecha_termino'];

    protected $useTimestamps = false;

    protected $validationRules    = [];

    protected $validationMessages = [];

    protected $skipValidation     = false;

    // necesarios para el crud

    public $table      = 'periodo';

    public $plural    = 'Periodos';

    public $primaryKey = 'id_periodo';

    public $returnType = 'App\Entities\Periodo';

    public $module = 'Periodo';

    public $headers = ['Periodo','Fecha de inicio','Fecha termino'];

    public $fields = ['periodo','fecha_inicio','fecha_termino'];

    public $selecField = 'periodo';


    public function obtenerCatalogos($entidad,$id_cuenta=null){
        if ($entidad->id_cuenta==null){
            $cuenta = $id_cuenta;
        }
        else{
            $cuenta = $entidad->id_cuenta;
        }

        $modelPeriodoTipo = new PeriodoTipoModel();
        $catalogos['periodo_tipo'] = $modelPeriodoTipo->getSelect($cuenta,$entidad->id_periodo_tipo);

        return $catalogos;
    }
}