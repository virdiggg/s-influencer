<?php defined('BASEPATH') OR exit('No direct script access allowed');

Class M_Influencer_request extends CI_model {
    private $table = "influencer_requests";

    private $primary = "id";

    private $exceptions = ["created_by", "created_at", "updated_by", "updated_at"];

    public function __construct() {
        parent::__construct();
    }

    public function getToDoList() {
        return $this->db->select('id, influencer_id, name, username_instagram, followers,
            engagement_rate, note, created_by, created_at')
            ->from($this->table)
            ->group_start()
                ->where('approved_by IS NULL')
                ->where('approved_at IS NULL')
            ->group_end()
            ->order_by('created_at', 'DESC')
            ->limit(5)
            ->get()->result();
    }

    public function create($param) {
        $var = $val = [];
        foreach ($param as $key => $p) {
            $var[] = '"' . $key . '"';
            $val[] = !is_null($p) ? $this->db->escape($p) : "NULL";
        }

        $var[] = 'created_at, created_by, updated_at, updated_by';
        $val[] = "NOW(), '" . getSession('username') . "', NOW(), '" . getSession('username') . "'";

        $query = "INSERT INTO \"{$this->table}\" (" . join(', ', $var) . ") VALUES (" . join(', ', $val) . ") RETURNING *;";
        return $this->db->query($query)->row();
    }

    public function update($id, $param) {
        if (count($param) === 0) {
            return null;
        }

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
    }

    public function find($id) {
        $this->db->select();
        $this->db->from($this->table);
        $this->db->where($this->primary, $id);
        return $this->db->get()->row();
    }

    public function datatables($length = 10, $start = 0, $search = NULL) {
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

    public function parse($result, $start = 0) {
        foreach ($result as $r) {
            $start++;
            $r->no = $start;
            $r->action = '';
        }

        return $result;
    }

    public function queryDatatables($length = 10, $start = 0, $search = NULL) {
        $this->db->select();
        $this->db->from($this->table);
        if (!empty($search)) {
            // Your LIKE query.
            // $search = strtolower($search);
            // $this->db->group_start();
            //     $this->db->like('LOWER(name)', $search);
            //     $this->db->or_like('LOWER(phone)', $search);
            // $this->db->group_end();
        }
        $this->db->limit($length, $start);
        $query = $this->db->get();
        $result = $query->result();

        // Free up memory
        $query->free_result();
        $this->db->close();

        return $result;
    }
}
