<?php
/**
 * Created by PhpStorm.
 * User: caym
 * Date: 26/12/18
 * Time: 03:21 PM
 */

namespace App\Models;


use CodeIgniter\Model;

class GeneradorModel extends Model
{
    public function getTables(){
        $query = $this->db->query('show tables');
        return $query->getResult();
    }
    public function getFields($table){
        $query = $this->db->query('
        select * from information_schema.COLUMNS
        where table_schema ="karym"
        and TABLE_NAME = "'.$table.'"');
        return $query->getResult();
    }

    public function getFKs($table){
        $sql = "SELECT * FROM information_schema.TABLE_CONSTRAINTS 
         WHERE information_schema.TABLE_CONSTRAINTS.CONSTRAINT_TYPE = 'FOREIGN KEY' 
         AND information_schema.TABLE_CONSTRAINTS.TABLE_SCHEMA = 'Karym'
         AND information_schema.TABLE_CONSTRAINTS.TABLE_NAME = '".$table."'";
        $query = $this->db->query($sql);
        return $query->getResult();
    }

}