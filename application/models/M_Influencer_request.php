<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_Influencer_request extends CI_model
{
    private $table = "influencer_requests";
    private $logs = "influencer_request_logs";
    private $areas = "ms_areas";
    private $categories = "ms_categories";
    private $influencers = "ms_influencers";
    private $mapping = "influencer_mappings";
    private $users = "users";

    private $primary = "id";
    private $dbDriver;

    public function __construct()
    {
        parent::__construct();
        $this->dbDriver = $this->db->dbdriver;
    }

    public function getToDoList()
    {
        return $this->db->select('id, influencer_id, name, username_instagram, followers,
            engagement_rate, note, created_by, created_at')
            ->select("COALESCE(
                (
                    SELECT u.full_name
                    FROM {$this->users} u
                    WHERE u.username = {$this->table}.created_by
                ),
                null
            ) AS created_by_name")
            ->from($this->table)
            ->group_start()
            ->where('approved_by IS NULL')
            ->or_where('approved_at IS NULL')
            ->group_end()
            ->group_start()
            ->where('rejected_by IS NULL')
            ->where('rejected_at IS NULL')
            ->group_end()
            ->group_start()
            ->where('deleted_by IS NULL')
            ->where('deleted_at IS NULL')
            ->group_end()
            ->order_by('created_at', 'DESC')
            ->limit(5)
            ->get()->result();
    }

    public function create($param)
    {
        if ($this->dbDriver === 'postgre') {
            $var = $val = [];
            foreach ($param as $key => $p) {
                $var[] = '"' . $key . '"';
                $val[] = !is_null($p) ? $this->db->escape($p) : "NULL";
            }

            $var[] = 'created_at, created_by, updated_at, updated_by';
            $val[] = "NOW(), '" . getSession('username') . "', NOW(), '" . getSession('username') . "'";

            $query = "INSERT INTO \"{$this->table}\" (" . join(', ', $var) . ") VALUES (" . join(', ', $val) . ") RETURNING *;";
            return $this->db->query($query)->row();
        } else {
            $date = date("Y-m-d H:i:s");
            $username = getSession("username");
            $data = array_merge($param, [
                "created_at" => $date,
                "created_by" => $username,
                "updated_at" => $date,
                "updated_by" => $username,
            ]);
            $this->db->insert($this->table, $data);
            $res = $this->find($this->db->insert_id());
            $this->insertLog($res->id, "New Request", $username, $date);
            return $res;
        }
    }

    public function update($id, $param)
    {
        if (count($param) === 0) {
            return null;
        }

        if ($this->dbDriver === 'postgre') {
            $values = [];
            foreach ($param as $key => $p) {
                $val = !is_null($p) ? $this->db->escape($p) : "NULL";
                $values[] = '"' . $key . '" = ' . $val;
            }

            $values[] = "updated_at = NOW(), updated_by = '" . getSession('username') . "'";

            $set = join(", ", $values);

            $tmpWhere = [];
            $tmpWhere[] = "\"{$this->primary}\" = " . $this->db->escape($id);

            $where = "WHERE " . join(" AND ", $tmpWhere);
            $query = "UPDATE \"{$this->table}\" SET {$set} {$where} RETURNING *;";
            unset($tmpWhere, $values, $where);
            return $this->db->query($query)->row();
        } else {
            $param = array_merge($param, [
                "updated_at" => date("Y-m-d H:i:s"),
                "updated_by" => getSession("username"),
            ]);
            $this->db->where($this->primary, $id);
            $this->db->update($this->table, $param);
            return $this->find($id);
        }
    }

    private function __find($where)
    {
        $this->db->select();
        $this->db->from($this->table);
        $this->db->where($where);
        return $this->db->get()->row();
    }

    public function find($id)
    {
        return $this->__find([$this->primary => $id]);
    }

    public function datatables($length = 10, $start = 0, $search = NULL)
    {
        $result = $this->queryDatatables($length, $start, $search);
        $countResult = count($result);

        if ($countResult >= $length) {
            $resultNextPage = $this->queryDatatables($length, $start + $length, $search);
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

    public function parse($result, $start = 0)
    {
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
                        data-name="' . $r->name . '" data-requested_by="' . $r->created_by_name . '">
                        <i class="fas fa-check"></i></button>';
                    $reject = '<button type="button" class="btn btn-sm btn-link text-danger" onclick="openReject(this, ' . $r->id . ')"
                        data-note="' . $r->note . '" data-username_instagram="' . $r->username_instagram . '"
                        data-followers="' . $r->followers . '" data-engagement_rate="' . $r->engagement_rate . '"
                        data-name="' . $r->name . '" data-requested_by="' . $r->created_by_name . '">
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

    public function queryDatatables($length = 10, $start = 0, $search = NULL)
    {
        $this->db->select("req.id, req.influencer_id, req.name, req.username_instagram, req.followers,
            req.engagement_rate, req.note, req.created_by, req.approved_by, req.approved_at,
            req.rejected_by, req.rejected_at, req.reject_note");
        $this->db->select("(
            CASE
                WHEN rejected_by IS NOT NULL THEN 'Rejected'
                WHEN approved_by IS NOT NULL THEN 'Approved'
                ELSE 'New Request'
            END
        ) AS status");
        $this->db->select("COALESCE(
            (
                SELECT u.full_name
                FROM {$this->users} u
                WHERE u.username = req.approved_by
            ),
            null
        ) AS approved_by_name");
        $this->db->select("COALESCE(
            (
                SELECT u.full_name
                FROM {$this->users} u
                WHERE u.username = req.rejected_by
            ),
            null
        ) AS rejected_by_name");
        $this->db->select("COALESCE(
            (
                SELECT u.full_name
                FROM {$this->users} u
                WHERE u.username = req.created_by
            ),
            null
        ) AS created_by_name");

        if ($this->dbDriver === 'postgre') {
            $this->db->select("(
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
                WHERE map.influencer_id = req.influencer_id
            ) AS areas");
            $this->db->select("TO_CHAR(req.created_at, 'YYYY-MM-DD HH24:MI') AS created_at");
        } else {
            // MySQL
            // $this->db->select("(
            //     SELECT JSON_ARRAYAGG(
            //     JSON_OBJECT(
            //         'id', map.id,
            //         'area_id', map.area_id,
            //         'influencer_id', map.influencer_id,
            //         'area', area.name
            //     )
            //     )
            //     FROM {$this->mapping} map
            //     JOIN {$this->areas} area ON area.id = map.area_id
            //     WHERE map.influencer_id = req.influencer_id
            //     ORDER BY map.id
            // ) AS areas");
            // MySQL MariaDB
            $this->db->select("(
                SELECT CONCAT('[', GROUP_CONCAT(
                    CONCAT(
                        '{',
                        '\"id\":', map.id, ',',
                        '\"area_id\":', map.area_id, ',',
                        '\"influencer_id\":', map.influencer_id, ',',
                        '\"area\":\"', area.name, '\"',
                        '}'
                    )
                ), ']')
                FROM {$this->mapping} map
                JOIN {$this->areas} area ON area.id = map.area_id
                WHERE map.influencer_id = req.influencer_id
            )
            AS areas");
            $this->db->select("DATE_FORMAT(req.created_at, '%Y-%m-%d %H:%i') AS created_at");
        }

        $this->db->from("{$this->table} req");

        if (!empty($search)) {
            $this->db->group_start();
            $this->db->like('LOWER(req.name)', $search);
            $this->db->or_like('LOWER(req.username_instagram)', $search);
            $this->db->group_end();
        }

        if (getSession('role') === 'USER') {
            $this->db->where('req.created_by', getSession('username'));
        }

        $this->db->group_start();
        $this->db->where('req.deleted_by IS NULL');
        $this->db->where('req.deleted_at IS NULL');
        $this->db->group_end();

        $this->db->limit($length, $start);
        $this->db->order_by('req.created_at', 'DESC');
        $query = $this->db->get();
        $result = $query->result();

        $query->free_result();
        $this->db->close();

        return $result;
    }

    public function export($start = null, $end = null)
    {
        $this->db->select("req.name, req.username_instagram, req.followers, req.engagement_rate");
        $this->db->select("(
            CASE
                WHEN rejected_by IS NOT NULL THEN 'Rejected'
                WHEN approved_by IS NOT NULL THEN 'Approved'
                ELSE 'New Request'
            END
        ) AS status");

        if ($this->dbDriver === 'postgre') {
            $this->db->select("(
                SELECT STRING_AGG(area.name, ', ')
                FROM {$this->mapping} map
                JOIN {$this->areas} area ON area.id = map.area_id
                WHERE map.influencer_id = req.influencer_id
            ) AS areas");
        } else {
            $this->db->select("(
                SELECT GROUP_CONCAT(area.name SEPARATOR ', ')
                FROM {$this->mapping} map
                JOIN {$this->areas} area ON area.id = map.area_id
                WHERE map.influencer_id = req.influencer_id
            ) AS areas");
        }

        $this->db->select("COALESCE(
            (
                SELECT u.full_name
                FROM {$this->users} u
                WHERE u.username = req.created_by
            ),
            null
        ) AS created_by, req.note");

        if ($this->dbDriver === 'postgre') {
            $this->db->select("TO_CHAR(req.created_at, 'YYYY-MM-DD HH24:MI') AS created_at");
        } else {
            $this->db->select("DATE_FORMAT(req.created_at, '%Y-%m-%d %H:%i') AS created_at");
        }

        $this->db->select("COALESCE(
            (
                SELECT u.full_name
                FROM {$this->users} u
                WHERE u.username = req.approved_by
            ),
            null
        ) AS approved_by");

        if ($this->dbDriver === 'postgre') {
            $this->db->select("TO_CHAR(req.approved_at, 'YYYY-MM-DD HH24:MI') AS approved_at");
        } else {
            $this->db->select("DATE_FORMAT(req.approved_at, '%Y-%m-%d %H:%i') AS approved_at");
        }

        $this->db->select("COALESCE(
            (
                SELECT u.full_name
                FROM {$this->users} u
                WHERE u.username = req.rejected_by
            ),
            null
        ) AS rejected_by, req.reject_note");

        if ($this->dbDriver === 'postgre') {
            $this->db->select("TO_CHAR(req.rejected_at, 'YYYY-MM-DD HH24:MI') AS rejected_at");
        } else {
            $this->db->select("DATE_FORMAT(req.rejected_at, '%Y-%m-%d %H:%i') AS rejected_at");
        }

        $this->db->from("{$this->table} req");

        if (!empty($start)) {
            $this->db->where("req.created_at >=", $start);
        }
        if (!empty($end)) {
            $this->db->where("req.created_at <=", $end);
        }

        $this->db->order_by('req.created_at', 'DESC');
        $query = $this->db->get();
        $result = $query->result_array();

        $query->free_result();
        $this->db->close();

        return $result;
    }

    public function approve($id)
    {
        $param = [
            'approved_by' => getSession('username'),
            'approved_at' => date("Y-m-d H:i:s"),
        ];
        $res = $this->update($id, $param);
        $this->insertLog($id, 'Approved', $param['approved_by'], $param['approved_at']);
        return $res;
    }

    public function reject($id, $reason)
    {
        $param = [
            'rejected_by' => getSession('username'),
            'rejected_at' => date("Y-m-d H:i:s"),
            'reject_note' => $reason,
        ];
        $res = $this->update($id, $param);
        $this->insertLog($id, 'Rejected', $param['rejected_by'], $param['rejected_at']);
        return $res;
    }

    public function destroy($id)
    {
        $param = [
            'deleted_by' => getSession('username'),
            'deleted_at' => date("Y-m-d H:i:s"),
        ];
        $res = $this->update($id, $param);
        $this->insertLog($id, 'Deleted', $param['deleted_by'], $param['deleted_at']);
        return $res;
    }

    public function logs($id)
    {
        return $this->db->select('id, request_id, created_by, created_at, label')
            ->select("(
                CASE
                    WHEN label = 'New Request' THEN (SELECT h.note FROM {$this->table} h WHERE h.id = request_id)
                    WHEN label = 'Rejected' THEN (SELECT h.reject_note FROM {$this->table} h WHERE h.id = request_id)
                    ELSE ''
                END
            ) AS note")
            ->from($this->logs)
            ->where('request_id', $id)->order_by('created_at', 'ASC')->get()->result();
    }

    public function insertLog($requestId, $label, $actor, $date = null)
    {
        $this->db->insert($this->logs, [
            'created_by' => $actor,
            'created_at' => $date ? $date : date("Y-m-d H:i:s"),
            'label' => $label,
            'request_id' => $requestId,
        ]);
    }
}
