<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {

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
    
   
    public function profile()
    {
        $this->is_logged_in();
        $this->load->library('session');
        $data['user_id'] = $this->session->userdata('user_id');
		$data['username'] = $this->session->userdata('username');
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
    
    public function login()
    {
        $this->load->model('User_model', 'user', TRUE);
        $payload = json_decode(file_get_contents('php://input'),true);
        
        if(!$this->isValidMd5($payload["password"]))
        {         
           echo json_encode(array('error' => "invalid password format"));
           http_response_code(400);
        } 
        
        if(filter_var($payload["identity"], FILTER_VALIDATE_EMAIL) OR ctype_alnum($payload["identity"]))
        {
            if($this->user->validate_user($payload["identity"], $payload["password"]))
            {                
                
               $this->load->library('session');
               $user = $this->user->get_user_info($payload["identity"]);
               
              
               $data = array(
							'username' => $user[0]['username'],
							'user_id' => $user[0]['user_id'],
                            'email' => $user[0]['email'],
							'logged_in' => TRUE
						);
                
			   $this->session->set_userdata($data);
               
                
               echo json_encode($user);
               http_response_code(200);
            }
            else
            {               
                echo json_encode(array('error' => "User Not Found"));
                http_response_code(404);
            }
        }
        else 
        {
            echo json_encode(array('error' => "invalid username or email"));
            http_response_code(400);
        }
    }
    
    public function logout()
    {
        $this->load->library('session');
        
        $data = array(
             'username' => '',
             'user_id' => '',
             'email' => '',
             'logged_in' => ''
        );
                
	    $this->session->unset_userdata($data);
    }
    
    private function isValidMd5($md5)
    {
        return preg_match('/^[a-f0-9]{32}$/', $md5);
    }

    private function is_logged_in()
	{
        $this->load->library('session');
		$is_logged_in = $this->session->userdata('logged_in');
		if(!isset($is_logged_in) || $is_logged_in != TRUE)
		{
			echo 'You don\'t have permission to access this page. <a href="/">Login</a>';	
			die();		
		}		
	}
    
}