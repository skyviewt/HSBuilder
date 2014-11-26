<?php 
//model for retrieving cards. Note that this is a read-only model
class User_model extends CI_Model {
    
    private user_id = "";
    private username = "";
    private password = "";
    private email = "";

    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    public function setParam(user_id, username, password, email)
    {
        $this->user_id = user_id;
        $this->username = username;
        $this->password = password;
        $this->email = email;
    }
    
    public function get_all()
    {
        $query = $this->db->get('users');
        return $query->result();
    }
    
    public function get_user($user_id)
    {
        $query = $this->db->get_where('user_id', array('user_id' => $user_id));
        return $query->result();
    }
    
    public function create_user()
    {       
        try 
        {
            $this->db->insert('users', $this);
        } 
        catch (Exception $e) 
        {
            return $e->getMessage();
        }
        
        return true;
    }
    
    public function update_user()
    {
        try 
        {
            $this->db->where('id', $id);
            $this->db->update('users', $this); 
        } 
        catch (Exception $e) 
        {
            return $e->getMessage();
        }
        
        return true;
    }

}