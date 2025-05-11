<?php defined('BASEPATH') OR exit('No direct script access allowed');

Class M_Permissions extends CI_model {
    /**
     * Default table name.
     * 
     * @param string $table
     */
    private $table = 'permissions';

    /**
     * Table trx.
     * 
     * @param string $permission_to_roles
     */
    private $permission_to_roles = 'permission_to_roles';

    /**
     * Table role.
     * 
     * @param string $roles
     */
    private $roles = 'roles';

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
        $this->db->select('id, name, created_at, created_by');
        $this->db->from($this->table);
        $result = $this->db->get()->result();
        return $result ? $result : [];
    }

    /**
     * Create master data ruko
     * 
     * @param array $param
     * @return int
     */
    public function create($param) {
        $var = $val = $where = [];

        foreach ($param as $i => $p) {
            $var[] = '"'.$i.'"';
            $p = !empty($p) ? "'" . str_replace("'", "''", $p) . "'" : 'null';
            if (in_array($i, ['created_at', 'created_by', 'updated_at', 'updated_by', 'deleted_at', 'deleted_by'])) {
                $val[] = 'NOW() AS ' . $i;
            } else {
                $val[] = $p;
            }
            if (!in_array($i, ['created_at', 'created_by', 'updated_at', 'updated_by', 'deleted_at', 'deleted_by'])) {
                $where[] = '"'.$i.'" = '.$p;
            }
        }

        $query = 'INSERT INTO ' . $this->table . ' (' . join(',', $var) . ') SELECT * FROM (SELECT ' . join(',', $val) . ') AS tmp WHERE NOT EXISTS (SELECT id FROM ' . $this->table . ' WHERE ' . join(' AND ', $where) . ') RETURNING *;';
        return $this->db->query($query)->row();
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
     * Delete a row.
     * 
     * @param string|int $id
     * 
     * @return bool
     */
    public function delete($id) {
        $this->db->where('id', $id)->delete($this->table);
        return (bool) $this->db->affected_rows();
    }

    /**
     * Find data based on $id.
     * 
     * @param array $roles
     * 
     * @return object|null
     */
    public function getByRole($roles) {
        $this->db->select('p.id, p.name');
        $this->db->from($this->roles.' r');
        $this->db->join($this->permission_to_roles.' pr', 'pr.role_id = r.id');
        $this->db->join($this->table.' p', 'p.id = pr.permission_id');
        $this->db->where_in('r.name', (array) $roles);
        return $this->db->get()->result();
    }

    /**
     * Find data based on $id.
     * 
     * @param string $id
     * 
     * @return object|null
     */
    public function find($id) {
        $this->db->select('id, name, created_at, created_by');
        $this->db->from($this->table);
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }

    /**
     * Datatables.
     * 
     * @param string      $token
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
            'data' => $result ? $this->parse($result, $start) : [],
        ];
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
            if ($this->authenticated->can('can update permissions')) {
                $actions .= '<button class="btn btn-sm btn-warning" onclick="openUpdate(\'' . $d->id . '\')" title="Edit Permission"><i class="fa fa-edit"></i></button>';
            }
            if ($this->authenticated->can('can delete permissions')) {
                $actions .= '<button class="btn btn-sm btn-danger" onclick="destroy(\'' . $d->id . '\')" title="Delete Permission"><i class="fa fa-trash"></i></button>';
            }

            $start ++;
            $d->no = $start;
            $d->actions = $actions;
        }

        return $result;
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
        $this->db->select('id, name, created_by, created_at');
        $this->db->from($this->table);
        if (!empty($search)) {
            $this->db->group_start();
                $this->db->like('LOWER(name)', $search);
            $this->db->group_end();
        }
        $this->db->limit($length, $start);
        $this->db->order_by('id', 'DESC');
        return $this->db->get()->result();
    }
}
