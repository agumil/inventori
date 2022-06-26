<?php defined('BASEPATH') or exit('No direct script access allowed');

class Outgoinggood extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $response = json_decode($this->api('outgoinggood/outgoinggood'));
        if ($response->status !== 'success') {

        }

        $this->load->view('_layouts/master', [
            'child' => 'outgoinggood/index',
            'outgoinggoods' => $response->outgoinggoods,
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
            'child' => 'outgoinggood/add',
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

        $response = json_decode($this->api('outgoinggood/outgoinggood', $data, 'post'));
        if ($response->status !== 'success') {
            $this->session->set_flashdata('alert_fail', $response->message);
            redirect('outgoinggood/add');
        }

        $this->session->set_flashdata('alert_success', $response->message);
        redirect('outgoinggood');

    }

    public function display_edit($ogoodid)
    {
        $response = json_decode($this->api('brand/brand'));
        $response2 = json_decode($this->api('measurement/measurement'));
        $response3 = json_decode($this->api('color/color'));
        $response4 = json_decode($this->api("outgoinggood/outgoinggood/{$ogoodid}"));

        $response4->outgoinggood->date = (new DateTime($response4->outgoinggood->date))->format('Y-m-d\TH:i:s');

        $this->load->view('_layouts/master', [
            'child' => 'outgoinggood/edit',
            'brands' => $response->brands,
            'measurements' => $response2->measurements,
            'colors' => $response3->colors,
            'outgoinggood' => $response4->outgoinggood,
        ]);
    }

    public function update($ogoodid)
    {
        $data = [
            'brand_id' => $this->input->post('brand'),
            'measurement_id' => $this->input->post('measurement'),
            'color_id' => $this->input->post('color'),
            'name' => $this->input->post('name'),
            'quantity' => $this->input->post('qty'),
            'date' => $this->input->post('date'),
        ];

        $response = json_decode($this->api("outgoinggood/outgoinggood/{$ogoodid}", $data, 'put'));

        if ($response->status !== 'success') {
            $this->session->set_flashdata('alert_fail', $response->message);
            redirect('outgoinggood/' . $ogoodid);
        }

        $this->session->set_flashdata('alert_success', $response->message);
        redirect('outgoinggood');
    }

    public function delete($ogoodid)
    {
        echo $this->api("outgoinggood/outgoinggood/{$ogoodid}", null, 'delete');
    }
}
