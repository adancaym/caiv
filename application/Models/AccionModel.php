<?php
/**
 * Created by PhpStorm.
 * User: caym
 * Date: 8/12/18
 * Time: 01:43 AM
 */

namespace App\Models;


use CodeIgniter\Model;

class AccionModel extends Model
{
    protected $table      = 'accion';

    protected $primaryKey = 'id_accion';

    protected $returnType = 'App\Entities\Accion';

    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_cuenta', 'id_accion','accion','link','ruta','visible'];

    protected $useTimestamps = false;
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;





    public $plural    = 'acciones';

    public $module = 'accion';

    public $headers = ['Accion','link', 'visible'];

    public $fields = ['accion','link', 'visible'];

    public $selecField = 'concat(accion, " - ", if( visible = 1, "Visisble", " Oculto") )';



    function getAccionesFromCuentaAndUsuario($id_cuenta,$id_usuario){

        $this->builder = $this->db->table('cuenta');

        $query = $this->builder->

            select(' a.id_accion, a.accion as nombre, a.link as link ,a.ruta as ruta , a.visible')
            ->join('grupo', 'grupo.id_cuenta = cuenta.id_cuenta')
            ->join('grupo_accion','grupo.id_grupo = grupo_accion.id_grupo')
            ->join('accion a','a.id_accion= grupo_accion.id_accion')
            ->join('usuario','usuario.id_cuenta = cuenta.id_cuenta')

            ->where('cuenta.id_cuenta',$id_cuenta)
            ->where('usuario.id_usuario',$id_usuario)

            ->groupBy('a.id_accion');

        $result =  $query->get() ;
        $rows =  $result->getResultObject();

        return $rows;
    }

    function getAccionesSubmenu($id_accion,$id_cuenta){

        $this->builder = $this->db->table('accion a');

        $query =
            $this->builder->
                select('a.accion as nombre, a.link as link ,a.ruta as ruta, a.visible')
                ->where('a.id_cuenta',$id_cuenta)
                ->where('a.id_accion_padre',$id_accion)
                ->groupBy('a.id_accion');
        $result =  $query->get() ;
        $rows =  $result->getResultObject();

        return $rows;
    }


    function getRutas($id_cuenta,$id_usuario){

        $this->builder = $this->db->table('cuenta');
        $query =
            $this->builder->
                select('a.accion as nombre, a.link as link ,a.ruta as ruta')

                ->join('grupo', 'grupo.id_cuenta = cuenta.id_cuenta')
                ->join('grupo_accion','grupo.id_grupo = grupo_accion.id_grupo')
                ->join('accion','accion.id_accion= grupo_accion.id_accion')
                ->join('accion a',' accion.id_accion = a.id_accion_padre')
                ->join('usuario','usuario.id_cuenta = cuenta.id_cuenta')

                ->where('cuenta.id_cuenta',$id_cuenta)
                ->where('usuario.id_usuario',$id_usuario)

                ->groupBy('a.id_accion');

        $result =  $query->get() ;
        $rows =  $result->getResultObject();


        return $rows;
    }
}