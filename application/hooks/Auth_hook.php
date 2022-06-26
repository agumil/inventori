<?php
class Auth_hook
{
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
    }

    public function isLoggedIn()
    {
        $this->CI->load->helper('url');

        $is_current_root = current_url() == site_url();

        if (isset($_SESSION['userid']) && $is_current_root) {
            redirect('dashboard');
        }

        if ($is_current_root) {
            return;
        }

        if (!isset($_SESSION['userid'])) {
            redirect('/');
        }
    }
}
