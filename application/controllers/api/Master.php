<?php defined('BASEPATH') OR exit('No direct script access allowed');

Class Master extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('M_Master', 'master', TRUE);
    }

    public function categories() {
        // if (!$this->authenticated->isAuthenticated()) {
        //     http_response_code(401);
        //     echo json_encode([
        //         'status' => FALSE,
        //         'statusCode' => 401,
        //         'message' => 'Session expired',
        //     ]);
        //     return;
        // }

        echo json_encode([
            'status' => TRUE,
            'statusCode' => 200,
            'message' => 'Data ditemukan',
            'data' => $this->master->categories(),
        ]);
        return;
    }

    public function areas() {
        // if (!$this->authenticated->isAuthenticated()) {
        //     http_response_code(401);
        //     echo json_encode([
        //         'status' => FALSE,
        //         'statusCode' => 401,
        //         'message' => 'Unauthorized',
        //     ]);
        //     return;
        // }

        echo json_encode([
            'status' => TRUE,
            'statusCode' => 200,
            'message' => 'Data ditemukan',
            'data' => $this->master->areas(),
        ]);
        return;
    }

    public function influencers() {
        if (!$this->authenticated->isAuthenticated()) {
            http_response_code(401);
            echo json_encode([
                'status' => FALSE,
                'statusCode' => 401,
                'message' => 'Unauthorized',
            ]);
            return;
        }

        $this->form_validation->set_rules('length', 'Length', 'trim');
        $this->form_validation->set_rules('start', 'Start', 'trim');
        $this->form_validation->set_rules('search', 'Search', 'trim');
        $this->form_validation->set_rules('area', 'Area', 'trim');
        $this->form_validation->set_rules('category', 'Category', 'trim');
        $this->form_validation->set_rules('er_min', 'ER Min', 'trim');
        $this->form_validation->set_rules('er_max', 'ER Max', 'trim');
        $this->form_validation->set_rules('followers_min', 'Followers Min', 'trim');
        $this->form_validation->set_rules('followers_max', 'Followers Max', 'trim');

        if ($this->form_validation->run() === FALSE) {
            http_response_code(422);
            echo json_encode([
                'status' => FALSE,
                'statusCode' => 422,
                'message' => validation_errors(),
            ]);
            return;
        }

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

        $result = $this->master->influencers($length, $start, [
            'search' => $search,
            'area' => $area,
            'category' => $category,
            'engagement_rate_bottom' => $er_min,
            'engagement_rate_top' => $er_max,
            'followers_bottom' => $followers_min,
            'followers_top' => $followers_max,
        ]);

        echo json_encode([
            'status' => TRUE,
            'statusCode' => 200,
            'message' => 'Data ditemukan',
            'data' => $result['data'],
            'draw' => intval($draw),
            'recordsTotal' => $result['total'],
            'recordsFiltered' => $result['total'],
        ]);
        return;
    }
}
