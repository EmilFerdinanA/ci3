<?php

/**
 * @property CI $session
 */
class AuthCheck
{
    public function checkToken()
    {
        $CI  = &get_instance();

        $excludedRoutes = [
            'login',
            'forgot-password',
            'register',
        ];

        $currentRoute = strtolower($CI->uri->uri_string());

        if (in_array($currentRoute, $excludedRoutes)) {
            return;
        }

        $token = $CI->session->userdata('token');

        if (!$token) {
            redirect('login');
            exit;
        }
    }
}
