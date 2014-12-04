<?php 
//model for retrieving cards. Note that this is a read-only model
class User_model extends CI_Model {
    
    private $user_id = "";
    private $username = "";
    private $password = "";
    private $email = "";

    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    public function setParam($username, $password, $email)
    {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
    }
    
    public function get_all()
    {
        $query = $this->db->get('users');
        return $query->result();
    }
    
    public function get_user($user_id)
    {
        $query = $this->db->get_where('users', array('user_id' => $user_id));
        return $query->result();
    }
    
    public function get_user_info($identity)
    {
        $query = NULL;
        $this->db->select('user_id, username, email');
        
        if(filter_var($identity, FILTER_VALIDATE_EMAIL))
        {
            $query = $this->db->get_where('users', array('email' => $identity));
        }
        else
        {
            $query = $this->db->get_where('users', array('username' => $identity));
        }
            
        return $query->result();
    }
    
    public function validate_user($identity, $password)
    {
        if(filter_var($identity, FILTER_VALIDATE_EMAIL))
        {
            $this->db->get_where('users', array('email' => $identity, 'password' => $password));
        }
        else
        {
            $this->db->get_where('users', array('username' => $identity, 'password' => $password));
        }
        
        if($this->db->count_all_results() > 0)
        {
            return TRUE;
        }
        
        return FALSE;
    }
    
    public function create_user()
    {       
        try 
        {
            $this->db->insert('users', array(
                                        'username' => $this->username,
                                        'password' => $this->password,
                                        'email' => $this->email
                                       ));
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