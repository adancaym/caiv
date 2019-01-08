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
    private $allowedFilesTypes = array( 'image/png',
        'image/jpg',
        'image/jpeg',
        'application/pdf');
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

    public $headers = ['Id','Archivo','Tipo','Tamaño','Errores'];

    public $fields = ['id_archivo','archivo','type','size','error'];

    public $selecField = 'archivo';

    public function allWithUrl($id_cuenta)
    {
        $entities = $this->all($id_cuenta);

        foreach ($entities as $entity){
            if (in_array($entity->type,$this->allowedFilesTypes)){
                $entity->url = '#ver_archivo?id='.$entity->id_archivo.'&toFrame=true';
            }else{
                $entity->url = 'ver_archivo?id='.$entity->id_archivo.'&toFrame=false';
            }
        }
        return $entities;
    }

    public function allImages($id_cuenta)
    {
        $this->builder = $this->db->table('archivo');

        $query = $this->builder->

        select('archivo.*')
            ->where('archivo.id_cuenta',$id_cuenta)
            ->like('archivo.type','image')
        ;
        $result =  $query->get() ;
        $rows =  $result->getResultObject();
        foreach ($rows as $entity){
            if (in_array($entity->type,$this->allowedFilesTypes)){
                $entity->url = '#ver_archivo?id='.$entity->id_archivo.'&toFrame=true';
            }else{
                $entity->url = 'ver_archivo?id='.$entity->id_archivo.'&toFrame=false';
            }
        }
        return $rows;
    }
    public function allPdfs($id_cuenta)
    {
        $this->builder = $this->db->table('archivo');

        $query = $this->builder->

        select('archivo.*')
            ->where('archivo.id_cuenta',$id_cuenta)
            ->like('archivo.type','pdf');
        $result =  $query->get() ;
        $rows =  $result->getResultObject();
        return $rows;
    }
}