<?php defined('BASEPATH') OR exit('No direct script access allowed');

Class M_Users extends CI_model {
    /**
     * Default table name.
     * 
     * @param string $table
     */
    private $table = 'users';

    /**
     * Table role.
     * 
     * @param string $table
     */
    private $roles = 'roles';

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
     * @return object|null
     */
    public function findByToken($token) {
        $this->db->select('id, username, full_name, phone, is_active');
        $this->db->from($this->table);
        $this->db->where('auth_token', $token);
        return $this->db->get()->row();
    }

    /**
     * Get all data from database.
     * 
     * @param string $role
     * @return array
     */
    public function getByRole($role) {
        $this->db->select('u.username, u.phone, u.full_name');
        $this->db->from($this->table.' u');
        $this->db->join($this->role_to_users.' ru', 'ru.user_id = u.id');
        $this->db->join($this->roles.' r', 'r.id = ru.role_id');
        $this->db->where('r.name', $role);
        $result = $this->db->get()->result_array();
        return $result ? $result : [];
    }

    /**
     * Get all data from database.
     * 
     * @return array
     */
    public function get() {
        $this->db->select('id, username, full_name, phone, is_active');
        $this->db->from($this->table);
        $result = $this->db->get()->result();
        return $result ? $result : [];
    }

    /**
     * Create user
     * 
     * @param array $param
     * @return int
     */
    public function create($param) {
        $this->db->trans_start();
        $this->db->trans_strict(FALSE);

        $var = $val = $where = [];

        foreach ($param as $i => $p) {
            $p = !empty($p) ? $this->db->escape($p) : 'null';
            $var[] = '"'.$i.'"';
            $val[] = $p;
            $where[] = '"'.$i.'" = '.$p;
        }

        $username = $this->session->has_userdata('username') ? getSession('username') : 'system';

        $var[] = 'created_at, created_by, updated_at, updated_by';
        $val[] = "NOW(), '" . $username . "', NOW(), '" . $username . "'";

        $query = 'INSERT INTO ' . $this->table . ' (' . join(',', $var) . ') SELECT * FROM (SELECT ' . join(',', $val) . ') AS tmp WHERE NOT EXISTS (SELECT id FROM ' . $this->table . ' WHERE ' . join(' AND ', $where) . ') LIMIT 1;';
        $this->db->query($query);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();

            return false;
        }

        $this->db->trans_commit();
        return true;
    }

    /**
     * Update user
     * 
     * @param string|int $id
     * @param array      $param
     * @return bool
     */
    public function updateByID($id, $param) {
        $this->db->where('id', $id);
        $param['updated_at'] = date('Y-m-d H:i:s');
        $this->db->update($this->table, $param);

        return $this->find($id, 'id');
    }

    /**
     * Update user
     * 
     * @param string|int $id
     * @param string     $status
     * @return bool
     */
    public function toggleStatus($id, $status) {
        if ($status === 'active') {
            $param = ['is_active' => 'Y'];
        } else {
            $param = ['is_active' => 'N'];
        }

        $param['updated_at'] = date('Y-m-d H:i:s');
        return $this->updateByID($id, $param);
    }

    /**
     * Delete a row.
     * 
     * @param string|int $id
     * 
     * @return bool
     */
    public function delete($id) {
        $this->load->model('setting/M_Roles', 'role', TRUE);

        $this->db->trans_start();
        $this->db->trans_strict(FALSE);

        $this->db->where('id', $id)->delete($this->table);

        $this->role->deleteAssignedRoles($id);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();

            return false;
        }

        $this->db->trans_commit();
        return true;
    }

    /**
     * Datatables.
     * 
     * @param string|null     $is_active
     * @param string|int|null $role_id
     * @param string|int      $length
     * @param string|int      $start
     * @param string|null     $search
     * 
     * @return array
     */
    public function datatables($is_active = null, $role_id = null, $length = 10, $start = 0, $search = NULL) {
        $result = $this->queryDatatables($is_active, $role_id, $length, $start, $search);
        $countResult = count($result);

        if ($countResult >= $length) {
            $resultNextPage = $this->queryDatatables($is_active, $role_id, $length, $start + $length, $search);
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
            if ($d->is_active === 'Y') {
                $status = 'Aktif';
                $var = 'nonactive';
                $label = 'Nonaktifkan';
                $fa = 'fa-user-times';
            } else {
                $status = 'Tidak Aktif';
                $var = 'active';
                $label = 'Aktifkan';
                $fa = 'fa-user-edit';
            }

            $actTemp = '';
            if ($this->authenticated->can('can update users')) {
                $actTemp .= '<a href="'.base_url('setting/user/edit/'.$d->id).'" class="dropdown-item" title="Edit User"><i class="fa fa-edit"></i> Edit User</a>';
            }
            if ($this->authenticated->can('can reset user password')) {
                $actTemp .= '<button class="dropdown-item" onclick="resetPassword(\'' . $d->username . '\')" title="Reset Password"><i class="fas fa-lock"></i> Reset Password</button>';
            }
            if ($this->authenticated->can('can change user status')) {
                $actTemp .= '<button class="dropdown-item" onclick="toggleStatus(\'' . $d->id . '\', \'' . $var . '\', \'' . $label . '\')" title="' . $label . ' User"><i class="fas '.$fa.'"></i> '.$label.' User</button>';
            }
            if ($this->authenticated->can('can delete users')) {
                $actTemp .= '<button class="dropdown-item" onclick="destroyUser(\'' . $d->id . '\')" title="Delete User"><i class="fa fa-trash"></i> Delete User</button>';
            }
            if ($this->authenticated->can('can assign roles')) {
                $actTemp .= '<a href="'.base_url('setting/user/assign/'.$d->id).'" class="dropdown-item" title="Assign Role to User"><i class="fas fas fa-user-tag"></i> Assign Role to User</a>';
            }

            if ($actTemp) {
                $actions = '<div class="btn-group">
                <button type="button" class="btn btn-success btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu" role="menu">'.$actTemp.'</div></div>';
            } else {
                $actions = $actTemp;
            }

            $start ++;
            $d->no = $start;
            $d->actions = $actions;
            $d->last_login = $d->last_login ?: '-';
            $d->is_active = $status;
        }

        return $result;
    }

    /**
     * Datatables.
     * 
     * @param string|null     $is_active
     * @param string|int|null $role_id
     * @param string|int      $length
     * @param string|int      $start
     * @param string|null     $search
     * 
     * @return array
     */
    public function queryDatatables($is_active = null, $role_id = null, $length = 10, $start = 0, $search = NULL) {
        $this->db->select("u.id, u.username, u.full_name, u.phone, u.last_login, u.is_active,
            STRING_AGG(
                r.name, ', ' ORDER BY r.name
            ) AS roles");
        $this->db->from($this->table . ' u');
        $this->db->join($this->role_to_users . ' ru', 'ru.user_id = u.id', 'LEFT');
        $this->db->join($this->roles . ' r', 'r.id = ru.role_id', 'LEFT');

        if (!empty($search)) {
            $this->db->group_start();
                $this->db->like('LOWER(username)', $search);
                $this->db->or_like('LOWER(full_name)', $search);
                $this->db->or_like('LOWER(phone)', $search);
            $this->db->group_end();
        }

        if (!empty($is_active)) {
            $this->db->where('u.is_active', $is_active);
        }

        if (!empty($role_id)) {
            $this->db->where('ru.role_id', $role_id);
        }

        $this->db->group_by('u.id, u.username, u.full_name, u.phone, u.last_login, u.is_active');
        $this->db->limit($length, $start);
        return $this->db->get()->result();
    }

    /**
     * Find data based on $id.
     * 
     * @param string $id
     * @param string $var
     * 
     * @return object|null
     */
    public function find($id, $var = 'id') {
        $this->db->select('id, username, full_name, password, token, auth_token, phone, is_active, last_login, created_at, created_by');
        $this->db->from($this->table);
        $this->db->where($var, $id);
        $result = $this->db->get()->row();
        if (empty($result)) {
            return null;
        }

        $this->load->model('setting/M_Roles', 'role', TRUE);
        $roles = $this->role->getByUser($result->id);
        $tempRoles = array_column($roles, 'id');
        $result->roles = $roles;
        $result->roles_json = json_encode($tempRoles);
        return $result;
    }

    /**
     * Find unique row.
     * 
     * @param string     $var
     * @param string     $val
     * @param string|int $exceptID
     * 
     * @return object|null
     */
    public function findUnique($var, $val, $exceptID) {
        $this->db->select('id, username, password, token, auth_token, phone, is_active, last_login, created_at, created_by');
        $this->db->from($this->table);
        $this->db->where($var, $val);
        $this->db->where('id !=', $exceptID);
        return $this->db->get()->row();
    }

    /**
     * Authenticate user.
     * 
     * @param string $username
     * @param string $password
     * @param string $key
     * 
     * @return object|null
     */
    public function authenticate($username, $password) {
        try {
            $this->db->select('id, username, full_name, password, token, auth_token, phone, is_active, last_login,
                created_at, created_by');
            $this->db->from($this->table);
            $this->db->group_start();
                $this->db->where('username', $username);
            $this->db->group_end();
            $this->db->where('is_active', true);
            $res = $this->db->get()->row_array();

            if (!$res) {
                throw new Exception('User not found.');
            }

            if (!password_verify($password, $res['password'])) {
                throw new Exception('Password doesn\'t match.');
            }

        } catch (\Throwable $th) {
            return [
                'status' => false,
                'message' => $th->getMessage(),
            ];
        }

        unset($res['password'], $res['token'], $res['auth_token']);
        $this->update($res['username'], [], true);

        return [
            'status' => true,
            'message' => 'Record found.',
            'data' => $res,
        ];
    }

    /**
     * Update user row by username
     * 
     * @param string $username
     * @param array  $param
     * @param bool   $isLogin
     * 
     * @return object
     */
    public function update($username, $param, $isLogin = false) {
        $this->db->where('username', $username);
        $param['updated_at'] = date('Y-m-d H:i:s');
        if ($isLogin) {
            $param['last_login'] = date('Y-m-d H:i:s');
        }
        $this->db->update($this->table, $param);

        return $this->find($username, 'username');
    }

    /**
     * Assign permissions to role
     * 
     * @param string|int $user_id
     * @param array      $role_id
     * @param string     $username
     * @return array
     */
    public function assign($user_id, $role_id, $username) {
        $this->db->trans_start();
        $this->db->trans_strict(FALSE);

        $this->deleteOldRole($user_id, $role_id);
        $this->insertIfNotExists($user_id, $role_id, $username);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();

            return false;
        }

        $this->db->trans_commit();
        return true;
    }

    /**
     * Delete old role
     * 
     * @param string|int $user_id
     * @param array      $role_id
     * @return int
     */
    private function deleteOldRole($user_id, $role_id) {
        $this->db->where_not_in('role_id', $role_id);
        $this->db->where('user_id', $user_id);
        $this->db->delete($this->role_to_users);
        return $this->db->affected_rows();
    }

    /**
     * Insert if not exists
     * 
     * @param string|int $user_id
     * @param array      $role_id
     * @param string     $username
     * @return int
     */
    private function insertIfNotExists($user_id, $role_id, $username) {
        $res = $this->db->select('user_id, role_id')->from($this->role_to_users)
            ->where('user_id', $user_id)
            ->where_in('role_id', $role_id)
            ->get()->result_array();

        $tempRoleID = array_column($res, 'role_id');
        $param = [];
        foreach ($role_id as $p) {
            if (!in_array($p, $tempRoleID)) {
                $param[] = [
                    'user_id' => $user_id,
                    'role_id' => $p,
                    'created_at' => date('Y-m-d H:i:s'),
                    'created_by' => $username,
                ];
            }
        }

        if (count($param) > 0) {
            $this->db->insert_batch($this->role_to_users, $param);
        }
        return;
    }

    public function resetPassword($username) {
        return $this->_changePassword($username, $this->config->item('default_password'));
    }

    public function changePassword($username, $password, $oldPassword) {
        $res = $this->authenticate($username, $oldPassword);
        if ($res['status'] === false) {
            return $res;
        }

        $result = $this->_changePassword($username, password_hash($password, PASSWORD_BCRYPT));

        return $result ? [
            'status' => true,
            'message' => 'Update password success.',
        ] : [
            'status' => false,
            'message' => 'Update password failed.',
        ];
    }

    /**
     * Query change password
     * 
     * @param string $username
     * @param string $password Password SUDAH di-hash
     * 
     * @return object
     */
    public function _changePassword($username, $password) {
        return $this->update($username, ['password' => $password], false);
    }
}
