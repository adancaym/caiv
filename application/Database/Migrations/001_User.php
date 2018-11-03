<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Migration_User extends Migration
{
    public function up()
    {
        $fields = array(
            'id_user' => array(
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ),
            'user' => array(
                'type' => 'varchar',
                'constraint' => '32',
                'required' => true,
            ),
            'id_cuenta' => array(
                'type' => 'BIGINT',
                'constraint' => '20',
                'required' => true,
            )
        );

        $this->forge->addField($fields);
        $this->forge->addKey('id_user', TRUE);
        $this->forge->createTable('user');
    }

    //--------------------------------------------------------------------

    public function down()
    {
        $this->forge->dropTable('user');
    }
}
