<?php defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\IOFactory;

class Migration_Seeder_influencers extends CI_Migration
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
        $filePath = APPPATH . 'storage/database.xlsx';

        $spreadsheet = IOFactory::load($filePath);
        $sheet = $spreadsheet->getActiveSheet();
        $data = $sheet->toArray(null, true, true, true);

        $areas = [];
        $categories = [];
        $influencers = [];
        $date = date('Y-m-d H:i:s');

        $areaIndex = [];
        $categoryIndex = [];

        foreach ($data as $i => $row) {
            if ($i == 1) continue; // Skip header row

            $name = sanitizeString($row['B']);
            $username = sanitizeString(str_replace('@', '', $row['C']));
            $followers = parseFollowers(sanitizeString($row['D']));
            $er = parseER(sanitizeString($row['E']));
            $category = sanitizeString($row['F']);
            $location = sanitizeString($row['G']);

            if (!isset($categoryIndex[$category])) {
                $categoryIndex[$category] = count($categories) + 1;
                $categories[] = [
                    'name' => $category,
                    'created_by' => 'superadmin',
                    'updated_by' => 'superadmin',
                    'created_at' => $date,
                    'updated_at' => $date,
                ];
            }
            $category_id = $categoryIndex[$category];
            $areaParts = explode('/', $location);

            $influencers[] = [
                'name' => $name,
                'username' => $username,
                'category_id' => $category_id,
                'follower' => $followers,
                'engagement_rate' => $er,
                'area_id' => json_encode($areaParts),
                'created_by' => 'superadmin',
                'updated_by' => 'superadmin',
                'created_at' => $date,
                'updated_at' => $date,
            ];

            $areaParts = explode('/', $location);
            foreach ($areaParts as $area) {
                $area = trim($area);
                if (!isset($areaIndex[$area])) {
                    $areaIndex[$area] = count($areas) + 1;
                    $areas[] = [
                        'name' => $area,
                        'created_by' => 'superadmin',
                        'updated_by' => 'superadmin',
                        'created_at' => $date,
                        'updated_at' => $date,
                    ];
                }
            }
        }

        $this->db->insert_batch('ms_areas', $areas);
        $this->db->insert_batch('ms_categories', $categories);
        $this->db->insert_batch('ms_influencers', $influencers);
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
