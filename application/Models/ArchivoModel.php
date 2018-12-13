<?php
/**
 * Created by PhpStorm.
 * User: caym
 * Date: 3/11/18
 * Time: 04:27 PM
 */

namespace App\Models;

use CodeIgniter\Model;

class ArchivoModel extends Model
{
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_cuenta', 'id_archivo','archivo','type','size','tmp_name','error','blob'];

    protected $useTimestamps = false;

    protected $validationRules    = [];

    protected $validationMessages = [];

    protected $skipValidation     = false;
    // necesarios para el crud
    public $table      = 'archivo';

    public $plural    = 'archivos';

    public $primaryKey = 'id_archivo';

    public $returnType = 'App\Entities\Archivo';

    public $module = 'Archivo';

    public $headers = ['Archivo','Tipo','Tamaño','Errores'];

    public $fields = ['archivo','type','size','error'];

    public $selecField = 'archivo';
}