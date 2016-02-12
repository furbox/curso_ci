<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: furbox
 * Date: 7/12/15
 * Time: 10:21 PM
 */
class Index extends CI_Controller
{
    /**
     * Index constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $data = new stdClass();

        $data->title = "Proyecto CI";
        $data->contenido = "index/index";

        $this->load->view('frontend',$data);
    }
}