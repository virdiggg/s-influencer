<?php defined('BASEPATH') OR exit('No direct script access allowed');

Class M_Rules extends CI_model {
    /**
     * Default table name.
     * 
     * @param string $table
     */
    private $table = 'users';

    /**
     * Table role milik user.
     * 
     * @param string $role_to_users
     */
    private $role_to_users = 'role_to_users';

    /**
     * Table role.
     * 
     * @param string $roles
     */
    private $roles = 'roles';

    /**
     * Table permission milik role.
     * 
     * @param string $permission_to_roles
     */
    private $permission_to_roles = 'permission_to_roles';

    /**
     * Table permission.
     * 
     * @param string $permissions
     */
    private $permissions = 'permissions';

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
     * Get users roles and permissions.
     * 
     * @param string $username
     * @return array
     */
    public function get($username) {
        $roles = $this->getRolesByUsername($username);

        if (empty($roles)) {
            return [
                'roles' => [],
                'permissions' => [],
            ];
        }

        $permissions = $this->getPermissionsByRoles($roles);

        return [
            'roles' => $roles,
            'permissions' => $permissions,
        ];
    }

    /**
     * Get list role by usernamename.
     * 
     * @param string $username
     * @return array
     */
    public function getRolesByUsername($username) {
        $this->db->select('r.name');
        $this->db->from($this->table.' u');
        $this->db->join($this->role_to_users.' ru', 'ru.user_id = u.id');
        $this->db->join($this->roles.' r', 'r.id = ru.role_id');
        $this->db->where('u.username', $username);
        $result = $this->db->get()->result_array();
        return array_values(array_unique(array_column($result, 'name')));
    }

    /**
     * Get list permission by role name.
     * 
     * @param mixed $roles
     * @return array
     */
    public function getPermissionsByRoles($roles) {
        // if (in_array('super admin', (array) $roles) === false) {
            // Kalo bukan super admin, ada permission-nya
            $this->db->select('p.name');
            $this->db->from($this->roles.' r');
            $this->db->join($this->permission_to_roles.' pr', 'pr.role_id = r.id');
            $this->db->join($this->permissions.' p', 'p.id = pr.permission_id');
            $this->db->where_in('r.name', (array) $roles);
        // } else {
        //     // Kalo super admin, permission diambil semua
        //     $this->db->select('p.name');
        //     $this->db->from($this->permissions.' p');
        // }

        $result = $this->db->get()->result_array();
        return array_values(array_unique(array_column($result, 'name')));
    }
}
