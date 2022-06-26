<?php defined('BASEPATH') or exit('No direct script access allowed');

class User extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $response = json_decode($this->api('user/user'));
        if ($response->status !== 'success') {

        }

        $this->load->view('_layouts/master', [
            'child' => 'user/index',
            'users' => $response->users,
            'scripts' => [
                'assets/custom/general.js',
            ],
        ]);
    }

    public function display_add()
    {
        $response = json_decode($this->api('role/role'));

        $this->load->view('_layouts/master', [
            'child' => 'user/add',
            'roles' => $response->roles,
        ]);
    }

    public function store()
    {
        $data = [
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'role_id' => $this->input->post('role'),
        ];

        $response = json_decode($this->api('user/user', $data, 'post'));
        if ($response->status !== 'success') {
            $this->session->set_flashdata('alert_fail', $response->message);
            redirect('user/add');
        }

        $this->session->set_flashdata('alert_success', $response->message);
        redirect('user');

    }

    public function display_edit($userid)
    {
        $response = json_decode($this->api("user/user/{$userid}"));
        $response2 = json_decode($this->api('role/role'));

        $this->load->view('_layouts/master', [
            'child' => 'user/edit',
            'user' => $response->user,
            'roles' => $response2->roles,
        ]);
    }

    public function update($userid)
    {
        $data = [
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'role_id' => $this->input->post('role'),
        ];

        $response = json_decode($this->api("user/user/{$userid}", $data, 'put'));
        if ($response->status !== 'success') {
            $this->session->set_flashdata('alert_fail', $response->message);
            redirect('user/' . $userid);
        }

        $this->session->set_flashdata('alert_success', $response->message);
        redirect('user');
    }

    public function delete($userid)
    {
        echo $this->api("user/user/{$userid}", null, 'delete');
    }
}
