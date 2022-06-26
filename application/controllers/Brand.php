<?php defined('BASEPATH') or exit('No direct script access allowed');

class Brand extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $response = json_decode($this->api('brand/brand'));
        if ($response->status !== 'success') {

        }

        $this->load->view('_layouts/master', [
            'child' => 'brand/index',
            'brands' => $response->brands,
            'scripts' => [
                'assets/custom/general.js',
            ],
        ]);
    }

    public function display_add()
    {
        $this->load->view('_layouts/master', [
            'child' => 'brand/add',
        ]);
    }

    public function store()
    {
        $data = [
            'name' => $this->input->post('name'),
            'code' => $this->input->post('code'),
        ];

        $response = json_decode($this->api('brand/brand', $data, 'post'));
        if ($response->status !== 'success') {
            $this->session->set_flashdata('alert_fail', $response->message);
            redirect('brand/add');
        }

        $this->session->set_flashdata('alert_success', $response->message);
        redirect('brand');

    }

    public function display_edit($brandid)
    {
        $response = json_decode($this->api("brand/brand/{$brandid}"));

        $this->load->view('_layouts/master', [
            'child' => 'brand/edit',
            'brand' => $response->brand,
        ]);
    }

    public function update($brandid)
    {
        $data = [
            'name' => $this->input->post('name'),
            'code' => $this->input->post('code'),
        ];

        $response = json_decode($this->api("brand/brand/{$brandid}", $data, 'put'));

        if ($response->status !== 'success') {
            $this->session->set_flashdata('alert_fail', $response->message);
            redirect('brand/' . $brandid);
        }

        $this->session->set_flashdata('alert_success', $response->message);
        redirect('brand');
    }

    public function delete($brandid)
    {
        echo $this->api("brand/brand/{$brandid}", null, 'delete');
    }
}
