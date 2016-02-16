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
        $this->load->library('hash');
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
        
        if ($this->form_validation->run('valida_login') == FALSE)
        {
            $this->login();
        }
        else
        {
            $correo = $this->security->xss_clean(addslashes(strip_tags($this->input->post('correo', TRUE))));
            $pass = $this->security->xss_clean(addslashes(strip_tags($this->input->post('pass', TRUE))));
            $user = $this->Auth_model->getUser($correo);
            
            if(!$user){
                $this->session->set_flashdata("mensaje_error","Datos de usuario incorrectose");
                redirect(base_url().'login');
            }
            $encrypt = $this->hash->encrypt($pass);
            if($user->users_pass != $encrypt){
                $this->session->set_flashdata("mensaje_error","Datos de usuario incorrectosp");
                redirect(base_url().'login');
            }
            
            $_SESSION['userid'] = $user->id;
            $_SESSION['user_email'] = $user->users_email;
            $_SESSION['is_logged_in'] = TRUE;
            $this->session->set_flashdata("mensaje_success","Bienvenido ".$_SESSION['user_email']);
            redirect(base_url());
        }
    }

    public function logout(){
        session_destroy();
        redirect();
    }
    
    public function check_password_strength(){
        
    }
}
