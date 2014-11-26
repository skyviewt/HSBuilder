<?php 
//model for retrieving cards. Note that this is a read-only model
class Card_model extends CI_Model {

    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    public function get_all()
    {
        $query = $this->db->get_where('cards', array('collectible' => 1));
        return $query->result();
    }
    
    public function get_card($id)
    {
        $query = $this->db->get_where('cards', array('id' => $id, 'collectible' => 1));
        return $query->result();
    }
    
    public function get_class($className)
    {        
        $class_id = 0;
        
        switch($className)
        {
            case 'neutral':
                $class_id = 0;
            break;
            case 'warrior':
                $class_id = 1;
            break;
            case 'paladin':
                $class_id = 2;
            break;
            case 'hunter':
                $class_id = 3;
            break;
            case 'rogue':
                $class_id = 4;
            break;
            case 'priest':
                $class_id = 5;
            break;
            case 'druid':
                $class_id = 6;
            break;
            case 'shaman':
                $class_id = 7;
            break;
            case 'mage':
                $class_id = 8;
            break;
            case 'warlock':
                $class_id = 9;
            break;
        }
        
        $query = $this->db->get_where('cards', array('player_class' => $class_id, 'collectible' => 1));
        return $query->result();
    }

}