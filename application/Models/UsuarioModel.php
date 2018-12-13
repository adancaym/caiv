<?php
/**
 * Created by PhpStorm.
 * User: caym
 * Date: 3/11/18
 * Time: 04:27 PM
 */

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{


    protected $table      = 'usuario';

    protected $primaryKey = 'id_usuario';

    protected $returnType = 'App\Entities\Usuario';

    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_cuenta', 'id_usuario','usuario','pass','correo','intentos','fecha_ultimo_error_sesion','error_inicio_sesion','bloqueado'];

    protected $useTimestamps = false;

    protected $validationRules    = [];

    protected $validationMessages = [];

    protected $skipValidation     = false;

    public $plural    = 'Usuarios';

    public $module = 'accion';

    public $headers = ['Usuario','Correo'];

    public $fields = ['usuario','correo'];

    public $selecField = 'concat( usuario, " - ", correo )';

    function buscarUsuario($user){
        $builder = $this->db->table($this->table);
        return $builder->select('*')->where('usuario', $user)->get(1)->getRow();
    }




}