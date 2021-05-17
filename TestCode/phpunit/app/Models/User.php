<?php

namespace App\Models;

class User
{
    protected $user_name;
    protected $user_email;
    protected $user_pass;
    protected $hash_pass;
	protected $id;

	public function setuserName($username)
	{
		$this->user_name = $username;

	}
	public function getUsername() {
			return $this->username;
	}
	public function sethashpass($hash_pass)
	{
		$this->hash_pass = $hash_pass;

	}
	public function gethashpassword() {
			return $this->hash_pass;
	}
		public function setID($id)
	{
		$this->id = $id;

	}
	public function getID() {
			return $this->id;
	}


	public function singUpUser( $email, $password ){
        try{
         
            $this->user_email = $email;
            $this->user_pass = $password;
           
		   if(!empty($this->user_name) && !empty($this->user_email) && !empty($this->user_pass)){

                if (filter_var($this->user_email, FILTER_VALIDATE_EMAIL)) { 
						$check_email = $this->user_name;

                   
                        
                        $user_image = rand(1,12);

                        $this->hash_pass = password_hash($this->user_pass, PASSWORD_DEFAULT);
 
                       
                        return 'You have signed up successfully.' ;                   
                  
                }
                else{
                    return  'Invalid email address!';
                }    
            }
            else{
                return  'Please fill in all the required fields.';
            } 
        }
        catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    // LOGIN USER
   public function loginUser($email, $password){
        
        try{
            $this->user_email = $email;
            $this->user_pass = $password;

            
            if(!empty($this->user_email)){
   

                $match_pass = password_verify($this->user_pass, $this->hash_pass);
                if($match_pass){
                    
                     return 'You have LoggedIn successfully.';
                }
                else{
                    return 'Invalid password';
                }
                
            }
            else{
                return 'Invalid email address!' ;
            }

        }
        catch (PDOException $e) {
            die($e->getMessage());
        }

    }

    // FIND USER BY ID
  public  function find_user_by_id($find_user){
        try{
     
            if($find_user === $this->id){
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
    
    // FETCH ALL USERS WHERE ID IS NOT EQUAL TO MY ID
   public function all_users($allID){
        try{
   
            if(count($allID) > 0){
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

}