<?php 
if (!defined('BASEPATH')) { exit('No direct script access allowed');}

class Ajaxcontroller extends CI_Controller
{
  public function __construct()
    {
        parent::__construct();
        //session_start();
        /* Load the libraries and helpers */
        $this->load->model('CaptchaModel');
        $this->load->library('form_validation');
        
         // $this->captcha_value = $this->session->userdata('captcha_value');
        
        echo $_COOKIE['captcha_value'];die;
        $this->load->helper(array('form', 'url', 'captcha'));
       

    }
    public function index(){

    }
}
?>	