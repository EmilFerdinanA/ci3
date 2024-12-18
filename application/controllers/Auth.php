<?php

/**
 * @property CI_Input $input
 * @property Api_model $Api_model
 * @property CI_Session $session
 */
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Api_model');
    }

    public function login()
    {
        $form = [
            "username" => $this->input->post('email'),
            "password" => $this->input->post('password')
        ];

        $response = $this->Api_model->login($form);

        $this->session->set_userdata([
            'userId' => $response['data']['userId'],
            'username' => $response['data']['username'],
            'token' => $response['data']['token'],
            'roles' => $response['data']['roles']
        ]);

        redirect("dashboard");
    }
}
