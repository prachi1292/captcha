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
        /* Set form validation rules */
        $this->form_validation->set_rules('name', "Name", 'required');
        $this->form_validation->set_rules('captcha', "Captcha", 'required');

        /* Get the user's entered captcha value from the form */
        $userCaptcha = $this->input->post('captcha');

        /* Check if form (and captcha) passed validation*/
        if ($this->form_validation->run() == true && strcmp(strtolower($userCaptcha), strtolower($this->session->userdata('captchaWord'))) == 0) {
            /** Validation was successful; show the Success view **/
            /* Clear the session variable */
            $this->session->unset_userdata('captchaWord');
            /* Get the user's name from the form */
            $name = $this->input->post('name');
            /* Pass in the user input to the success view for display */
            $data = array('name' => $name);
            // do as your requirement
            print_r($data);exit;
        } else {
            /** Validation was not successful - Generate a captcha **/
            /* Setup vals to pass into the create_captcha function */
            $captcha = $this->_generateCaptcha();
           
            /* Store the captcha value (or 'word') in a session to retrieve later */
            $this->session->set_userdata('captchaWord', $captcha['word']);
        
           
            /* Load the captcha view containing the form (located under the 'views' folder) */
            
            $this->load->view('captcha_view', $captcha);
        }
    }

    // this function will create 
    private function _generateCaptcha()
    {
        $vals = array(
            'img_path' => './captcha_images/',
            'img_url' => base_url('captcha_images/'),
            'img_width' => 150,
            'img_height' => 30,
            'expiration' => 7200,
        );
      
        /* Generate the captcha */
        return create_captcha($vals);
    }
}
/* End of file captcha.php */
/* Location: ./application/controllers/captcha.php */
