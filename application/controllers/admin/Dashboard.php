<?php defined('BASEPATH') OR exit('No direct script access allowed');

Class Dashboard extends CI_Controller {
    private $title;

    public function __construct() {
        parent::__construct();
        $this->title = $this->config->item('app_name');
        $this->authenticated->checkAuthAdmin();
    }

    public function index() {
        if (getSession('role') === 'USER') {
            return redirect('/');
        }

        $data = [
            'title' => $this->title,
            'view' => 'admin/dashboard/index',
            'js' => [
                'admin/dashboard/modal.php',
                'admin/dashboard/index.php',
            ],
        ];

        return $this->load->view('layout/admin/wrapper', $data);
    }
}
