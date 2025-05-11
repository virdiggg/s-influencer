<?php defined('BASEPATH') OR exit('No direct script access allowed');

Class M_Master extends CI_model {
    private $areas = "ms_areas";
    private $categories = "ms_categories";
    private $influencers = "ms_influencers";
    private $mapping = "influencer_mappings";

    private $primary = "id";

    private $exceptions = ["created_by", "created_at", "updated_by", "updated_at", "password"];

    public function __construct() {
        parent::__construct();
    }

    public function categories() {
        $this->db->select("id, name");
        $this->db->from($this->categories);

        $this->db->order_by('id', 'ASC');
        $this->db->order_by('name', 'ASC');
        return $this->db->get()->result();
    }

    public function areas() {
        $this->db->select("id, name");
        $this->db->from($this->areas);

        $this->db->order_by('id', 'ASC');
        $this->db->order_by('name', 'ASC');
        return $this->db->get()->result();
    }

    /**
     * Datatables.
     * 
     * @param string|int   $length
     * @param string|int   $start
     * @param string|array $filters
     * 
     * @return array
     */
    public function datatables($length = 10, $start = 0, $filters = []) {
        
        $result = $this->influencers($length, $start, $filters);
        $countResult = count($result);

        if ($countResult >= $length) {
            $resultNextPage = $this->influencers($length, $start + $length, $filters);
            $countResultNextPage = count($resultNextPage);
            if ($countResultNextPage >= $length) {
                $totalRecords = $start + (2 * $length);
            } else {
                $totalRecords = $start + $length + $countResultNextPage;
            }

            unset($resultNextPage, $countResultNextPage);
        } else {
            $totalRecords = $start + $countResult;
        }

        unset($countResult);
        return [
            'totalRecords' => $totalRecords,
            'data' => $result ? $this->parse($result, $start) : [],
        ];
    }

    public function influencers($limit = null, $offset = null, $filters = []) {
        $this->db->select("inf.id, inf.name, inf.username_instagram, inf.category_id, inf.followers, inf.engagement_rate, (
            SELECT JSON_AGG(
                JSON_BUILD_OBJECT(
                    'id', map.id,
                    'area_id', map.area_id,
                    'influencer_id', map.influencer_id,
                    'area', area.name
                ) ORDER BY map.id
            )
            FROM {$this->mapping} map
            JOIN {$this->areas} area ON area.id = map.area_id
            WHERE map.influencer_id = inf.id
        ) AS areas");
        $this->db->from($this->influencers . ' inf');

        if (count($filters) > 0) {
            if (!empty($filters['search'])) {
                $this->db->group_start();
                $this->db->like('LOWER(inf.name)', $filters['search']);
                $this->db->or_like('LOWER(inf.username_instagram)', $filters['search']);
                $this->db->group_end();
            }

            if (count($filters['category']) > 0) {
                $this->db->where_in('inf.category_id', $filters['category']);
            }

            if (!empty($filters['engagement_rate_bottom']) && !empty($filters['engagement_rate_top'])) {
                $this->db->where('inf.engagement_rate >', $filters['engagement_rate_bottom'])
                    ->where('inf.engagement_rate <=', $filters['engagement_rate_top']);
            }

            if (!empty($filters['followers_bottom']) && !empty($filters['followers_top'])) {
                if ($filters['followers_top'] == 1000000) {
                    // No cap
                    $this->db->where('inf.followers >=', $filters['followers_bottom']);
                } else {
                    $this->db->where('inf.followers >', $filters['followers_bottom'])
                        ->where('inf.followers <=', $filters['followers_top']);
                }
            }

            if (count($filters['area']) > 0) {
                $area = "'" . implode("', '", $filters['area']) . "'";
                $this->db->where("EXISTS (
                    SELECT 1
                    FROM {$this->mapping} area
                    WHERE area.influencer_id = inf.id
                    AND area.area_id IN ({$area})
                )");
            }
        }

        if (!is_null($limit) && !is_null($offset)) {
            $this->db->limit($limit, $offset);
        }

        $this->db->order_by('inf.engagement_rate', 'DESC');
        $this->db->order_by('inf.followers', 'DESC');
        $this->db->order_by('inf.name', 'ASC');
        return $this->db->get()->result();
    }

    /**
     * Parse datatables.
     * 
     * @param array      $length
     * @param string|int $start
     * 
     * @return array
     */
    public function parse($result, $start = 0) {
        foreach ($result as $r) {
            $start++;
            $r->no = $start;
            if ($this->authenticated->isAuthenticated()) {
                $r->action = '<button type="button" class="btn btn-primary btn-sm authorized" onclick="showDetail(' . $r->id . ')">Detail</button>';
            } else {
                $r->action = '<button type="button" class="btn btn-primary btn-sm authorized" onclick="showLoginModal()">Detail</button>';
            }
        }

        return $result;
    }
}
