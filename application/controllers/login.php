<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Beau
 * Date: 3/31/14
 * Time: 11:59 AM
 */
class Login extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper(array('form'));
    }
    function index()
    {
        $this->load->view('global/header');
        $this->load->view('login_view');
        $this->load->view('global/footer');
    }
}
