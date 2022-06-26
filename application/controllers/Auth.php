<?php defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('auth/login');
    }

    public function dologin()
    {
        $data = [
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
        ];

        $response = json_decode($this->api('auth/login', $data, 'POST'));
        if ($response->status !== 'success') {
            $this->session->set_flashdata('alert_fail', $response->message);
            redirect('auth');
        }

        $_SESSION['userid'] = $response->user->userid;
        $_SESSION['roleid'] = $response->user->roleid;
        $_SESSION['firstname'] = $response->user->firstname;
        $_SESSION['lastname'] = $response->user->lastname;

        redirect('dashboard');
    }

    public function logout()
    {
        unset($_SESSION);
        session_destroy();

        redirect('/');
    }
}
