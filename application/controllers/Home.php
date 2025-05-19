<?php defined('BASEPATH') OR exit('No direct script access allowed');

Class Home extends CI_Controller {
    private $title;

    public function __construct() {
        parent::__construct();
        $this->title = 'Home';
    }

    public function index() {
        $data = [
            'title' => $this->title,
            'view' => 'home/index',
            'js' => [
                'home/auth.php',
                'home/index.php',
            ],
        ];

        return $this->load->view('layout/topnav/wrapper', $data);
    }

    public function myRequest() {
        if (!getSession('role')) {
            return redirect('/');
        }

        $data = [
            'title' => $this->title,
            'view' => 'home/request',
            'js' => [
                'home/request.php',
            ],
        ];

        return $this->load->view('layout/topnav/wrapper', $data);
    }
}
