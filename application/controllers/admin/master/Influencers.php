<?php defined('BASEPATH') or exit('No direct script access allowed');

class Influencers extends CI_Controller
{
    private $title;

    public function __construct() {
        parent::__construct();
        $this->title = $this->config->item('app_name');
        $this->authenticated->checkAuth();
        $this->load->model('M_Master', 'mi', TRUE);
    }

    public function index() {
        if (getSession('role') === 'USER') {
            return redirect('/');
        }

        $data = [
            'title' => $this->title,
            'view' => 'admin/master/influencers/index',
            'js' => [
                'admin/master/influencers/index.php',
            ],
        ];

        return $this->load->view('layout/admin/wrapper', $data);
    }

    public function edit() {
        if (getSession('role') === 'USER') {
            return redirect('/');
        }

        $id = sanitizeString($this->input->get('id'));
        if (empty($id)) {
            return redirect('admin/master/influencers');
        }

        $influencer = $this->mi->find($id);
        if (empty($influencer)) {
            return redirect('admin/master/influencers');
        }

        $data = [
            'title' => $this->title,
            'view' => 'admin/master/influencers/edit',
            'js' => [
                'admin/master/influencers/edit.php',
            ],
            'data' => $influencer,
        ];

        return $this->load->view('layout/admin/wrapper', $data);
    }

    public function update() {
        if (!$this->authenticated->isAuthenticated() || getSession('role') === 'USER') {
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
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('engagement_rate', 'Engagement Rate', 'required|trim');
        $this->form_validation->set_rules('followers', 'Followers', 'required|trim');
        $this->form_validation->set_rules('category', 'Category', 'required|trim');

        if ($this->form_validation->run() === FALSE) {
            http_response_code(422);
            echo json_encode([
                'status' => FALSE,
                'statusCode' => 422,
                'message' => validation_errors(),
            ]);
            return;
        }

        $id = sanitizeString($this->input->post('id'));
        $username = strtolower(sanitizeString($this->input->post('username')));
        $name = sanitizeString($this->input->post('name'));
        $engagement_rate = (float) sanitizeString($this->input->post('engagement_rate'));
        $followers = (int) normalizeNumber($this->input->post('followers'));
        $category = sanitizeString($this->input->post('category'));
        $area = array_filter((array) $this->input->post('area')) ?: [];

        $result = $this->mi->update($id,
        [
            'username_instagram' => $username,
            'name' => $name,
            'engagement_rate' => $engagement_rate,
            'followers' => $followers,
            'category_id' => $category,
        ], $area);

        if (!$result) {
            http_response_code(500);
            echo json_encode([
                'status' => FALSE,
                'statusCode' => 500,
                'message' => 'Failed to update influencer',
            ]);
            return;
        }

        http_response_code(201);
        echo json_encode([
            'status' => TRUE,
            'statusCode' => 201,
            'message' => 'Influencer updated successfully',
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

        $id = sanitizeString($this->input->post('id'));
        $result = $this->mi->destroy($id);

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

        $draw = $this->input->post('draw') ?: 1;
        $length = $this->input->post('length') ?: 10;
        $start = $this->input->post('start') ?: 0;

        $search = strtolower(sanitizeString($this->input->post('search')));
        $area = $this->input->post('area') ? json_decode($this->input->post('area'), true) : [];
        $category = $this->input->post('category') ? json_decode($this->input->post('category'), true) : [];
        $er_min = sanitizeString($this->input->post('er_min'));
        $er_max = sanitizeString($this->input->post('er_max'));
        $followers_min = sanitizeString($this->input->post('followers_min'));
        $followers_max = sanitizeString($this->input->post('followers_max'));

        $filters = [
            'search' => $search ?: null,
            'area' => $area,
            'category' => $category,
            'engagement_rate_bottom' => $er_min ?: 0,
            'engagement_rate_top' => $er_max ?: null,
            'followers_bottom' => $followers_min ?: 5000,
            'followers_top' => $followers_max ?: null,
        ];

        $result = $this->mi->datatables($length, $start, $filters);
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
