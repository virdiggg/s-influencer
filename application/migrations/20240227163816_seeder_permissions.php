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
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        //------------------------ Setting Apps (2-26)
        $param[] = [
            'name' => 'can show settings',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can show users',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can create users',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can update users',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can delete users',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can show navigations',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can create navigations',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can update navigations',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can delete navigations',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can show roles',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can create roles',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can update roles',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can delete roles',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can show permissions',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can create permissions',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can update permissions',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can delete permissions',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can assign roles',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can assign permissions',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can revoke roles',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can revoke permissions',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can reset user password',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can change user status',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can show setting webs',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can update setting webs',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ]; // 26
        //------------------------ Master Data (27-35)
        $param[] = [
            'name' => 'can show data masters',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can show master suppliers',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can create master suppliers',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can update master suppliers',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can delete master suppliers',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can show master products',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can create master products',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can update master products',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can delete master products',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        //------------------------ Transaction (36-??)
        $param[] = [
            'name' => 'can show transactions',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        // Request produk dari user ke GA
        $param[] = [
            'name' => 'can show requests',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can create requests',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can update requests',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can delete requests',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can process requests',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        // Permintaan pembelian dari GA ke procurement
        $param[] = [
            'name' => 'can show requisitions',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can create requisitions',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can update requisitions',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can delete requisitions',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can process requisitions',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can finish requests',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can finish requisitions',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can show goods receipts',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can process goods receipts',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can approve requests',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can approve requisitions',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can reject requisitions',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can reactive requisitions',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can approve po',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can show reports',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can show requests',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [  // 58
            'name' => 'can show requisitions',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        // Report
        $param[] = [
            'name' => 'can show reports',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can show report requests',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can show report requisitions',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
            'created_at' => $date,
            'updated_at' => $date,
        ];
        $param[] = [
            'name' => 'can show report goods receipts',
            'created_by' => 'TuhanYME',
            'updated_by' => 'TuhanYME',
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
