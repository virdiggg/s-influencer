<?php defined('BASEPATH') OR exit('No direct script access allowed');

Class Home extends CI_Controller {
    /**
     * Page title.
     * 
     * @param string $title
     */
    private $title;

    public function __construct() {
        parent::__construct();
        $this->title = 'Home';
        // $this->authenticated->checkAuth();
    }

    /**
     * Index page.
     * 
     * @return view
     */
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
}
