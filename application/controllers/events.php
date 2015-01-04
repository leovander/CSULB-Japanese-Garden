<?php

/**
 * Created by PhpStorm.
 * User: Beau
 * Date: 4/7/14
 * Time: 4:47 PM
 */
class Events extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('events_model');
        $this->load->library('form_validation');
        $this->load->model('pages_model');
    }

    function eventsPage()
    {
        $allEvents = $this->events_model->getEvents();

        $events = array();
        $data = array();

        $currentDate = new DateTime('today');
        $i = 0;
        $k = 0;
        while ($i < count($allEvents) && $k < 5) {
            //Populate the events array with the five nearest events to today's date
            if (date_create($allEvents[$i]['start']) >= $currentDate) {
                $events[$k]['id'] = $allEvents[$i]['id'];
                $events[$k]['title'] = $allEvents[$i]['title'];
                $events[$k]['description'] = strlen($allEvents[$i]['description']) < 450 ?
                    $allEvents[$i]['description'] : substr($allEvents[$i]['description'], 0, 450);
                $events[$k]['start'] = date_create($allEvents[$i]['start']);
                $events[$k]['end'] = date_create($allEvents[$i]['end']);
                $events[$k]['photo'] = !empty($allEvents[$i]['photo']) ? $allEvents[$i]['photo'] : site_url('assets/images/event_placeholder.png');
                $k++;
            }
            $i++;
        }

        $data['events'] = $events;

        $data['title'] = ucwords('events');
        $this->load->view('global/header', $data);
        $data['mainNav'] = $this->pages_model->get_mainNav();
        $this->load->view('global/mainNav', $data);
        $data['subNav'] = $this->pages_model->get_indexSubNav('events');
        $data['todayHours'] = $this->events_model->todayHours();
        $this->load->view('global/subNav.php', $data);
        $this->load->view('events/index', $data);
        $this->load->view('global/footer');
    }

    function calendarPage()
    {
        $allEvents = $this->events_model->getEvents();
        $data['events'] = $allEvents;

        $data['mainNav'] = $this->pages_model->get_mainNav();
        $data['subNav'] = $this->pages_model->get_indexSubNav('events');
        $data['todayHours'] = $this->events_model->todayHours();

        $data['title'] = ucwords('events calendar');
        $this->load->view('global/header', $data);
        $this->load->view('global/mainNav', $data);
        $this->load->view('global/subNav.php', $data);
        $this->load->view('events/events_calendar', $data);
        $this->load->view('global/footer');
    }


    function closurePage()
    {
        $data['closures'] = $this->events_model->getClosures();

        $this->load->view('global/header');
        $this->load->view('global/closures', $data);
        $this->load->view('global/footer');
    }

    function eventDetailsPage($id = NULL)
    {
        $data['event'] = $this->events_model->getEvents($id)[0];

        $start = date_create($data['event']['start']);
        $end = date_create($data['event']['end']);

        $data['event']['start'] = $start;
        $data['event']['end'] = $end;

        $this->load->view('global/header');
        $data['mainNav'] = $this->pages_model->get_mainNav();
        $this->load->view('global/mainNav', $data);
        $data['subNav'] = $this->pages_model->get_subNav('details');
        $data['todayHours'] = $this->events_model->todayHours();
        $this->load->view('global/subNav.php', $data);
        $this->load->view('events/details', $data);
        $this->load->view('global/footer');
    }

    function getEvents()
    {
        $data = $this->events_model->getAllEvents();
        $events = array();

        foreach ($data as $row) {
            array_push($events, $row);
        }

        echo json_encode($events);

    }

    function getClosures()
    {
        $data = $this->events_model->getClosures();
        $events = array();

        foreach ($data as $row) {
            array_push($events, $row);
        }

        echo json_encode($events);

    }


    function createEvent()
    {
        if ($this->session->userdata('logged_in')) {
            //trim: remove whitespace, required: ensure the field has input, xss_clean: sanitize input
            $this->form_validation->set_rules('title', 'Title', 'required|xss_clean');
            $this->form_validation->set_rules('start', 'Start Date', 'required|xss_clean');
            $this->form_validation->set_rules('end', 'End Date', 'required|xss_clean');
            $this->form_validation->set_rules('description', 'Description', 'xss_clean');
            $this->form_validation->set_rules('photo_url', 'Photo URL', 'xss_clean');
            $this->form_validation->set_rules('closure', 'Closure', 'xss_clean');
            $this->form_validation->set_rules('id', 'ID', 'xss_clean');
//            $this->uploadImage();

            if ($this->form_validation->run() == FALSE) {
                $response = ['html' => '<div class="errors">' . validation_errors() . '</div>'];
                echo json_encode($response);
                return false;
            }

            $id = $this->events_model->setEvent();

            $response = ['html' => '<span id="savesuccess">Save Successful</span>',
                'id' => $id];

            echo json_encode($response);

            return true;
        } else {
            return redirect('index.php/admin_login', 'refresh');
        }
    }

    function removeEvent()
    {
        if ($this->session->userdata('logged_in')) {
            //TODO validate the input
            $this->events_model->deleteEvent($this->input->post('id'));
        } else {
            redirect('index.php/admin_login', 'refresh');
        }
    }

    //TODO this has the logic for daily hours. Use as necessary and remove this function
    function testHours(){
        // Produces: SELECT title, content, date FROM mytable
        $result = $this->events_model->todayHours();
        $data = array(
            'result' => $result
        );
        $this->load->view('test_views/todays_hours', $data);
    }


}