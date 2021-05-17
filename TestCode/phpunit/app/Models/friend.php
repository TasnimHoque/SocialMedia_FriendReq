<?php

namespace App\Models;

class friend
{
	
	protected $user_name;
    protected $user_email;
    protected $friendList=[];
	protected $blockList=[];
	protected $pendingList=[];
	protected $id;
	
	public function setuserName($user_name)
	{
		$this->user_name = $user_name;
	}
	public function getUsername() {
			return $this->user_name;
	}
	public function sethashpass($hash_pass)
	{
		$this->hash_pass = $hash_pass;

	}
	public function gethashpassword() {
			return $this->hash_pass;
	}
	

	
	public function setfriendlist($friendList)
	{
		$this->friendList = $friendList;
	}

	public function setBlocklist($blockList)
	{
		$this->blockList = $blockList;
	}
	
	
	public function setpendinglist($pendingList)
	{
		$this->pendingList = $pendingList;
	}

	 // CHECK IF ALREADY FRIENDS
    public function is_already_friends($user_id){
        try{
         
	
            if(array_search($user_id,$this->friendList) > -1){
                return true;
            }
            else{
                return false;
            }
        }
        catch (PDOException $e) {
            die($e->getMessage());
        }
        
    }
	
	public function is_already_blocked($user_id){
        try{
         
	
            if(array_search($user_id,$this->blockList) > -1){
                return true;
            }
            else{
                return false;
            }
        }
        catch (PDOException $e) {
            die($e->getMessage());
        }
        
    }
	
	public function if_given_by_frnd($user_id){
        try{
        

             if(array_search($user_id,$this->blockList) > -1){
                return true;
            }
            else{
                return false;
            }
        }
        catch (PDOException $e) {
            die($e->getMessage());
        }
    }
	
	
    //  IF I AM THE REQUEST SENDER
    public function am_i_the_req_sender(){
        try{

             if(array_search($this->user_name,$this->friendList) > -1){
                return false;
            }
            else{
                return true;
            }
        }
        catch (PDOException $e) {
            die($e->getMessage());
        }
    }
	
    //  IF I AM THE RECEIVER 
    public function am_i_the_req_receiver($user_id){
        
        try{
      

             if(array_search($this->user_name,$this->friendList) > -1){
                return true;
            }
            else{
                return false;
            }
        }
        catch (PDOException $e) {
            die($e->getMessage());
        }
    }
	
    // CHECK IF REQUEST HAS ALREADY BEEN SENT
    public function is_request_already_sent( $user_id){
        
        try{
           
    
            if(array_search($user_id,$this->friendList) > -1){
                return true;
            }
            else{
                return false;
            }
        }
        catch (PDOException $e) {
            die($e->getMessage());
        }

    }
	

    // MAKE PENDING FRIENDS (SEND FRIEND REQUEST)
    public function make_pending_friends(){
        
        try{
            return $this->pendingList;
        }
        catch (PDOException $e) {
            die($e->getMessage());
        }
    }
	

    // CANCLE FRIEND REQUEST
    public function cancel_or_ignore_friend_request($IndexToRemove){
        
        try{
            array_splice($this->pendingList, $IndexToRemove, $IndexToRemove);
			return $this->pendingList;
        }
        catch (PDOException $e) {
            die($e->getMessage());
        }

    }
	

    // MAKE FRIENDS
    public function make_friends($friendname){
        
        try{
			array_push($this->friendList,$friendname);
           return $this->friendList;
                
            }            
        
        catch (PDOException $e) {
            die($e->getMessage());
        }

    }
	
    // DELETE FRIENDS 
    public function delete_friends($IndexToRemove){
        try{
             array_splice($this->friendList, $IndexToRemove, $IndexToRemove);
             return $this->friendList;
        }
        catch (PDOException $e) {
            die($e->getMessage());
        }
    }
	//block frnd
	
	
	public function block_user($user_id){
        try{
				
				array_push($this->blockList,$user_id);
				return $this->blockList;
				
          
        }
        catch (PDOException $e) {
            die($e->getMessage());
        }
    }

	//unblock req
	public function unblock_user($IndexToRemove){
        try{
			array_splice($this->blockList, $IndexToRemove, $IndexToRemove);
             return $this->blockList;
        }
        catch (PDOException $e) {
            die($e->getMessage());
        }
    }

	
	public function block_khaisi($my_id, $user_id){
        try{
					
				
            header('Location: ../view/user_profile.php?id='.$user_id);
            exit;
        }
        catch (PDOException $e) {
            die($e->getMessage());
        }
    }
	
    // REQUEST NOTIFICATIONS
    public function request_notification($send_data){
        try{
            
            if($send_data){
                return true;
            }
            else{
                return false;
            }

        }
        catch (PDOException $e) {
            die($e->getMessage());
        }

    }


    public function get_all_friends($send_data){
        try{
          

                if($send_data){
                    return $this->friendList;

                }
                else{
                    return false;
                }
        }
        catch (PDOException $e) {
            die($e->getMessage());
        }
    }
		
	   public function get_all_blocked_friends( $send_data){
        try{
      

                if($send_data){

                     return $this->blockList;

                }
                else{
                    return $false;
                }
        }
        catch (PDOException $e) {
            die($e->getMessage());
        }
    }
	

	
	
	

	


}