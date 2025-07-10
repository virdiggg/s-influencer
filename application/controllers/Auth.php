<?php defined('BASEPATH') OR exit('No direct script access allowed');

Class Auth extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }

    public function signIn() {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() === FALSE) {
            http_response_code(422);
            echo json_encode([
                'status' => FALSE,
                'statusCode' => 422,
                'message' => validation_errors(),
            ]);
            return;
        }

        $result = $this->authenticated->signIn(sanitizeString($this->input->post('username')), sanitizeString($this->input->post('password')));
		if ($result->status === false) {
            http_response_code(500);
            echo json_encode([
                'status' => FALSE,
                'statusCode' => 500,
                'message' => $result->message,
            ]);
            return;
		}

        echo json_encode([
            'status' => TRUE,
            'statusCode' => 200,
            'message' => $result->message,
            'role' => $result->data->role
        ]);
        return;
    }

    public function signOut() {
        $this->authenticated->signOut();
        return redirect(base_url('admin/auth'));
    }
}
