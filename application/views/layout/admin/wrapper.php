<?php

$this->authenticated->checkAuthAdmin();

require_once(LAYOUT_PATH . 'admin' . DIRECTORY_SEPARATOR . 'header.php');
require_once(LAYOUT_PATH . 'admin' . DIRECTORY_SEPARATOR . 'head.php');
require_once(LAYOUT_PATH . 'admin' . DIRECTORY_SEPARATOR . 'sidebar.php');
require_once(LAYOUT_PATH . 'admin' . DIRECTORY_SEPARATOR . 'content.php');
require_once(LAYOUT_PATH . 'admin' . DIRECTORY_SEPARATOR . 'foot.php');
require_once(LAYOUT_PATH . 'admin' . DIRECTORY_SEPARATOR . 'footer.php');
