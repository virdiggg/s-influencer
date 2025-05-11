<?php defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Seeder_permission_to_roles extends CI_Migration
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
        $this->name = 'permission_to_roles';
    }

    /**
     * Migration.
     * 
     * @return void
     */
    public function up()
    {
        $date = date('Y-m-d H:i:s');

        $total = $this->db->from('permissions')->where('id >', 26)->count_all_results();

        $param = [];
        for ($i = 1; $i <= $total; $i++) {
            $param[] = [
                'permission_id' => $i,
                'role_id' => 2, // admin (proses request influencer)
                'created_by' => 'superadmin',
                'created_at' => $date,
            ];
            if (in_array($i, [40, 41, 42])) {
                $param[] = [
                    'permission_id' => $i,
                    'role_id' => 3, // user (pencari influencer)
                    'created_by' => 'superadmin',
                    'created_at' => $date,
                ];
            }
        }

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
