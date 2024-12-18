<?php

class Pages extends CI_Controller
{
    public function login()
    {
        $this->load->view('templates/header');
        $this->load->view('pages/auth/login');
        $this->load->view('templates/footer');
    }

    public function register()
    {
        $this->load->view('templates/header');
        $this->load->view('pages/auth/register');
        $this->load->view('templates/footer');
    }

    public function forgot_password()
    {
        $this->load->view('templates/header');
        $this->load->view('pages/auth/forgot_password');
        $this->load->view('templates/footer');
    }

    public function dashboard()
    {
        $this->load->view('templates/header');
        $this->load->view('dashboard');
        $this->load->view('templates/footer');
    }
}
