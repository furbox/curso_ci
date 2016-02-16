<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$config = array(
    'valida_login' => array(
        array(
            'field' => 'correo',
            'label' => 'Email',
            'rules' => 'trim|valid_email|required|min_length[2]|max_length[150]'
        ),
        array(
            'field' => 'pass',
            'label' => 'Contraseña',
            'rules' => 'trim|required|min_length[8]|max_length[16]|callback_check_password_strength'
        )
    ),
);
