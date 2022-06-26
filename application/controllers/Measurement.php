<?php defined('BASEPATH') or exit('No direct script access allowed');

class Measurement extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $response = json_decode($this->api('measurement/measurement'));
        if ($response->status !== 'success') {

        }

        $this->load->view('_layouts/master', [
            'child' => 'measurement/index',
            'measurements' => $response->measurements,
            'scripts' => [
                'assets/custom/general.js',
            ],
        ]);
    }

    public function display_add()
    {
        $this->load->view('_layouts/master', [
            'child' => 'measurement/add',
        ]);
    }

    public function store()
    {
        $data = [
            'name' => $this->input->post('name'),
            'unit' => $this->input->post('unit'),
        ];

        $response = json_decode($this->api('measurement/measurement', $data, 'post'));
        if ($response->status !== 'success') {
            $this->session->set_flashdata('alert_fail', $response->message);
            redirect('measurement/add');
        }

        $this->session->set_flashdata('alert_success', $response->message);
        redirect('measurement');

    }

    public function display_edit($measurementid)
    {
        $response = json_decode($this->api("measurement/measurement/{$measurementid}"));

        $this->load->view('_layouts/master', [
            'child' => 'measurement/edit',
            'measurement' => $response->measurement,
        ]);
    }

    public function update($measurementid)
    {
        $data = [
            'name' => $this->input->post('name'),
            'unit' => $this->input->post('unit'),
        ];

        $response = json_decode($this->api("measurement/measurement/{$measurementid}", $data, 'put'));

        if ($response->status !== 'success') {
            $this->session->set_flashdata('alert_fail', $response->message);
            redirect('measurement/' . $measurementid);
        }

        $this->session->set_flashdata('alert_success', $response->message);
        redirect('measurement');
    }

    public function delete($measurementid)
    {
        echo $this->api("measurement/measurement/{$measurementid}", null, 'delete');
    }
}
