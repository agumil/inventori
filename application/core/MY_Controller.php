<?php defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function api(string $endpoint, $input = null, string $method = 'GET')
    {
        $input = is_array($input) ? http_build_query($input) : $input;
        $method = strtoupper($method);

        $base = $_ENV['REST_ENDPOINT'];
        if (substr($base, strlen($base) - 1) != '/') {
            $base = $base . '/';
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $base . 'api/' . $endpoint);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ["X-Requested-With: XMLHttpRequest"]);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        if ($method !== 'GET') {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $input);
        }

        $response = curl_exec($ch);

        return $response;
    }
}
