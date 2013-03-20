<?php
class Welcome extends CI_Controller {
    public function index() {
        $this->template->load('userTemplate', 'welcome');
    }
}
?>
