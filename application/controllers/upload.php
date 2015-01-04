<?php

/**
 * Created by PhpStorm.
 * User: Beau
 * Date: 4/25/14
 * Time: 4:03 PM
 *
 */
class Upload extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('photos_model');
        $this->load->helper('url');
    }

    function uploadImage()
    {
        if ($this->session->userdata('logged_in')) {
            $this->load->helper(array('form', 'url'));
            $config['upload_path'] = "assets/images/uploaded_images";
            $config['allowed_types'] = "gif|jpg|jpeg|png";
//        $config['max_size']      =   "5000";
//        $config['max_width']     =   "1907";
//        $config['max_height']    =   "1280";
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('photo')) {
                $error = array('error' => $this->upload->display_errors());
                echo json_encode($error);
                return false;
            } else {
                $finfo = $this->upload->data();
                $response = $this->photos_model->set_photo($finfo);
                echo json_encode($response);
                return true;
            }
        } else {
            return redirect('index.php/admin_login', 'refresh');
        }

    }

    function deleteImage()
    {
        if ($this->session->userdata('logged_in')) {
            $this->load->helper('path');
            $file_name = $this->input->post('file_name');
            $path = FCPATH . 'assets/images/uploaded_images/' . $file_name;

            //unlink deletes the actual image file
            if (unlink($path)) {
                $this->photos_model->delete_photo($file_name);
                echo 'success';
                return true;
            }
            echo 'fail';
            return false;
        } else {
            return redirect('index.php/admin_login', 'refresh');
        }
    }

}