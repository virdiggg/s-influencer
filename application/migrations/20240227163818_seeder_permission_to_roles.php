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

        $total = $this->db->from('permissions')->count_all_results();

        // $param = [];
        // for ($i = 1; $i <= $total; $i++) {
        //     if (in_array($i, [14, 18]) === false) {
        //         $param[] = [
        //             'permission_id' => $i,
        //             'role_id' => 2, // admin
        //             'created_by' => 'TuhanYME',
        //             'created_at' => $date,
        //         ];
        //     }
        //     if (in_array($i, [6, 10, 11, 12, 13, 14, 15, 16, 17, 18, 21, 22, 31, 35, 51, 52]) === false) {
        //         $param[] = [
        //             'permission_id' => $i,
        //             'role_id' => 3, // it
        //             'created_by' => 'TuhanYME',
        //             'created_at' => $date,
        //         ];
        //     }
        // }

        // $mngLainLain = [
        //     4, // GA
        //     12, // PPIC
        //     13, // HR
        //     14, // QA
        //     15, // QC
        //     16, // IT
        //     17, // Procurment
        //     18, // WH
        // ];

        // foreach ($mngLainLain as $s) {
        //     $param[] = [
        //         'permission_id' => 1,
        //         'role_id' => $s,
        //         'created_by' => 'TuhanYME',
        //         'created_at' => $date,
        //     ];
        //     $param[] = [
        //         'permission_id' => 36,
        //         'role_id' => $s,
        //         'created_by' => 'TuhanYME',
        //         'created_at' => $date,
        //     ];
        //     $param[] = [
        //         'permission_id' => 37,
        //         'role_id' => $s,
        //         'created_by' => 'TuhanYME',
        //         'created_at' => $date,
        //     ];
        //     $param[] = [
        //         'permission_id' => 38,
        //         'role_id' => $s,
        //         'created_by' => 'TuhanYME',
        //         'created_at' => $date,
        //     ];
        //     $param[] = [
        //         'permission_id' => 39,
        //         'role_id' => $s,
        //         'created_by' => 'TuhanYME',
        //         'created_at' => $date,
        //     ];
        //     $param[] = [
        //         'permission_id' => 42,
        //         'role_id' => $s,
        //         'created_by' => 'TuhanYME',
        //         'created_at' => $date,
        //     ];
        //     $param[] = [
        //         'permission_id' => 51,
        //         'role_id' => $s,
        //         'created_by' => 'TuhanYME',
        //         'created_at' => $date,
        //     ];
        //     $param[] = [
        //         'permission_id' => 56,
        //         'role_id' => $s,
        //         'created_by' => 'TuhanYME',
        //         'created_at' => $date,
        //     ];
        //     $param[] = [
        //         'permission_id' => 57,
        //         'role_id' => $s,
        //         'created_by' => 'TuhanYME',
        //         'created_at' => $date,
        //     ];
        //     $param[] = [
        //         'permission_id' => 58,
        //         'role_id' => $s,
        //         'created_by' => 'TuhanYME',
        //         'created_at' => $date,
        //     ];
        //     $param[] = [
        //         'permission_id' => 59,
        //         'role_id' => $s,
        //         'created_by' => 'TuhanYME',
        //         'created_at' => $date,
        //     ];
        //     $param[] = [
        //         'permission_id' => 60,
        //         'role_id' => $s,
        //         'created_by' => 'TuhanYME',
        //         'created_at' => $date,
        //     ];
        //     $param[] = [
        //         'permission_id' => 61,
        //         'role_id' => $s,
        //         'created_by' => 'TuhanYME',
        //         'created_at' => $date,
        //     ];
        // }

        // // -- mng ga
        // $param[] = [
        //     'permission_id' => 27,
        //     'role_id' => 4,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];
        // $param[] = [
        //     'permission_id' => 28,
        //     'role_id' => 4,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];
        // $param[] = [
        //     'permission_id' => 29,
        //     'role_id' => 4,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];
        // $param[] = [
        //     'permission_id' => 30,
        //     'role_id' => 4,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];
        // $param[] = [
        //     'permission_id' => 32,
        //     'role_id' => 4,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];
        // $param[] = [
        //     'permission_id' => 33,
        //     'role_id' => 4,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];
        // $param[] = [
        //     'permission_id' => 34,
        //     'role_id' => 4,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];
        // $param[] = [
        //     'permission_id' => 41,
        //     'role_id' => 4,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];
        // $param[] = [
        //     'permission_id' => 43,
        //     'role_id' => 4,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];
        // $param[] = [
        //     'permission_id' => 44,
        //     'role_id' => 4,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];
        // $param[] = [
        //     'permission_id' => 45,
        //     'role_id' => 9,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];
        // $param[] = [
        //     'permission_id' => 47,
        //     'role_id' => 4,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];
        // $param[] = [
        //     'permission_id' => 52,
        //     'role_id' => 4,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];
        // $param[] = [
        //     'permission_id' => 53,
        //     'role_id' => 4,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];
        // $param[] = [
        //     'permission_id' => 54,
        //     'role_id' => 4,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];

        // // -- mng it
        // $param[] = [
        //     'permission_id' => 27,
        //     'role_id' => 16,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];
        // $param[] = [
        //     'permission_id' => 28,
        //     'role_id' => 16,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];
        // $param[] = [
        //     'permission_id' => 32,
        //     'role_id' => 16,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];
        // $param[] = [
        //     'permission_id' => 41,
        //     'role_id' => 16,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];
        // $param[] = [
        //     'permission_id' => 47,
        //     'role_id' => 16,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];
        // $param[] = [
        //     'permission_id' => 62,
        //     'role_id' => $s,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];

        // // -- mng wh
        // $param[] = [
        //     'permission_id' => 49,
        //     'role_id' => 18,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];
        // $param[] = [
        //     'permission_id' => 50,
        //     'role_id' => 18,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];
        // $param[] = [
        //     'permission_id' => 62,
        //     'role_id' => $s,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];

        // $staffLainLain = [
        //     5, // WH
        //     6, // QA
        //     7, // QC
        //     8, // GA
        //     9, // Procurement
        //     10, // HR
        //     11, // PPIC
        // ];

        // foreach ($staffLainLain as $s) {
        //     $param[] = [
        //         'permission_id' => 1,
        //         'role_id' => $s,
        //         'created_by' => 'TuhanYME',
        //         'created_at' => $date,
        //     ];
        //     $param[] = [
        //         'permission_id' => 36,
        //         'role_id' => $s,
        //         'created_by' => 'TuhanYME',
        //         'created_at' => $date,
        //     ];
        //     $param[] = [
        //         'permission_id' => 37,
        //         'role_id' => $s,
        //         'created_by' => 'TuhanYME',
        //         'created_at' => $date,
        //     ];
        //     $param[] = [
        //         'permission_id' => 38,
        //         'role_id' => $s,
        //         'created_by' => 'TuhanYME',
        //         'created_at' => $date,
        //     ];
        //     $param[] = [
        //         'permission_id' => 39,
        //         'role_id' => $s,
        //         'created_by' => 'TuhanYME',
        //         'created_at' => $date,
        //     ];
        // }

        // // -- wh
        // $param[] = [
        //     'permission_id' => 49,
        //     'role_id' => 5,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];
        // $param[] = [
        //     'permission_id' => 50,
        //     'role_id' => 5,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];

        // // -- ga
        // $param[] = [
        //     'permission_id' => 27,
        //     'role_id' => 8,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];
        // $param[] = [
        //     'permission_id' => 28,
        //     'role_id' => 8,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];
        // $param[] = [
        //     'permission_id' => 29,
        //     'role_id' => 8,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];
        // $param[] = [
        //     'permission_id' => 30,
        //     'role_id' => 8,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];
        // $param[] = [
        //     'permission_id' => 32,
        //     'role_id' => 8,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];
        // $param[] = [
        //     'permission_id' => 33,
        //     'role_id' => 8,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];
        // $param[] = [
        //     'permission_id' => 34,
        //     'role_id' => 8,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];
        // $param[] = [
        //     'permission_id' => 41,
        //     'role_id' => 8,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];
        // $param[] = [
        //     'permission_id' => 42,
        //     'role_id' => 8,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];
        // $param[] = [
        //     'permission_id' => 43,
        //     'role_id' => 8,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];
        // $param[] = [
        //     'permission_id' => 47,
        //     'role_id' => 8,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];

        // // -- procurement
        // $param[] = [
        //     'permission_id' => 27,
        //     'role_id' => 9,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];
        // $param[] = [
        //     'permission_id' => 28,
        //     'role_id' => 9,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];
        // $param[] = [
        //     'permission_id' => 29,
        //     'role_id' => 9,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];
        // $param[] = [
        //     'permission_id' => 30,
        //     'role_id' => 9,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];
        // $param[] = [
        //     'permission_id' => 32,
        //     'role_id' => 9,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];
        // $param[] = [
        //     'permission_id' => 33,
        //     'role_id' => 9,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];
        // $param[] = [
        //     'permission_id' => 34,
        //     'role_id' => 9,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];
        // $param[] = [
        //     'permission_id' => 42,
        //     'role_id' => 9,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];
        // $param[] = [
        //     'permission_id' => 43,
        //     'role_id' => 9,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];
        // $param[] = [
        //     'permission_id' => 44,
        //     'role_id' => 9,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];
        // $param[] = [
        //     'permission_id' => 46,
        //     'role_id' => 9,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];
        // $param[] = [
        //     'permission_id' => 48,
        //     'role_id' => 9,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];

        // // -- mng procurement
        // $param[] = [
        //     'permission_id' => 27,
        //     'role_id' => 17,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];
        // $param[] = [
        //     'permission_id' => 28,
        //     'role_id' => 17,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];
        // $param[] = [
        //     'permission_id' => 29,
        //     'role_id' => 17,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];
        // $param[] = [
        //     'permission_id' => 30,
        //     'role_id' => 17,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];
        // $param[] = [
        //     'permission_id' => 32,
        //     'role_id' => 17,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];
        // $param[] = [
        //     'permission_id' => 33,
        //     'role_id' => 17,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];
        // $param[] = [
        //     'permission_id' => 34,
        //     'role_id' => 17,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];
        // $param[] = [
        //     'permission_id' => 42,
        //     'role_id' => 17,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];
        // $param[] = [
        //     'permission_id' => 43,
        //     'role_id' => 17,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];
        // $param[] = [
        //     'permission_id' => 44,
        //     'role_id' => 17,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];
        // $param[] = [
        //     'permission_id' => 46,
        //     'role_id' => 17,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];
        // $param[] = [
        //     'permission_id' => 48,
        //     'role_id' => 17,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];
        // $param[] = [
        //     'permission_id' => 55,
        //     'role_id' => 17,
        //     'created_by' => 'TuhanYME',
        //     'created_at' => $date,
        // ];
        // $this->db->insert_batch($this->name, $param);
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
