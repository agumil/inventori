<?php defined('BASEPATH') or exit('No direct script access allowed');

class Inventory extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $response = json_decode($this->api('good/good'));
        if ($response->status !== 'success') {

        }

        $this->load->view('_layouts/master', [
            'child' => 'inventory/index',
            'goods' => $response->goods,
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
            'child' => 'inventory/add',
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
        ];

        $response = json_decode($this->api('good/good', $data, 'post'));
        if ($response->status !== 'success') {
            $this->session->set_flashdata('alert_fail', $response->message);
            redirect('inventory/add');
        }

        $this->session->set_flashdata('alert_success', $response->message);
        redirect('inventory');

    }

    public function display_edit($goodid)
    {
        $response = json_decode($this->api('brand/brand'));
        $response2 = json_decode($this->api('measurement/measurement'));
        $response3 = json_decode($this->api('color/color'));
        $response4 = json_decode($this->api("good/good/{$goodid}"));

        $this->load->view('_layouts/master', [
            'child' => 'inventory/edit',
            'brands' => $response->brands,
            'measurements' => $response2->measurements,
            'colors' => $response3->colors,
            'good' => $response4->good,
        ]);
    }

    public function update($goodid)
    {
        $data = [
            'brand_id' => $this->input->post('brand'),
            'measurement_id' => $this->input->post('measurement'),
            'color_id' => $this->input->post('color'),
            'name' => $this->input->post('name'),
            'quantity' => $this->input->post('qty'),
        ];

        $response = json_decode($this->api("good/good/{$goodid}", $data, 'put'));

        if ($response->status !== 'success') {
            $this->session->set_flashdata('alert_fail', $response->message);
            redirect('inventory/' . $goodid);
        }

        $this->session->set_flashdata('alert_success', $response->message);
        redirect('inventory');
    }

    public function delete($goodid)
    {
        echo $this->api("good/good/{$goodid}", null, 'delete');
    }
}
