<?php defined('BASEPATH') OR exit('No direct script access allowed');

Class M_Master extends CI_model {
    private $areas = "ms_areas";
    private $categories = "ms_categories";
    private $influencers = "ms_influencers";
    private $mapping = "influencer_mappings";

    private $primary = "id";

    public function __construct() {
        parent::__construct();
    }

    public function categories() {
        $this->db->select("id, name");
        $this->db->from($this->categories);

        $this->db->order_by($this->primary, 'ASC');
        $this->db->order_by('name', 'ASC');
        return $this->db->get()->result();
    }

    public function areas() {
        $this->db->select("id, name");
        $this->db->from($this->areas);

        $this->db->order_by($this->primary, 'ASC');
        $this->db->order_by('name', 'ASC');
        return $this->db->get()->result();
    }

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
        $this->db->select("inf.id, inf.name, inf.username_instagram, inf.category_id, inf.followers, inf.engagement_rate,
        COALESCE(
            (
                SELECT cat.name FROM {$this->categories} cat WHERE cat.id = inf.category_id
            ),
            null
        ) AS category");
        // PostgreSQL
        // $this->db->select("(
        //     SELECT JSON_AGG(
        //         JSON_BUILD_OBJECT(
        //             'id', map.id,
        //             'area_id', map.area_id,
        //             'influencer_id', map.influencer_id,
        //             'area', area.name
        //         ) ORDER BY map.id
        //     )
        //     FROM {$this->mapping} map
        //     JOIN {$this->areas} area ON area.id = map.area_id
        //     WHERE map.influencer_id = inf.id
        // ) AS areas");
        // MySQL
        $this->db->select("(
            SELECT JSON_ARRAYAGG(
            JSON_OBJECT(
                'id', map.id,
                'area_id', map.area_id,
                'influencer_id', map.influencer_id,
                'area', area.name
            )
            )
            FROM {$this->mapping} map
            JOIN {$this->areas} area ON area.id = map.area_id
            WHERE map.influencer_id = inf.id
            ORDER BY map.id
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

        $this->db->order_by('inf.followers', 'DESC');
        $this->db->order_by('inf.engagement_rate', 'DESC');
        $this->db->order_by('inf.name', 'ASC');
        return $this->db->get()->result();
    }

    public function parse($result, $start = 0) {
        $isAdmin = getSession('role') === 'ADMIN';
        $isAuthenticated = $this->authenticated->isAuthenticated();

        foreach ($result as $r) {
            $start++;
            $r->no = $start;
            if ($isAuthenticated) {
                if ($isAdmin) {
                    $edit = '<a href="' . base_url('admin/master/influencer/edit/' . $r->id) . '" class="btn btn-sm btn-link text-success">
                        <i class="fas fa-edit"></i></a>';
                    $delete = '<button type="button" class="btn btn-sm btn-link text-danger" onclick="openDelete(this, ' . $r->id . ')"><i class="fas fa-trash"></i></button>';
                    $r->actions = $edit . ' ' . $delete;
                } else {
                    $r->actions = '<button type="button" class="btn btn-primary btn-sm authorized" onclick="showDetail(' . $r->id . ')">Detail</button>';
                }
            } else {
                $r->actions = '<button type="button" class="btn btn-primary btn-sm authorized" onclick="showLoginModal()">Detail</button>';
            }
        }

        return $result;
    }

    public function update($id, $param) {
        if (count($param) === 0) {
            return null;
        }

        // PostgreSQL
        // $values = [];
        // foreach ($param as $key => $p) {
        //     $val = !is_null($p) ? $this->db->escape($p) : "NULL";
        //     $values[] = '"' . $key . '" = ' . $val;
        // }

        // $values[] = "updated_at = NOW(), updated_by = '" . getSession('username') . "'";

        // $set = join(", ", $values);

        // $tmpWhere = [];
        // $tmpWhere[] = "\"{$this->primary}\" = " . $this->db->escape($id);

        // $where = "WHERE " . join(" AND ", $tmpWhere);
        // $query = "UPDATE \"{$this->table}\" SET {$set} {$where} RETURNING *;";
        // unset($tmpWhere, $values, $where);
        // return $this->db->query($query)->row();

        // MySQL
        $param = array_merge($param, [
            "updated_at" => date("Y-m-d H:i:s"),
            "updated_by" => getSession("username"),
        ]);
        $this->db->where($this->primary, $id);
        $this->db->update($this->table, $param);
        return $this->find($id);
    }

    private function __find($where) {
        $this->db->select();
        $this->db->from($this->table);
        $this->db->where($where);
        return $this->db->get()->row();
    }

    public function find($id) {
        return $this->__find([$this->primary => $id]);
    }

    public function parseDatatables($result, $start = 0) {
        $isAdmin = getSession('role') === 'ADMIN';

        foreach ($result as $r) {
            $start++;
            $r->no = $start;
            $approve = $reject = $delete = $log = '';

            if ($isAdmin) {
                if ($r->rejected_at === null && $r->approved_at === null) {
                    $approve = '<button type="button" class="btn btn-sm btn-link text-success" onclick="openApprove(this, ' . $r->id . ')"
                        data-note="' . $r->note . '" data-username_instagram="' . $r->username_instagram . '"
                        data-followers="' . $r->followers . '" data-engagement_rate="' . $r->engagement_rate . '"
                        data-name="' . $r->name . '">
                        <i class="fas fa-check"></i></button>';
                    $reject = '<button type="button" class="btn btn-sm btn-link text-danger" onclick="openReject(this, ' . $r->id . ')"
                        data-note="' . $r->note . '" data-username_instagram="' . $r->username_instagram . '"
                        data-followers="' . $r->followers . '" data-engagement_rate="' . $r->engagement_rate . '"
                        data-name="' . $r->name . '">
                        <i class="fas fa-times"></i></button>';
                }
            } else {
                if (!$r->rejected_at && !$r->approved_at) {
                    $delete = '<button type="button" class="btn btn-sm btn-link text-danger" onclick="openDelete(this, ' . $r->id . ')"><i class="fas fa-trash"></i></button>';
                }
            }

            $log = '<button type="button" class="btn btn-sm btn-link text-secondary" title="Log" onclick="openLog(this, ' . $r->id . ', &apos;' . $r->username_instagram . '&apos;)"><i class="fas fa-eye"></i></button>';
            $r->influencer = "<a href=\"https://www.instagram.com/{$r->username_instagram}\" target=\"_blank\" rel=\"noopener noreferrer\" class=\"text-truncate\" style=\"font-size: 16px;\">@{$r->username_instagram}</a> - {$r->name}";
            $r->areas = join(', ', array_column(json_decode($r->areas ?: '[]', true), 'area'));
            $r->actions = $approve . $reject . $log . $delete;
        }

        return $result;
    }
}
