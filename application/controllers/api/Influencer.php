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

        // From input hidden, just name it ID for simplicity
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
            'message' => 'Data has been saved',
        ]);
        return;
    }

    public function requests() {
        if (!$this->authenticated->isAuthenticated()) {
            http_response_code(401);
            echo json_encode([
                'status' => FALSE,
                'statusCode' => 401,
                'message' => 'Unauthorized',
            ]);
            return;
        }

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

    public function approve() {
        if (!$this->authenticated->isAuthenticated()) {
            http_response_code(401);
            echo json_encode([
                'status' => FALSE,
                'statusCode' => 401,
                'message' => 'Unauthorized',
            ]);
            return;
        }

        // From input hidden, just name it ID for simplicity
        $this->form_validation->set_rules('id', 'ID', 'required|trim');

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

        $id = sanitizeString($this->input->post('id'));
        $result = $this->ir->approve($id);

        if (!$result) {
            http_response_code(500);
            echo json_encode([
                'status' => FALSE,
                'statusCode' => 500,
                'message' => 'Failed to approve the request',
            ]);
            return;
        }

        http_response_code(201);
        echo json_encode([
            'status' => TRUE,
            'statusCode' => 201,
            'message' => 'Request has been approved',
        ]);
        return;
    }

    public function reject() {
        if (!$this->authenticated->isAuthenticated()) {
            http_response_code(401);
            echo json_encode([
                'status' => FALSE,
                'statusCode' => 401,
                'message' => 'Unauthorized',
            ]);
            return;
        }

        // From input hidden, just name it ID for simplicity
        $this->form_validation->set_rules('id', 'ID', 'required|trim');

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

        $id = sanitizeString($this->input->post('id'));
        $result = $this->ir->reject($id);

        if (!$result) {
            http_response_code(500);
            echo json_encode([
                'status' => FALSE,
                'statusCode' => 500,
                'message' => 'Failed to reject the request',
            ]);
            return;
        }

        http_response_code(201);
        echo json_encode([
            'status' => TRUE,
            'statusCode' => 201,
            'message' => 'Request has been rejected',
        ]);
        return;
    }

    public function destroy() {
        if (!$this->authenticated->isAuthenticated()) {
            http_response_code(401);
            echo json_encode([
                'status' => FALSE,
                'statusCode' => 401,
                'message' => 'Unauthorized',
            ]);
            return;
        }

        // From input hidden, just name it ID for simplicity
        $this->form_validation->set_rules('id', 'ID', 'required|trim');

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

        $id = sanitizeString($this->input->post('id'));
        $result = $this->ir->destroy($id);

        if (!$result) {
            http_response_code(500);
            echo json_encode([
                'status' => FALSE,
                'statusCode' => 500,
                'message' => 'Failed to delete the request',
            ]);
            return;
        }

        http_response_code(201);
        echo json_encode([
            'status' => TRUE,
            'statusCode' => 201,
            'message' => 'Request has been deleted',
        ]);
        return;
    }

    public function datatables() {
        if (!$this->authenticated->isAuthenticated()) {
            http_response_code(401);
            echo json_encode([
                'status' => FALSE,
                'statusCode' => 401,
                'message' => 'Unauthorized',
                'draw' => 1,
                'iTotalRecords' => 0,
                'iTotalDisplayRecords' => 0,
                'aaData' => [],
            ]);
            return;
        }

        $this->load->model('M_Influencer_request', 'ir', TRUE);

        $draw = $this->input->post('draw') ?: 1;
        $length = $this->input->post('length') ?: 10;
        $start = $this->input->post('start') ?: 0;
        $search = $this->input->post('search') ? strtolower($this->input->post('search')) : null;
        $result = $this->ir->datatables($length, $start, $search);
        $return = [
            'status' => TRUE,
            'statusCode' => 200,
            'draw' => intval($draw),
            'iTotalRecords' => $result['totalRecords'],
            'iTotalDisplayRecords' => $result['totalRecords'],
            'aaData' => $result['data'],
        ];

        echo json_encode($return);
        return;
    }
}
