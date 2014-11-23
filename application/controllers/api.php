<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';
class Api extends REST_Controller {
    
    // /api/cards
    public function cards_get()
    {
        //TODO: query param: class: /api/cards/class/{className} single card: /api/cards/id/{id}
        
        $cards = array(
			1 => array('id' => 1, 'name' => 'Tirion Fordring', 'class' => 'paladin', 'atk' => '6', 'hp' => '6', 'effect' => array('taunt', 'divine shield')),
			2 => array('id' => 2, 'name' => 'King Krush', 'atk' => '8', 'hp' => '8'),
			3 => array('id' => 3, 'name' => 'skyview', 'atk' => 'infinity', 'hp' => 'infinity')
		);
        
         $this->response($cards, 200);
    }
    
    // /api/stats
    public function stats_get()
    {
        //TODO: query param: /api/stats/card/{id}, /api/stats/class/{className}
    }
}