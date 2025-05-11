<?php defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Seeder_navigations extends CI_Migration
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
        $this->name = 'navigations';
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
            'parent_id' => null,
            'name' => 'Dashboard',
            'endpoint' => 'dashboard',
            'icon' => 'fas fa-tachometer-alt',
            'order' => 1,
            'permission' => 'can show dashboard',
            'is_active' => 'Y',
            'created_by' => 'superadmin',
            'updated_by' => 'superadmin',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [ //2
            'parent_id' => null,
            'name' => 'Pengaturan',
            'endpoint' => 'setting',
            'icon' => 'fas fa-cog',
            'order' => 100000,
            'permission' => 'can show settings',
            'is_active' => 'Y',
            'created_by' => 'superadmin',
            'updated_by' => 'superadmin',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [ //3
            'parent_id' => 2,
            'name' => 'User',
            'endpoint' => 'setting/user',
            'icon' => 'far fa-circle',
            'order' => 1,
            'permission' => 'can show users',
            'is_active' => 'Y',
            'created_by' => 'superadmin',
            'updated_by' => 'superadmin',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [ //4
            'parent_id' => 2,
            'name' => 'Navigation',
            'endpoint' => 'setting/navigation',
            'icon' => 'far fa-circle',
            'order' => 2,
            'permission' => 'can show navigations',
            'is_active' => 'Y',
            'created_by' => 'superadmin',
            'updated_by' => 'superadmin',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [ //5
            'parent_id' => 2,
            'name' => 'Role',
            'endpoint' => 'setting/role',
            'icon' => 'far fa-circle',
            'order' => 3,
            'permission' => 'can show roles',
            'is_active' => 'Y',
            'created_by' => 'superadmin',
            'updated_by' => 'superadmin',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [ //6
            'parent_id' => 2,
            'name' => 'Permission',
            'endpoint' => 'setting/permission',
            'icon' => 'far fa-circle',
            'order' => 4,
            'permission' => 'can show permissions',
            'is_active' => 'Y',
            'created_by' => 'superadmin',
            'updated_by' => 'superadmin',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [ //7
            'parent_id' => 2,
            'name' => 'Setting Web',
            'endpoint' => 'setting/web',
            'icon' => 'far fa-circle',
            'order' => 5,
            'permission' => 'can show setting webs',
            'is_active' => 'Y',
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
