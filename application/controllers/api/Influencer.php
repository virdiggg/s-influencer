<?php defined('BASEPATH') OR exit('No direct script access allowed');

Class Influencer extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->authenticated->checkAuth();
    }

    public function store() {
        if (!$this->authenticated->isAuthenticated()) {
            http_response_code(401);
            echo json_encode([
                'status' => FALSE,
                'statusCode' => 401,
                'message' => 'Unauthorized',
            ]);
            return;
        }

        // From input hidden, just name it ID
        $this->form_validation->set_rules('influencer_id', 'ID', 'required|trim');
        $this->form_validation->set_rules('username_instagram', 'ID', 'required|trim');
        $this->form_validation->set_rules('followers', 'ID', 'required|trim');
        $this->form_validation->set_rules('engagement_rate', 'ID', 'required|trim');
        $this->form_validation->set_rules('name', 'ID', 'required|trim');
        // From user's input
        $this->form_validation->set_rules('note', 'Note', 'required|trim');

        if ($this->form_validation->run() === FALSE) {
            http_response_code(422);
            echo json_encode([
                'status' => FALSE,
                'statusCode' => 422,
                'message' => validation_errors(),
            ]);
            return;
        }

        $this->load->model('M_Influencer_request', 'ir', TRUE);

        $result = $this->ir->create([
            'influencer_id' => sanitizeString($this->input->post('influencer_id')),
            'username_instagram' => sanitizeString($this->input->post('username_instagram')),
            'followers' => normalizeNumber(sanitizeString($this->input->post('followers'))),
            'engagement_rate' => (float) sanitizeString($this->input->post('engagement_rate')),
            'name' => sanitizeString($this->input->post('name')),
            'note' => sanitizeString($this->input->post('note')),
        ]);

        if (!$result) {
            http_response_code(500);
            echo json_encode([
                'status' => FALSE,
                'statusCode' => 500,
                'message' => 'Failed to save data',
            ]);
            return;
        }

        http_response_code(201);
        echo json_encode([
            'status' => TRUE,
            'statusCode' => 201,
            'message' => 'Successfully saved data',
        ]);
        return;
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
