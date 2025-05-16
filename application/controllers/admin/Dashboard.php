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
        $data = [
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
    public function datatables() {
        $draw = $this->input->post('draw') ?: 1;
        $length = $this->input->post('length') ?: 10;
        $start = $this->input->post('start') ?: 0;
        $search = $this->input->post('search') ? strtolower($this->input->post('search')) : null;
        // $columnIndex = $this->input->post('order')[0]['column']; // Column index
        // $columnName = $this->input->post('columns')[$columnIndex]['data']; // Column name
        // $columnSortOrder = $this->input->post('order')[0]['dir']; // asc or desc

        // Your datatables query here.
        // $datatables = [];
        // $totalRecordsWithFilter = 0;
        // $totalRecords = 0;

        $return = [
            'status' => TRUE,
            'message' => 'Data ditemukan',
            'draw' => intval($draw),
            // 'aaData' => $datatables,
            // 'iTotalDisplayRecords' => $totalRecordsWithFilter,
            // 'iTotalRecords' => $totalRecords,
        ];
        echo json_encode($return);
        return;
    }

}
