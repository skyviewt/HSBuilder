<?php 
//model for retrieving cards. Note that this is a read-only model
class Run_model extends CI_Model {
    
    private $user_id = 0;
    private $cards = "";
    private $wins = 0;
    private $losses = 0;
    private $rewards = "";

    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    public function setParam($data)
    {
        $this->user_id = $data['user_id'];
        $this->cards = $data['cards'];
        $this->wins = $data['wins'];
        $this->losses = $data['losses'];
        $this->rewards = $data['rewards'];
    }
    
    public function add_run()
    {       
        try 
        {
            $this->db->insert('runs', array(
                                        'user_id' => $this->user_id,
                                        'cards' => $this->cards,
                                        'wins' => $this->wins,
                                        'losses' => $this->losses,
                                        'rewards' => $this->rewards
                                       ));
        } 
        catch (Exception $e) 
        {
            return $e->getMessage();
        }
        
        return true;
    }
    
    public function get_runs($user_id)
    {
        $query = $this->db->get_where('runs', array('user_id' => $user_id));
        return $query->result();
    }


}