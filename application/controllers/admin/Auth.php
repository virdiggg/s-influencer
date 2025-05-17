<?php defined('BASEPATH') OR exit('No direct script access allowed');

Class Auth extends CI_Controller {
  public function __construct() {
    parent::__construct();
  }

  public function index() {
    return $this->load->view('layout/admin/auth');
  }
}
