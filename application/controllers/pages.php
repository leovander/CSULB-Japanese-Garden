<?php
/*
 * Context:      Pages controller to display all pages throughout the site.
 * Team members: Beau Squires, Israel Torres, Gyngai Ung, Kun Wei
 * Author #1:    Israel Torres
 * Author #2:    Gyngai Ung
 * Date/Time:    3/20/14 4:12pm
 */

class Pages extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
        //dependency injection for URL Helper functions
        $this->load->helper('url');
		$this->load->model('pages_model');
        $this->load->model('elements_model');
        $this->load->model('trees_model');
        $this->load->model('events_model');
	}

	public function view($parent = null, $page = null)
	{
        $data['mainNav'] = $this->pages_model->get_mainNav();
        $data['todayHours'] = $this->events_model->todayHours();

        //home page
        if(is_null($parent)) {
            $data['title'] = ucwords('home');
            $this->load->view('global/header', $data);
            $this->load->view('global/mainNav', $data);
            $data['subNav'] = $this->pages_model->get_homeSubNav();
            $this->load->view('global/subNav.php', $data);
            $this->load->view('home/index.php');
        } else {
            if(isset($page)) {
                //load subNav for all children pages
                $data['title'] = ucwords(str_replace('_', ' ', $page));
                $this->load->view('global/header', $data);
                $this->load->view('global/mainNav', $data);
                $data['subNav'] = $this->pages_model->get_subNav($page);
                $this->load->view('global/subNav.php', $data);
                $data['relLinks'] = $this->pages_model->get_subRelativeLinks($page);

                //Loads trees from trees_model for living collection
                if($page === 'the_living_collection') {
                    $data['tree_items'] = $this->trees_model->get_treelist();
                    $this->load->view(''.$parent.'/'.$page, $data);
                } else {
                    $this->load->view(''.$parent.'/'.$page, $data);
                    $this->load->view('global/relLinks.php', $data);
                }
            } else {
                //parent index page
                $data['title'] = ucwords(str_replace('_', ' ', $parent));
                $this->load->view('global/header', $data);
                $this->load->view('global/mainNav', $data);
                if($parent === 'credits') {
                    $data['subNav'] = $this->pages_model->get_homeSubNav();
                } else {
                    $data['subNav'] = $this->pages_model->get_indexSubNav($parent);
                }
                $this->load->view('global/subNav.php', $data);

                $this->load->view(''.$parent.'/index.php');

                if($parent != 'weddings') {
                    $data['relLinks'] = $this->pages_model->get_indexRelativeLinks($parent);
                    $this->load->view('global/relLinks.php', $data);
                }
            }
        }
        $this->load->view('global/footer');
	}

    function about()
    {
        $this->load->model('events_model');
        $this->load->model('day_hours_model');
        $data['daily_hours'] = $this->day_hours_model->getHours();

        //Grab the 5 closest closures
        $currentDate = new DateTime('now');
        $allClosures = $this->events_model->getClosures();
        $i = 0;
        $k = 0;

        $closures = array();
        while ($i < count($allClosures) && $k < 5) {
            //Populate the events array with the five nearest events to today's date
            if (date_create($allClosures[$i]['start']) >= $currentDate) {
                $closures[$k]['id'] = $allClosures[$i]['id'];
                $closures[$k]['title'] = $allClosures[$i]['title'];
                $closures[$k]['start'] = $allClosures[$i]['start'];
                $closures[$k]['end'] = $allClosures[$i]['end'];
                $k++;
            }

            $i++;
        }

        $data['closures'] = $closures;

        $data['title'] = ucwords('about');
        $this->load->view('global/header', $data);
        $data['mainNav'] = $this->pages_model->get_mainNav();
        $this->load->view('global/mainNav', $data);
        $data['subNav'] = $this->pages_model->get_indexSubNav('about');
        $data['todayHours'] = $this->events_model->todayHours();
        $this->load->view('global/subNav.php', $data);
        $this->load->view('about/index', $data);

        $data['relLinks'] = $this->pages_model->get_indexRelativeLinks('about');
        $this->load->view('global/relLinks.php', $data);

        $this->load->view('global/footer');
    }

    function volunteer() {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('volunteer_model');

        $this->form_validation->set_rules('volunteertype', 'Volunteer Type', 'required');
        $this->form_validation->set_rules('firstname', 'First Name', 'required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('state', 'State', 'required');
        $this->form_validation->set_rules('zip', 'Zip', 'required');
        $this->form_validation->set_rules('homephone');
        $this->form_validation->set_rules('cellphone');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('commment');

        $this->form_validation->set_error_delimiters('<div class="error-message">', '</div>');

        $data['title'] = ucwords('volunteer');
        $this->load->view('global/header', $data);
        $data['mainNav'] = $this->pages_model->get_mainNav();
        $this->load->view('global/mainNav', $data);
        $data['subNav'] = $this->pages_model->get_subNav('volunteer');
        $data['todayHours'] = $this->events_model->todayHours();
        $this->load->view('global/subNav.php', $data);

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('membership/volunteer', $data);
        }
        else
        {
            $this->volunteer_model->set_volunteer();
            $data['success'] = true;
            $this->load->library('session');
            $this->session->set_flashdata($data);
            //redirect the page after the form was submitted correctly
            redirect('index.php/membership/volunteer');
        }
        $data['relLinks'] = $this->pages_model->get_subRelativeLinks('volunteer');
        $this->load->view('global/relLinks.php', $data);

        $this->load->view('global/footer');
    }

    function rate_our_website() {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('rateourwebsite_model');

        $this->form_validation->set_rules('full_name', 'Full Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('site_rating');
        $this->form_validation->set_rules('comment');

        $this->form_validation->set_error_delimiters('<div class="error-message">', '</div>');

        $data['title'] = ucwords('rate our website');
        $this->load->view('global/header', $data);
        $data['mainNav'] = $this->pages_model->get_mainNav();
        $this->load->view('global/mainNav', $data);
        $data['subNav'] = $this->pages_model->get_subNav('rate_our_website');
        $data['todayHours'] = $this->events_model->todayHours();
        $this->load->view('global/subNav.php', $data);

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('about/rate_our_website', $data);
        }
        else
        {
            $this->rateourwebsite_model->set_websiterating();
            $data['success'] = true;
            $this->load->library('session');
            $this->session->set_flashdata($data);
            //redirect the page after the form was submitted correctly
            redirect('index.php/about/rate_our_website');
        }
        $data['relLinks'] = $this->pages_model->get_subRelativeLinks('rate_our_website');
        $this->load->view('global/relLinks.php', $data);

        $this->load->view('global/footer');
    }

    function contact_us() {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('contactus_model');

        $this->form_validation->set_rules('full_name', 'Full Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('subject', 'Subject', 'required');
        $this->form_validation->set_rules('comment', 'Message', 'required');

        $this->form_validation->set_error_delimiters('<div class="error-message">', '</div>');

        $data['title'] = ucwords('contact us');
        $this->load->view('global/header', $data);
        $data['mainNav'] = $this->pages_model->get_mainNav();
        $this->load->view('global/mainNav', $data);
        $data['subNav'] = $this->pages_model->get_subNav('contact_us');
        $data['todayHours'] = $this->events_model->todayHours();
        $this->load->view('global/subNav.php', $data);

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('about/contact_us', $data);
        }
        else
        {
            $this->contactus_model->set_message();
            $data['success'] = true;
            $this->load->library('session');
            $this->session->set_flashdata($data);
            //redirect the page after the form was submitted correctly
            redirect('index.php/about/contact_us');
        }
        $data['relLinks'] = $this->pages_model->get_subRelativeLinks('contact_us');
        $this->load->view('global/relLinks.php', $data);

        $this->load->view('global/footer');
    }
}