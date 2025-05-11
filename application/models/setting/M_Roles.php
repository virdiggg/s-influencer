<?php defined('BASEPATH') OR exit('No direct script access allowed');

Class M_Roles extends CI_model {
    /**
     * Default table name.
     * 
     * @param string $table
     */
    private $table = 'roles';

    /**
     * Table trx.
     * 
     * @param string $permission_to_roles
     */
    private $permission_to_roles = 'permission_to_roles';

    /**
     * Table trx.
     * 
     * @param string $role_to_users
     */
    private $role_to_users = 'role_to_users';

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
        $this->db->select('id, name, description, created_at, created_by');
        $this->db->from($this->table);
        $this->db->where('id !=', 1);
        $result = $this->db->get()->result();
        return $result ? $result : [];
    }

    /**
     * Find data based on $id.
     * 
     * @param string|int $userID
     * 
     * @return object|null
     */
    public function getByUser($userID) {
        $this->db->select('r.id, r.name');
        $this->db->from($this->table.' r');
        $this->db->join($this->role_to_users.' ru', 'ru.role_id = r.id');
        $this->db->where('ru.user_id', $userID);
        return $this->db->get()->result();
    }

    /**
     * Delete assigned role by ID.
     * 
     * @param array $id ID User
     * 
     * @return bool
     */
    public function deleteAssignedRoles($id) {
        $this->db->where('user_id', $id)->delete($this->role_to_users);
        return (bool) $this->db->affected_rows();
    }

    /**
     * Find data based on $id.
     * 
     * @param string $id
     * 
     * @return object|null
     */
    public function find($id) {
        $this->db->select('id, name, description, created_at, created_by');
        $this->db->from($this->table);
        $this->db->where('id', $id);
        $result = $this->db->get()->row();
        if (empty($result)) {
            return null;
        }

        $this->load->model('setting/M_Permissions', 'permission', TRUE);
        $permissions = $this->permission->getByRole([$result->name]);
        $tempPermissions = array_column($permissions, 'id');
        $result->permissions = $permissions;
        $result->permissions_json = json_encode($tempPermissions);
        return $result;
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
            if ($d->name !== 'super admin') {
                if ($this->authenticated->can('can update roles')) {
                    $actions .= '<button class="btn btn-sm btn-warning" onclick="openUpdate(\'' . $d->id . '\')" title="Edit Role"><i class="fa fa-edit"></i></button>';
                }
                if ($this->authenticated->can('can delete roles')) {
                    $actions .= '<button class="btn btn-sm btn-danger" onclick="destroy(\'' . $d->id . '\')" title="Delete Role"><i class="fa fa-trash"></i></button>';
                }
                if ($this->authenticated->can('can assign permissions')) {
                    $actions .= '<a href="'.base_url('setting/role/assign/'.$d->id).'" class="btn btn-sm btn-success" title="Assign Permission to Role"><i class="fas fas fa-user-tag"></i></a>';
                }
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
        $this->db->select('id, name, description, created_by, created_at');
        $this->db->from($this->table);
        if (!empty($search)) {
            $this->db->group_start();
                $this->db->like('LOWER(name)', $search);
                $this->db->or_like('LOWER(description)', $search);
            $this->db->group_end();
        }
        $this->db->limit($length, $start);
        $this->db->order_by('id', 'ASC');
        return $this->db->get()->result();
    }

    /**
     * Assign permissions to role
     * 
     * @param string|int $role_id
     * @param array      $permission_id
     * @param string     $username
     * @return array
     */
    public function assign($role_id, $permission_id, $username) {
        $this->db->trans_start();
        $this->db->trans_strict(FALSE);

        $this->deleteOldPermission($role_id, $permission_id);
        $this->insertIfNotExists($role_id, $permission_id, $username);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();

            return false;
        }

        $this->db->trans_commit();
        return true;
    }

    /**
     * Assign permissions to role
     * 
     * @param string|int $role_id
     * @param array      $permission_id
     * @param string     $username
     * @return array
     */
    public function assignOne($role_id, $permission_id, $username) {
        $this->db->trans_start();
        $this->db->trans_strict(FALSE);

        $this->insertIfNotExists($role_id, $permission_id, $username);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();

            return false;
        }

        $this->db->trans_commit();
        return true;
    }

    /**
     * Delete old permission
     * 
     * @param string|int $role_id
     * @param array      $permission_id
     * @return int
     */
    private function deleteOldPermission($role_id, $permission_id) {
        $this->db->where_not_in('permission_id', $permission_id);
        $this->db->where('role_id', $role_id);
        $this->db->delete($this->permission_to_roles);
        return $this->db->affected_rows();
    }

    /**
     * Insert if not exists
     * 
     * @param string|int $role_id
     * @param array      $permission_id
     * @param string     $username
     * @return int
     */
    private function insertIfNotExists($role_id, $permission_id, $username) {
        $res = $this->db->select('role_id, permission_id')->from($this->permission_to_roles)
            ->where('role_id', $role_id)
            ->where_in('permission_id', $permission_id)
            ->get()->result_array();

        $tempPermissionID = array_column($res, 'permission_id');
        $param = [];
        foreach ($permission_id as $p) {
            if (!in_array($p, $tempPermissionID)) {
                $param[] = [
                    'role_id' => $role_id,
                    'permission_id' => $p,
                    'created_at' => date('Y-m-d H:i:s'),
                    'created_by' => $username,
                ];
            }
        }

        if (count($param) > 0) {
            $this->db->insert_batch($this->permission_to_roles, $param);
        }
        return;
    }
}
