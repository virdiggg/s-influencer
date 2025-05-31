<?php defined('BASEPATH') or exit('No direct script access allowed');

class Authenticated
{
    /**
     * Instance CI
     * 
     * @return object
     */
	private $CI;

    /**
     * Username of user
     * 
     * @param string
     */
    public $username;

    /**
     * State if user is admin
     * 
     * @param boolean
     */
    public $isAdmin;

    /**
     * State if user is DIP Staff
     * 
     * @param boolean
     */
    public $isDIPStaff;

    /**
     * User data
     * 
     * @param object|null $user
     */
    public $user;

	public function __construct()
	{
		$this->CI = &get_instance();

        $this->CI->load->helper(['encrypt', 'str']);
	}

    /**
     * Generate Bearer Token
     * 
     * @param object $user
     * @return string
     */
    public function generateBearerToken($user) {
        $param = [
            'user' => $user,
            'token' => $this->generateToken(),
            'expired_at' => date('Y-m-d H:i:s', strtotime('+12 hours')),
        ];

        return encrypt($param);
    }

    /**
     * Generate Access Token
     * 
     * @return string
     */
    public function generateToken() {
        return random_string('numeric', 6);
    }

    /**
     * Sign In to backend
     * 
     * @param string $username
     * @param string $password
     * 
     * @return object
     */
    public function signIn($username, $password) {
        $this->CI->load->model('setting/M_Users', 'user', TRUE);
        $result = $this->CI->user->authenticate($username, $password);
        if ($result['data'] === null) {
            return $this->asObject($result);
        }

        $this->setUserdata($result['data']);
        return $this->asObject($result);
    }

    /**
     * Return the given result as object
     * 
     * @param mixed $result
     * 
     * @return object
     */
    private function asObject($result) {
        return json_decode(json_encode($result));
    }

    /**
     * Determine if the active user is authenticated.
     * 
     * @param object $user
     * @return void
     */
    public function setUserdata($user) {
        foreach ($user as $key => $value) {
            $this->CI->session->set_userdata($key, $value);
        }
        return;
    }

    /**
     * Determine if the active user is authenticated.
     * 
     * @return bool|object
     */
    public function isAuthenticated() {
        return (bool) $this->CI->session->has_userdata('username');
    }

    /**
     * Determine if bearer token is valid
     * 
     * @return bool|object
     */
    public function tokenIsValid() {
        $headers = $this->CI->input->request_headers();
        $authorization = null;
        foreach ($headers as $key => $value) {
            $k = strtolower($key);
            if ($k === 'authorization') {
                $authorization = $value;
            }
        }

        if (!$authorization) {
            return false;
        }

        $pieces = explode(' ', $authorization);
        if (count($pieces) <> 2) {
            return false;
        }

        list($bearer, $token) = $pieces;
        try {
            $dataToken = decrypt($token);
        } catch (Exception $e) {
            return false;
        }

        if ($dataToken['expired_at'] < date('Y-m-d H:i:s')) {
            return false;
        }

        if (empty($dataToken['user'])) {
            return false;
        }

        $this->user = (object) $dataToken['user'];
        $this->username = $this->user->username;
        return $this->user;
    }

    /**
     * Verify if user has session
     * 
     * @return void|redirect
     */
    public function checkAuth() {
        if ($this->isAuthenticated() === false) {
            return redirect('auth');
        }

        return;
    }

    /**
     * Verify if user has session
     * 
     * @return void|redirect
     */
    public function checkAuthAdmin() {
        if ($this->isAuthenticated() === false) {
            return redirect('admin/auth');
        }

        return;
    }

    /**
     * Sign out and destroy session
     * 
     * @return void
     */
    public function signOut() {
        $this->CI->session->sess_destroy();
        return;
    }
}