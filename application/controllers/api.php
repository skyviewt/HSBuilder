<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';
class Api extends REST_Controller {
    
    
    public function __construct()
    {
        // Construct our parent class
        parent::__construct();
        
        // Configure limits on our controller methods. Ensure
        // you have created the 'limits' table and enabled 'limits'
        // within application/config/rest.php
        $this->methods['user_get']['limit'] = 500; //500 requests per hour per user/key
        $this->methods['user_post']['limit'] = 100; //100 requests per hour per user/key
    }
    
    // /api/cards
    public function cards_get()
    {
        //query param: class: /api/cards/class/{className} single card: /api/cards/id/{id}       
        $this->load->model('Card_model', 'card', TRUE);
        
        if(count($this->get()) == 0)
        {
            $this->response($this->card->get_all(), 200);
        }
        else if(count($this->get()) > 1)
        {
            $this->response(array('error' => 'too many parameters'), 400);
        }
        else if($this->get('id'))
        {
            $this->response($this->card->get_card($this->get('id')), 200);
        }
        else if($this->get('class'))
        {
            $this->response($this->card->get_class($this->get('class')), 200);
        }
        else
        {
            $this->response(array('error' => 'invalid parameter has been passed. The accepted parameters are "class" or "id"'), 400);
        }     
    }
    
    // /api/values/id/{value_id}
    public function values_get()
    {
        $this->load->model('Card_model', 'card', TRUE);
        
        if($this->get('id'))
        {
            $this->response($this->card->get_cardValue($this->get('id')), 200);
        }
        else
        {
            $this->response(array('error' => 'invalid parameter has been passed. The accepted parameters is id"'), 400);
        }
    }
    
    public function users_get()
    {
        
    }
    
    //POST /api/users/
    public function users_post()
    {
        $this->load->model('User_model', 'user', TRUE);
        $payload = json_decode(file_get_contents('php://input'),true);
        
        if(!ctype_alnum($payload["username"]))
        {
           $this->response(array('error' => "username must be alpha numeric"), 400);
        }
        else if(!$this->isValidMd5($payload["password"]))
        {
           $this->response(array('error' => "invalid password format"), 400);
        }
        if(!filter_var($payload["email"], FILTER_VALIDATE_EMAIL))
        {
           $this->response(array('error' => "invalid email address"), 400);
        }
        
        $this->user->setParam($payload["username"], $payload["password"], $payload["email"]);
        $this->user->create_user();
        
        $this->response(array('success' => "User Created!"), 200);
        
    }
    
    //to be implemented in future
    public function users_put()
    {
        
    }
    
    // /api/login
    public function login_post()
    {
        $this->load->model('User_model', 'user', TRUE);
        
        if(!$this->isValidMd5($this->post("password")))
        {
           $this->response(array('error' => "invalid password format"), 400);
        } 
        
        if(filter_var($this->post("identity"), FILTER_VALIDATE_EMAIL) OR ctype_alnum($this->post("identity")))
        {
            if($this->user->validate_user($this->post("identity"), $this->post("password")))
            {                
                $this->response($this->user->get_user_info($this->post("identity")), 200);
            }
            else
            {
                
            }
        }
        else 
        {
            $this->response(array('error' => "invalid username or email format"), 400);
        }
    }
    
    // /api/logout
    public function logout_post()
    {
        
    }
    
    //to be implemented in future
    // /api/stats
    public function stats_get()
    {
        //TODO: query param: /api/stats/card/{id}, /api/stats/class/{className}
    }
    
    private function isValidMd5($md5)
    {
        return preg_match('/^[a-f0-9]{32}$/', $md5);
    }
}