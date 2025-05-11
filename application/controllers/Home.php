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
                'home/index.php'
            ],
        ];

        $this->load->model('M_Master', 'master', TRUE);
        $draw = $this->input->post('draw') ? sanitizeString($this->input->post('draw')) : 1;
        $length = $this->input->post('length') ? sanitizeString($this->input->post('length')) : 10;
        $start = $this->input->post('start') ? sanitizeString($this->input->post('start')) : 0;
        $search = $this->input->post('search') ? strtolower(sanitizeString($this->input->post('search'))) : null;
        $area = $this->input->post('area') ? sanitizeString($this->input->post('area')) : [];
        $category = $this->input->post('category') ? sanitizeString($this->input->post('category')) : null;
        $er_min = $this->input->post('er_min') ? sanitizeString($this->input->post('er_min')) : null;
        $er_max = $this->input->post('er_max') ? sanitizeString($this->input->post('er_max')) : null;
        $followers_min = $this->input->post('followers_min') ? sanitizeString($this->input->post('followers_min')) : null;
        $followers_max = $this->input->post('followers_max') ? sanitizeString($this->input->post('followers_max')) : null;

        $result = $this->master->datatables($length, $start, [
            'search' => $search,
            'area' => $area,
            'category' => $category,
            'engagement_rate_bottom' => $er_min,
            'engagement_rate_top' => $er_max,
            'followers_bottom' => $followers_min,
            'followers_top' => $followers_max,
        ]);

        dd($result);
        return $this->load->view('layout/topnav/wrapper', $data);
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
