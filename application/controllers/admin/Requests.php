<?php defined('BASEPATH') OR exit('No direct script access allowed');

Class Requests extends CI_Controller {
    private $title;

    public function __construct() {
        parent::__construct();
        $this->title = $this->config->item('app_name');
        $this->authenticated->checkAuth();
    }

    public function index() {
        if (getSession('role') === 'USER') {
            return redirect('/');
        }

        $data = [
            'title' => $this->title,
            'view' => 'admin/requests/index',
            'js' => [
                'admin/dashboard/modal.php',
                'admin/requests/index.php',
            ],
        ];

        return $this->load->view('layout/admin/wrapper', $data);
    }
}
