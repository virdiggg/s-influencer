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
        $filePath = STORAGE_PATH . 'database2.xlsx';

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

            $influencerIndex = count($influencers) + 1;

            $influencers[] = [
                'name' => $name,
                'username_instagram' => $username,
                'category_id' => $category_id,
                'followers' => $followers,
                'engagement_rate' => $er,
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

                $area_id = $areaIndex[$area];
                $influencers_mapping[] = [
                    'influencer_id' => $influencerIndex,
                    'area_id' => $area_id,
                    'created_by' => 'superadmin',
                    'updated_by' => 'superadmin',
                    'created_at' => $date,
                    'updated_at' => $date,
                ];
            }
        }

        // Insert data
        $this->db->insert_batch('ms_areas', $areas);
        $this->db->insert_batch('ms_categories', $categories);
        $this->db->insert_batch('ms_influencers', $influencers);
        $this->db->insert_batch('influencer_mappings', $influencers_mapping);
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
