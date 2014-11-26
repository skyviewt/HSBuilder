<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';
class Api extends REST_Controller {
    
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
    
    public function users_post()
    {
        
    }
    
    public function users_put()
    {
        
    }
    
    // /api/stats
    public function stats_get()
    {
        //TODO: query param: /api/stats/card/{id}, /api/stats/class/{className}
    }
}