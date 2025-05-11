<?php defined('BASEPATH') OR exit('No direct script access allowed');

Class M_Web extends CI_model {
    /**
     * Default table name.
     * 
     * @param string $table
     */
    private $table = 'settings';

    /**
     * DB Connection name.
     * 
     * @param string $conn
     */
    private $conn = 'default';

    /**
     * DB Connection.
     * 
     * @param object $db
     */
    private $db;

    public function __construct() {
        parent::__construct();
        $this->db = $this->load->database($this->conn, TRUE);
    }

    /**
     * Get all data from database.
     * 
     * @return array
     */
    public function get() {
        $this->db->select('id, name, variable, value, note');
        $this->db->from($this->table);
        $result = $this->db->get()->result();
        return $result ? $result : [];
    }

    /**
     * Find data based on $id.
     * 
     * @param string $id
     * 
     * @return object|null
     */
    public function find($id) {
        $this->db->select('id, name, variable, value, note');
        $this->db->from($this->table);
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }

    /**
     * Update master data ruko
     * 
     * @param string|int $id
     * @param array      $param
     * @return bool
     */
    public function update($id, $param) {
        $this->db->where('id', $id);
        $this->db->update($this->table, $param);

        return $this->find($id, 'id');
    }

    /**
     * Datatables.
     * 
     * @param string|int  $length
     * @param string|int  $start
     * @param string|null $search
     * 
     * @return array
     */
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
        } else {
            $totalRecords = $start + $countResult;
        }

        return [
            'totalRecords' => $totalRecords,
            'data' => $result ? $this->parse($result) : [],
        ];
    }

    /**
     * Datatables.
     * 
     * @param string|int  $length
     * @param string|int  $start
     * @param string|null $search
     * 
     * @return array
     */
    public function queryDatatables($length = 10, $start = 0, $search = NULL) {
        $this->db->select('id, name, variable, value, note');
        $this->db->from($this->table);
        if (!empty($search)) {
            $this->db->group_start();
                $this->db->like('LOWER(name)', $search);
                $this->db->or_like('LOWER(variable)', $search);
                $this->db->or_like('LOWER(value)', $search);
            $this->db->group_end();
        }
        $this->db->limit($length, $start);
        return $this->db->get()->result();
    }

    /**
     * Parse datatable.
     * 
     * @param array      $result
     * @param string|int $start
     */
    public function parse($result, $start = 0) {
        foreach ($result as $d) {
            $actions = '';
            if ($this->authenticated->can('can update setting webs')) {
                $actions .= '<button class="btn btn-sm btn-warning" onclick="openUpdate(\'' . $d->id . '\')" title="Edit Role"><i class="fa fa-edit"></i></button>';
            }

            $start ++;
            $d->no = $start;
            $d->actions = $actions;
        }

        return $result;
    }
}
