<?php defined('BASEPATH') or exit('No direct script access allowed');

class Material extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $response = json_decode($this->api('material/material'));
        if ($response->status !== 'success') {

        }

        $this->load->view('_layouts/master', [
            'child' => 'material/index',
            'materials' => $response->materials,
            'scripts' => [
                'assets/custom/general.js',
            ],
        ]);
    }

    public function display_add()
    {
        $this->load->view('_layouts/master', [
            'child' => 'material/add',
        ]);
    }

    public function store()
    {
        $data = [
            'name' => $this->input->post('name'),
        ];

        $response = json_decode($this->api('material/material', $data, 'post'));
        if ($response->status !== 'success') {
            $this->session->set_flashdata('alert_fail', $response->message);
            redirect('material/add');
        }

        $this->session->set_flashdata('alert_success', $response->message);
        redirect('material');

    }

    public function display_edit($materialid)
    {
        $response = json_decode($this->api("material/material/{$materialid}"));

        $this->load->view('_layouts/master', [
            'child' => 'material/edit',
            'material' => $response->material,
        ]);
    }

    public function update($materialid)
    {
        $data = [
            'name' => $this->input->post('name'),
        ];

        $response = json_decode($this->api("material/material/{$materialid}", $data, 'put'));

        if ($response->status !== 'success') {
            $this->session->set_flashdata('alert_fail', $response->message);
            redirect('material/' . $materialid);
        }

        $this->session->set_flashdata('alert_success', $response->message);
        redirect('material');
    }

    public function delete($materialid)
    {
        echo $this->api("material/material/{$materialid}", null, 'delete');
    }
}
