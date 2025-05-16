<?php defined('BASEPATH') OR exit('No direct script access allowed');

Class Dashboard extends CI_Controller {
    /**
     * Page title.
     * 
     * @param string $title
     */
    private $title;

    public function __construct() {
        parent::__construct();
        $this->title = 'Dashboard';
        $this->authenticated->checkAuth();
    }

    /**
     * Index page.
     * 
     * @return view
     */
    public function index() {
        $this->load->model('M_Influencer_request', 'ir', TRUE);

        $data = [
            'toDoList' => $this->ir->getToDoList(),
            'title' => $this->title,
            'view' => 'admin/dashboard/index',
            'js' => [
                'admin/dashboard/index.php',
            ],
        ];

        return $this->load->view('layout/admin/wrapper', $data);
    }

    /**
     * Function for datatables.
     * 
     * @return string JSON
     */
    public function toDoList() {
        $this->load->model('M_Influencer_request', 'ir', TRUE);

        $return = [
            'status' => TRUE,
            'statusCode' => 200,
            'message' => 'Records found',
            'data' => $this->ir->getToDoList(),
        ];
        echo json_encode($return);
        return;
    }

}
