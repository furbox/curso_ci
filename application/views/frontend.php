<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('plantillas/frontend/head');
$this->load->view('plantillas/frontend/header');
$this->load->view('frontend/'.$contenido);
$this->load->view('plantillas/frontend/footer');
