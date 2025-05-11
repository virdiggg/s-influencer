<?php defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Seeder_permissions extends CI_Migration
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
        $this->name = 'permissions';
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
        $param[] = [
            'name' => 'can show dashboard',
            'created_by' => 'superadmin',
            'updated_by' => 'superadmin',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        //------------------------ Setting Apps (2-26)
        $param[] = [
            'name' => 'can show settings',
            'created_by' => 'superadmin',
            'updated_by' => 'superadmin',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can show users',
            'created_by' => 'superadmin',
            'updated_by' => 'superadmin',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can create users',
            'created_by' => 'superadmin',
            'updated_by' => 'superadmin',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can update users',
            'created_by' => 'superadmin',
            'updated_by' => 'superadmin',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can delete users',
            'created_by' => 'superadmin',
            'updated_by' => 'superadmin',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can show navigations',
            'created_by' => 'superadmin',
            'updated_by' => 'superadmin',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can create navigations',
            'created_by' => 'superadmin',
            'updated_by' => 'superadmin',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can update navigations',
            'created_by' => 'superadmin',
            'updated_by' => 'superadmin',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can delete navigations',
            'created_by' => 'superadmin',
            'updated_by' => 'superadmin',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can show roles',
            'created_by' => 'superadmin',
            'updated_by' => 'superadmin',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can create roles',
            'created_by' => 'superadmin',
            'updated_by' => 'superadmin',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can update roles',
            'created_by' => 'superadmin',
            'updated_by' => 'superadmin',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can delete roles',
            'created_by' => 'superadmin',
            'updated_by' => 'superadmin',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can show permissions',
            'created_by' => 'superadmin',
            'updated_by' => 'superadmin',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can create permissions',
            'created_by' => 'superadmin',
            'updated_by' => 'superadmin',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can update permissions',
            'created_by' => 'superadmin',
            'updated_by' => 'superadmin',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can delete permissions',
            'created_by' => 'superadmin',
            'updated_by' => 'superadmin',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can assign roles',
            'created_by' => 'superadmin',
            'updated_by' => 'superadmin',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can assign permissions',
            'created_by' => 'superadmin',
            'updated_by' => 'superadmin',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can revoke roles',
            'created_by' => 'superadmin',
            'updated_by' => 'superadmin',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can revoke permissions',
            'created_by' => 'superadmin',
            'updated_by' => 'superadmin',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can reset user password',
            'created_by' => 'superadmin',
            'updated_by' => 'superadmin',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can change user status',
            'created_by' => 'superadmin',
            'updated_by' => 'superadmin',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can show setting webs',
            'created_by' => 'superadmin',
            'updated_by' => 'superadmin',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can update setting webs',
            'created_by' => 'superadmin',
            'updated_by' => 'superadmin',
            'created_at' => $date,
            'updated_at' => $date,
        ]; // 26
        //------------------------ Master Data (27-39)
        $param[] = [
            'name' => 'can show data masters',
            'created_by' => 'superadmin',
            'updated_by' => 'superadmin',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can show master influencers',
            'created_by' => 'superadmin',
            'updated_by' => 'superadmin',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can create master influencers',
            'created_by' => 'superadmin',
            'updated_by' => 'superadmin',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can update master influencers',
            'created_by' => 'superadmin',
            'updated_by' => 'superadmin',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can delete master influencers',
            'created_by' => 'superadmin',
            'updated_by' => 'superadmin',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can show master categories',
            'created_by' => 'superadmin',
            'updated_by' => 'superadmin',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can create master categories',
            'created_by' => 'superadmin',
            'updated_by' => 'superadmin',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can update master categories',
            'created_by' => 'superadmin',
            'updated_by' => 'superadmin',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can delete master categories',
            'created_by' => 'superadmin',
            'updated_by' => 'superadmin',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can show master areas',
            'created_by' => 'superadmin',
            'updated_by' => 'superadmin',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can create master areas',
            'created_by' => 'superadmin',
            'updated_by' => 'superadmin',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can update master areas',
            'created_by' => 'superadmin',
            'updated_by' => 'superadmin',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can delete master areas',
            'created_by' => 'superadmin',
            'updated_by' => 'superadmin',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        //------------------------ Transaction (40-??)
        $param[] = [
            'name' => 'can show transactions',
            'created_by' => 'superadmin',
            'updated_by' => 'superadmin',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        // Request influencer ke admin
        $param[] = [
            'name' => 'can show requests',
            'created_by' => 'superadmin',
            'updated_by' => 'superadmin',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can create requests',
            'created_by' => 'superadmin',
            'updated_by' => 'superadmin',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can update requests',
            'created_by' => 'superadmin',
            'updated_by' => 'superadmin',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can delete requests',
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
