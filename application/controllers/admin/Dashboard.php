<?php defined('BASEPATH') OR exit('No direct script access allowed');

Class Dashboard extends CI_Controller {
    private $title;

    public function __construct() {
        parent::__construct();
        $this->title = 'Dashboard';
        $this->authenticated->checkAuth();
    }

    public function index() {
        $data = [
            'title' => $this->title,
            'view' => 'admin/dashboard/index',
            'js' => [
                'admin/dashboard/index.php',
            ],
        ];

        return $this->load->view('layout/admin/wrapper', $data);
    }
}
