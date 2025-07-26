<?php defined('BASEPATH') OR exit('No direct script access allowed');

Class M_Users extends CI_model {
    private $table = 'users';

    public function __construct() {
        parent::__construct();
    }

    public function findByToken($token) {
        $this->db->select('id, username, full_name, phone, is_active');
        $this->db->from($this->table);
        $this->db->where('auth_token', $token);
        return $this->db->get()->row();
    }

    public function get() {
        $this->db->select('id, username, full_name, phone, is_active');
        $this->db->from($this->table);
        $result = $this->db->get()->result();
        return $result ? $result : [];
    }

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

        $username = getSession('username') ?: 'system';

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

    public function updateByID($id, $param) {
        $this->db->where('id', $id);
        $param['updated_at'] = date('Y-m-d H:i:s');
        $this->db->update($this->table, $param);

        return $this->find($id, 'id');
    }

    public function find($id, $var = 'id') {
        $this->db->select('id, username, full_name, password, token, auth_token, phone, is_active, last_login, created_at, created_by, role');
        $this->db->from($this->table);
        $this->db->where($var, $id);
        $result = $this->db->get()->row();
        if (empty($result)) {
            return null;
        }

        return $result;
    }

    public function findUnique($var, $val, $exceptID) {
        $this->db->select('id, username, password, token, auth_token, phone, is_active, last_login, created_at, created_by, role');
        $this->db->from($this->table);
        $this->db->where($var, $val);
        $this->db->where('id !=', $exceptID);
        return $this->db->get()->row();
    }

    public function authenticate($username, $password) {
        try {
            $this->db->select('id, username, full_name, password, token, auth_token, phone, is_active, last_login,
                created_at, created_by, role');
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
                'data' => null,
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

    public function update($username, $param, $isLogin = false) {
        $this->db->where('username', $username);
        $param['updated_at'] = date('Y-m-d H:i:s');
        if ($isLogin) {
            $param['last_login'] = $param['updated_at'];
        }
        $this->db->update($this->table, $param);

        return $this->find($username, 'username');
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

    public function _changePassword($username, $password) {
        return $this->update($username, ['password' => $password], false);
    }
}
