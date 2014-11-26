<?php 
//model for retrieving cards. Note that this is a read-only model
class User_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_all()
    {
        $query = $this->db->get('users');
        return $query->result();
    }
    
    function get_user($user_id)
    {
        $query = $this->db->get_where('user_id', array('user_id' => $user_id));
        return $query->result();
    }
    
    function create_user($user)
    {       
        try 
        {
            $this->db->insert('users', $user);
        } 
        catch (Exception $e) 
        {
            return $e->getMessage();
        }
        
        return true;
    }
    
    function update_user($user)
    {
        try 
        {
            $this->db->where('id', $id);
            $this->db->update('mytable', $data); 
        } 
        catch (Exception $e) 
        {
            return $e->getMessage();
        }
        
        return true;
    }

}