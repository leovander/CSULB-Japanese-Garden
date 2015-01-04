<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Beau
 * Date: 3/31/14
 * Time: 12:29 PM
 */
class VerifyLogin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('user', '', TRUE);
    }

    function index()
    {
        $this->load->library('form_validation');

        //trim: remove whitespace, required: ensure the field has input, xss_clean: sanitize input
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        //callback_check_database is a custom rule defined later
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');


        if ($this->form_validation->run() == FALSE) {
            //redirect to login page if the validation fails
            $this->load->view('global/header');
            $this->load->view('login_view');
            $this->load->view('global/footer');
        } else {
            redirect('index.php/admin_page', 'refresh');
        }

    }

    function check_database($password)
    {
        //if the validation succeeded to this point, we verify the username and password are correct
        $username = $this->input->post('username');

        $result = $this->user->login($username, $password);

//        echo 'verify';
//        die();

        if ($result) {
            foreach ($result as $row) {
                $sess_array = array(
                    'id' => $row->id,
                    'username' => $row->username
                );
                $this->session->set_userdata('logged_in', $sess_array);
            }
            return true;
        } else {
            $this->form_validation->set_message('check_database', 'Invalid username or password');
            return false;
        }
    }

}