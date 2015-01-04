<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
/**
 * Created by PhpStorm.
 * User: Beau
 * Date: 3/31/14
 * Time: 12:54 PM
 */
class Admin extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('photos_model');
        $this->load->model('pages_model');
        $this->load->model('contactus_model');
        $this->load->model('rateourwebsite_model');
        $this->load->model('volunteer_model');
    }

    function index()
    {
        if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['photos'] = $this->photos_model->get_photos();
            $data['ratings'] = $this->rateourwebsite_model->get_ratings();
            $data['contacts'] = $this->contactus_model->get_contacts();
            $data['volunteers'] = $this->volunteer_model->get_volunteers();

            $this->load->view('global/header');
            $data['mainNav'] = $this->pages_model->get_mainNav();
            $this->load->view('global/mainNav', $data);
            $this->load->view('secure/admin_page', $data);
            $this->load->view('global/footer');

        }
        else
        {
            redirect('index.php/admin_login', 'refresh');
        }
    }

    function logout()
    {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('/','refresh');
    }

    function getHours(){
        $this->load->model('day_hours_model');
        $data = $this->day_hours_model->getHours();
        echo json_encode($data);
        return true;
    }

    function setHours(){
        if ($this->session->userdata('logged_in')) {
        $this->load->model('day_hours_model');
        $this->day_hours_model->setHours();
            echo "success";
        }else{
            return redirect('index.php/admin_login', 'refresh');
        }

        return true;
    }
}