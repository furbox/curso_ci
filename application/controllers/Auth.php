<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: furbox
 * Date: 8/12/15
 * Time: 09:37 PM
 */
class Auth extends CI_Controller
{

    /**
     * Auth constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
    }

    public function login(){
        $data = new stdClass();

        $data->title = "Proyecto CI";
        $data->contenido = "auth/login";
        $data->panel_title = "Inicio de Sesion";
        $data->active = 'login';
        $this->load->view('frontend',$data);
    }

    public function signin(){
        $this->form_validation->set_rules('correo', 'Email', 'required|valid_email|max_length[150]');
        $this->form_validation->set_rules('pass', 'Password', 'required|min_length[8]|max_length[16]');

        if ($this->form_validation->run() == FALSE)
        {
            $this->login();
        }
        else
        {
            $correo = $this->input->post('correo');
            $pass = $this->input->post('pass');
            $user = $this->Auth_model->getUser($correo);
            if(!$user){
                $this->session->set_flashdata("mensaje_error","Datos de usuario incorrectos");
                redirect(base_url().'login');
            }
            if($user->user_pass != sha1(md5($pass))){
                $this->session->set_flashdata("mensaje_error","Datos de usuario incorrectos");
                redirect(base_url().'login');
            }
            $_SESSION['userid'] = $user->idu;
            $_SESSION['user_email'] = $user->user_email;
            $_SESSION['is_logged_in'] = TRUE;
            $this->session->set_flashdata("mensaje_success","Bienvenido ".$_SESSION['user_email']);
            redirect(base_url());
        }
    }

    public function logout(){
        session_destroy();
        redirect();
    }
}
