<?php defined('BASEPATH') OR exit('No direct script access allowed');

Class M_Navigations extends CI_model {
    /**
     * Default table name.
     * 
     * @param string $table
     */
    private $table = 'navigations';

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
     * @param bool $parent
     * @return array
     */
    public function get($parent = false) {
        $this->db->select('id, parent_id, name, endpoint, icon, permission, order, is_active');
        $this->db->from($this->table);
        $this->db->where('is_active', 'Y');
        $this->db->order_by('order', 'ASC');
        // if ($parent) {
        //     $this->db->where('EXISTS(SELECT id FROM '.$this->table.' n WHERE n.parent_id = navigations.id)');
        // }

        $result = $this->db->get()->result_array();

        if (empty($result)) {
            return [];
        }

        if ($parent) {
            return $result;
        }

        $this->load->helper('arr');
        $parsed = parseChildrenAlt($result, 'id', 'parent_id', 'childrens');

        usort($parsed, function($a, $b) {
            return $a['order'] - $b['order'];
        });

        return $parsed;
    }

    /**
     * Find data based on $id.
     * 
     * @param string $id
     * 
     * @return object|null
     */
    public function find($id) {
        $this->db->select('id, parent_id, name, endpoint, icon, permission, order, is_active');
        $this->db->from($this->table);
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }

    /**
     * Find data based on $id.
     * 
     * @param string $id
     * 
     * @return object|null
     */
    public function insert($param) {
        $this->load->model('setting/M_Permissions', 'permission', TRUE);
        $this->load->model('setting/M_Roles', 'role', TRUE);

        $this->db->trans_start();
        $this->db->trans_strict(FALSE);

        $this->create($param);

        $permission = $this->permission->create([
            'name' => $param['permission'],
            'created_by' => $param['created_by'],
            'created_at' => $param['created_at'],
            'updated_by' => $param['created_by'],
            'updated_at' => $param['created_at'],
        ]);

        if ($permission) {
            // Assign Permission ke role admin
            $this->role->assignOne(2, [$permission->id], $param['created_by']);
        }

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();

            return false;
        }

        $this->db->trans_commit();
        return true;
    }

    /**
     * Create master data ruko
     * 
     * @param array $param
     * @return object
     */
    public function create($param) {
        $this->db->insert($this->table, $param);
        return $this->find($this->db->insert_id());
    }

    /**
     * Update master data ruko
     * 
     * @param string|int $id
     * @param array      $param
     * @return object
     */
    public function update($id, $param) {
        $this->db->where('id', $id)->update($this->table, $param);
        return $this->find($id);
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
     * Datatables.
     * 
     * @param string|null $parent_id
     * @param string|int  $length
     * @param string|int  $start
     * @param string|null $search
     * 
     * @return array
     */
    public function datatables($parent_id, $length = 10, $start = 0, $search = NULL) {
        $result = $this->queryDatatables($parent_id, $length, $start, $search);
        $countResult = count($result);

        if ($countResult >= $length) {
            $resultNextPage = $this->queryDatatables($parent_id, $length, $start + $length, $search);
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
            if ($this->authenticated->can('can update navigations')) {
                $actions .= '<a href="'.base_url('setting/navigation/edit/'.$d->id).'" class="btn btn-sm btn-warning" title="Edit Navigation"><i class="fa fa-edit"></i></a>';
            }
            if ($this->authenticated->can('can delete navigations')) {
                $actions .= '<button class="btn btn-sm btn-danger" onclick="destroyNavigation(\'' . $d->id . '\')" title="Delete Navigation"><i class="fa fa-trash"></i></button>';
            }

            $start ++;
            $d->no = $start;
            $d->actions = $actions;
            $d->endpoint = '<a href="' . base_url($d->endpoint) . '" target="_blank">' . $d->endpoint . '</a>';
            $d->name = '<i class="'.$d->icon.'"></i> ' . $d->name;
            $d->is_active = $d->is_active === 'Y' ? 'Aktif' : 'Tidak Aktif';
        }

        return $result;
    }

    /**
     * Datatables.
     * 
     * @param string|null $parent_id
     * @param string|int  $length
     * @param string|int  $start
     * @param string|null $search
     * 
     * @return array
     */
    public function queryDatatables($parent_id = null, $length = 10, $start = 0, $search = NULL) {
        $this->db->select('id, parent_id, 
            (
                CASE 
                    WHEN parent_id IS NULL THEN null 
                    ELSE (
                        SELECT t.name
                        FROM navigations t
                        WHERE t.id = navigations.parent_id
                        LIMIT 1
                    )
                END
            ) AS parent_name, name, endpoint, icon, permission, order, is_active, created_by, created_at');
        $this->db->from($this->table);
        if (!empty($search)) {
            $this->db->group_start();
                $this->db->like('LOWER(name)', $search);
                $this->db->or_like('LOWER(endpoint)', $search);
            $this->db->group_end();
        }
        if (!empty($parent_id)) {
            $this->db->where('parent_id', $parent_id);
        }
        $this->db->limit($length, $start);
        return $this->db->get()->result();
    }
}
