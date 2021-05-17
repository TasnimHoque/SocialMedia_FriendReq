<?php

class UserTest extends \PHPUnit\Framework\TestCase
{


	protected $user;
	public function testIfUserCanSignUp()
	{
		$user = new \App\Models\User;
		$email = 'tasnim@gmail.com';
		$password = 'tasnim';
		$user->setuserName('tasnim');
		$this->assertEquals($user->singUpUser( $email, $password ), 'You have signed up successfully.');

	}
	public function testIfUserCanLoginin()
	{
		$user = new \App\Models\User;
		$email = 'tasnim@gmail.com';
		$password = 'tasnim';
		$user->setuserName('tasnim');
		$user->sethashpass('wrong');
		$this->assertEquals($user->loginUser($email, $password), 'Invalid password');

	}

	public function testIffinduserbyidWorks()
	{
		$user = new \App\Models\User;
		$user->setID('TasnimXOXO');
		$find_user= 'demo';
		$this->assertEquals($user->find_user_by_id($find_user), false);

	}
	public function testIfAllUserWOrks()
	{
		$user = new \App\Models\User;
		$allID= ['demo1','demo2','demo3'];
		$this->assertEquals($user->all_users($allID), true);

	}

	
}