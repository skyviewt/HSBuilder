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
    
    public function users_get()
    {
        
    }
    
    //POST /api/users/
    public function users_post()
    {
        $this->load->model('User_model', 'user', TRUE);
        
        if(!ctype_alnum($this->post("username")))
        {
           $this->response(array('error' => "username must be alpha numeric"), 400);
        }
        else if(strlen($this->post("")) < 4)
        {
           $this->response(array('error' => "password must be at least 4 characters"), 400);
        }
        
        $this->user->setParam($this->post("username"), $this->post("password"), $this->post("email"));
        $this->user->create_user();
        
        $this->response(array('success' => "User Created!"), 200);
        
    }
    
    //to be implemented in future
    public function users_put()
    {
        
    }
    
    // /api/stats
    public function stats_get()
    {
        //TODO: query param: /api/stats/card/{id}, /api/stats/class/{className}
    }
}