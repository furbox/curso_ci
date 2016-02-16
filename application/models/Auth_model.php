<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: furbox
 * Date: 8/12/15
 * Time: 10:18 PM
 */
class Auth_model extends CI_Model
{
    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function getUser($email = FALSE){
        if($email){            
            $query = $this->db->get_where('users', array('users_email' => $email));
            return $query->row();
        }else{
            $query = $this->db->get('users');
            return $query->result();
        }
        
    }
}