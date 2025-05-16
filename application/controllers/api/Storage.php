<?php defined('BASEPATH') or exit('No direct script access allowed');

use Virdiggg\LogParserCI3\MYViewer;

class Storage extends CI_Controller
{
    public $logs;
    public function __construct()
    {
        parent::__construct();
        loadHttpHeaders(true);
    }

    public function index($slug = null) {
        $slug = $this->input->get('s');
        $result = parseImageSlug($slug);

        header('Content-Type: ' . $result->mime);
        header('Content-Disposition: inline; filename="' . basename($result->name) . '"');
        header('Content-Length: ' . filesize($result->name));
        readfile($result->name);
        return;
    }
}