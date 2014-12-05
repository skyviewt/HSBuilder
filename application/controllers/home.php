<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function index()
	{	
		//head info
		       $this->load->library('session');
		$data['status'] = $this->session->userdata('logged_in');
    $data['base_url'] = config_item('base_url');
    $data['title'] = "HS Arena DeckBuilder";
    $data['css_path'] = config_item('css_path');
    $data['js_path'] = config_item('js_path');
    $data['css_files'] = array('hover.css', 'main.css');
    $data['img_path'] = config_item('img_path');
		
		$this->load->view('common/head', $data);
		$this->load->view('common/nav', $data);
		$this->load->view('index', $data);
        
	}
    
    public function stats()
    {
        echo 'to be implement';
    }

    //return json not render views
	public function login()
	{
		echo 'to be implement';
	}

    public function selection()
    {
           $this->load->library('session');
		$data['status'] = $this->session->userdata('logged_in');
    $data['base_url'] = config_item('base_url');
    $data['title'] = "HS Arena DeckBuilder";
    $data['css_path'] = config_item('css_path');
    $data['js_path'] = config_item('js_path');
    $data['css_files'] = array('hover.css', 'main.css');
    $data['img_path'] = config_item('img_path');
    $data['class'] = $this->input->get('class', TRUE);
    $data['selectedCards'] = $this->input->get('cards', TRUE);
        
       $this->load->view('common/head', $data);
		$this->load->view('common/nav', $data);
		$this->load->view('selection', $data);
    }
    
    
    public function account()
    {
        $this->load->library('session');
		$data['status'] = $this->session->userdata('logged_in');
    $data['base_url'] = config_item('base_url');
    $data['title'] = "HS Arena DeckBuilder";
    $data['css_path'] = config_item('css_path');
    $data['js_path'] = config_item('js_path');
    $data['css_files'] = array('hover.css', 'main.css');
    $data['img_path'] = config_item('img_path');
    $data['class'] = $this->input->get('class', TRUE);
    $data['selectedCards'] = $this->input->get('cards', TRUE);
        
       $this->load->view('common/head', $data);
		$this->load->view('common/nav', $data);
		$this->load->view('account', $data);
    }


    
    //return json not render views
    public function signup()
	{
		echo 'to be implement';
	}
  
}