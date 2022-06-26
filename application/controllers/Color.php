<?php defined('BASEPATH') or exit('No direct script access allowed');

class Color extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $response = json_decode($this->api('color/color'));
        if ($response->status !== 'status') {

        }

        $this->load->view('_layouts/master', [
            'child' => 'color/index',
            'colors' => $response->colors,
            'scripts' => [
                'assets/custom/general.js',
            ],
        ]);
    }

    public function display_add()
    {
        $this->load->view('_layouts/master', [
            'child' => 'color/add',
        ]);
    }

    public function store()
    {
        $data = [
            'name' => $this->input->post('name'),
            'code' => $this->input->post('code'),
        ];

        $response = json_decode($this->api('color/color', $data, 'post'));
        if ($response->status !== 'success') {
            $this->session->set_flashdata('alert_fail', $response->message);
            redirect('color/add');
        }

        $this->session->set_flashdata('alert_success', $response->message);
        redirect('color');

    }

    public function display_edit($colorid)
    {
        $response = json_decode($this->api("color/color/{$colorid}"));

        $this->load->view('_layouts/master', [
            'child' => 'color/edit',
            'color' => $response->color,
        ]);
    }

    public function update($colorid)
    {
        $data = [
            'name' => $this->input->post('name'),
            'code' => $this->input->post('code'),
        ];

        $response = json_decode($this->api("color/color/{$colorid}", $data, 'put'));

        if ($response->status !== 'success') {
            $this->session->set_flashdata('alert_fail', $response->message);
            redirect('color/' . $colorid);
        }

        $this->session->set_flashdata('alert_success', $response->message);
        redirect('color');
    }

    public function delete($colorid)
    {
        echo $this->api("color/color/{$colorid}", null, 'delete');
    }
}
