<?php defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Seeder_roles extends CI_Migration
{
    /**
     * Table name.
     * 
     * @param string
     */
    private $name;

    public function __construct()
    {
        parent::__construct();
        $this->name = 'roles';
    }

    /**
     * Migration.
     * 
     * @return void
     */
    public function up()
    {
        $date = date('Y-m-d H:i:s');

        $param = [];
        $param[] = [ //1
            'name' => 'super admin',
            'description' => 'Super Admin Paling Seksi',
            'created_by' => 'superadmin',
            'updated_by' => 'superadmin',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [ //2
            'name' => 'admin',
            'description' => 'Administrator di Bawah Super Admin',
            'created_by' => 'superadmin',
            'updated_by' => 'superadmin',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [ //3
            'name' => 'user',
            'description' => 'User',
            'created_by' => 'superadmin',
            'updated_by' => 'superadmin',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $this->db->insert_batch($this->name, $param);
    }

    /**
     * Rollback migration.
     * 
     * @return void
     */
    public function down()
    {
        $this->db->truncate($this->name);
    }
}
