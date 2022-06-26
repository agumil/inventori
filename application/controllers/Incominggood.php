<?php defined('BASEPATH') or exit('No direct script access allowed');

class Incominggood extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $response = json_decode($this->api('incominggood/incominggood'));
        if ($response->status !== 'success') {

        }

        $this->load->view('_layouts/master', [
            'child' => 'incominggood/index',
            'incominggoods' => $response->incominggoods,
            'scripts' => [
                'assets/custom/general.js',
            ],
        ]);
    }

    public function display_add()
    {
        $response = json_decode($this->api('brand/brand'));
        $response2 = json_decode($this->api('measurement/measurement'));
        $response3 = json_decode($this->api('color/color'));

        $this->load->view('_layouts/master', [
            'child' => 'incominggood/add',
            'brands' => $response->brands,
            'measurements' => $response2->measurements,
            'colors' => $response3->colors,
        ]);
    }

    public function store()
    {
        $data = [
            'brand_id' => $this->input->post('brand'),
            'measurement_id' => $this->input->post('measurement'),
            'color_id' => $this->input->post('color'),
            'name' => $this->input->post('name'),
            'quantity' => $this->input->post('qty'),
            'date' => $this->input->post('date'),
        ];

        $response = json_decode($this->api('incominggood/incominggood', $data, 'post'));
        if ($response->status !== 'success') {
            $this->session->set_flashdata('alert_fail', $response->message);
            redirect('incominggood/add');
        }

        $this->session->set_flashdata('alert_success', $response->message);
        redirect('incominggood');

    }

    public function display_edit($igoodid)
    {
        $response = json_decode($this->api('brand/brand'));
        $response2 = json_decode($this->api('measurement/measurement'));
        $response3 = json_decode($this->api('color/color'));
        $response4 = json_decode($this->api("incominggood/incominggood/{$igoodid}"));

        $response4->incominggood->date = (new DateTime($response4->incominggood->date))->format('Y-m-d\TH:i:s');

        $this->load->view('_layouts/master', [
            'child' => 'incominggood/edit',
            'brands' => $response->brands,
            'measurements' => $response2->measurements,
            'colors' => $response3->colors,
            'incominggood' => $response4->incominggood,
        ]);
    }

    public function update($igoodid)
    {
        $data = [
            'brand_id' => $this->input->post('brand'),
            'measurement_id' => $this->input->post('measurement'),
            'color_id' => $this->input->post('color'),
            'name' => $this->input->post('name'),
            'quantity' => $this->input->post('qty'),
            'date' => $this->input->post('date'),
        ];

        $response = json_decode($this->api("incominggood/incominggood/{$igoodid}", $data, 'put'));

        if ($response->status !== 'success') {
            $this->session->set_flashdata('alert_fail', $response->message);
            redirect('incominggood/' . $igoodid);
        }

        $this->session->set_flashdata('alert_success', $response->message);
        redirect('incominggood');
    }

    public function delete($igoodid)
    {
        echo $this->api("incominggood/incominggood/{$igoodid}", null, 'delete');
    }
}
