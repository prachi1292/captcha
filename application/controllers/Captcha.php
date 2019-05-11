<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Captcha extends CI_Controller
{
    /* Initialize the controller by calling the necessary helpers and libraries */
    public function __construct()
    {
        parent::__construct();
        /* Load the libraries and helpers */
        $this->load->model('CaptchaModel');
        $this->load->library('form_validation');
        $this->load->library('session');
        

        $this->load->helper(array('form', 'url', 'captcha'));
       

    }

    /* The default function that gets called when visiting the page */
    public function index()
    {
        $captcha = array();
        $this->form_validation->set_rules('captcha', 'captcha', 'trim|required|callback_validate_captcha');
        if($this->form_validation->run() == FALSE) {

        } else {  
            echo "form submitted successfully";die;
        }
        $this->load->view('captcha_view', $captcha);
    }

   function validate_captcha() {
    $captcha_value = $_COOKIE['captcha_value'];
    $captcha = $_REQUEST['captcha'];
    if($captcha_value != $captcha){
        $this->form_validation->set_message('validate_captcha', 'Invalid Captcha');
        return false;
    } else {
        return true;
    }
   }
}
/* End of file captcha.php */
/* Location: ./application/controllers/captcha.php */
