<?php

class friendTest extends \PHPUnit\Framework\TestCase
{


	protected $friend;
	public function testIfALreadyFriendOrNOt()
	{
		$friend = new \App\Models\friend;
		$friendList=['demo1','demo2','demo3'];
		$friend->setfriendlist($friendList);
		$user_id= 'demo1';
		$this->assertEquals($friend->is_already_friends($user_id), true);

	}
	public function testIfIsAlreadyBlocked()
	{
		$friend = new \App\Models\friend;
		$blockList=['demo1','demo2','demo3'];
		$friend->setBlocklist($blockList);
		$BLockeduser_id= 'demo1';
		$this->assertEquals($friend->is_already_blocked($BLockeduser_id), true);

	}
	public function testIfIsAlreadyBlockedbyfriend()
	{
		$friend = new \App\Models\friend;
		$blockList=['demo1','demo2','demo3'];
		$friend->setBlocklist($blockList);
		$user_id= 'demo';
		$this->assertEquals($friend->if_given_by_frnd($user_id), false);

	}
	public function testIfAmItheReqSender()
	{
		$friend = new \App\Models\friend;
		$ReqList=['demo1','demo2','demo3'];
		$friend->setfriendlist($ReqList);
		$friend->setuserName('tasnim');
		$this->assertEquals($friend->am_i_the_req_sender(), true);
	}
	
	public function testIfAmItheReqreceiver()
	{
		$friend = new \App\Models\friend;
		$ReqList=['demo1','demo2','demo3'];
		$friend->setfriendlist($ReqList);
		$user_id= 'demo';
		$this->assertEquals($friend->am_i_the_req_receiver($user_id), false);
	}
	public function testIfIReqAlreadySEnd()
	{
		$friend = new \App\Models\friend;
		$ReqList=['demo1','demo2','demo3'];
		$friend->setfriendlist($ReqList);
		$user_id= 'demo';
		$this->assertEquals($friend->is_request_already_sent($user_id), false);

	}
	public function testIfImakependingfriends()
	{
		$friend = new \App\Models\friend;
		$List=['demo1','demo2','demo3'];
		$friend->setpendinglist($List);
		$this->assertEquals($friend->make_pending_friends(), $List);

	}
	public function testIfCancelOrIgnore()
	{
		$friend = new \App\Models\friend;
		$List=['demo1','demo2','demo3'];
		$friend->setpendinglist($List);
		$IndexToRemove = 1;
		$AfterRemoveList=['demo1','demo3'];
		$this->assertEquals($friend->cancel_or_ignore_friend_request($IndexToRemove), $AfterRemoveList);

	}
	public function testIfMakeFriendWorks()
	{
		$friend = new \App\Models\friend;
		$List=['demo1','demo3'];
		$friend->setfriendlist($List);
		$friendname = 'blue';
		$AfterAddingFriends=['demo1','demo3','blue'];
		$this->assertEquals($friend->make_friends($friendname), $AfterAddingFriends);

	}
	public function testIfDeleteFriendWorks()
	{
		$friend = new \App\Models\friend;
		$List=['demo1','demo3','blue'];
		$friend->setfriendlist($List);
		$IndexToRemove = 2;
		$AfterdeletingFriends=['demo1','demo3'];
		$this->assertEquals($friend->delete_friends($IndexToRemove), $AfterdeletingFriends);

	}
	public function testIfBlockUserWorks()
	{
		$friend = new \App\Models\friend;
		$List=['demo1','demo3','blue'];
		$friend->setBlocklist($List);
		$toBLock = 'blokeduser';
		$AfterblockingFriends=['demo1','demo3','blue','blokeduser'];
		$this->assertEquals($friend->block_user($toBLock), $AfterblockingFriends);

	}
		public function testIfUNBlockUserWorks()
	{
		$friend = new \App\Models\friend;
		$List=['demo1','demo3','blue','blokeduser'];
		$friend->setBlocklist($List);
		$toUnBLock = 3;
		$AfterunblockingFriends=['demo1','demo3','blue'];
		$this->assertEquals($friend->unblock_user($toUnBLock), $AfterunblockingFriends);

	}	
		public function testIfNOtificationworks()
	{
		$friend = new \App\Models\friend;
		$send_data = 'YOu have a notification';
		$this->assertEquals($friend->request_notification($send_data), true);

	}
	public function testIfGetALLfriendsworks()
	{
		$friend = new \App\Models\friend;
		$List=['demo1','demo3','blue'];
		$friend->setfriendlist($List);
		$send_data = 'GetFriend';
		$this->assertEquals($friend->get_all_friends($send_data), $List);

	}
	public function testIfGetALLBlockedfriendsworks()
	{
		$friend = new \App\Models\friend;
		$List=['demo3','blue'];
		$friend->setBlocklist($List);
		$send_data = 'GetBlockedFriend';
		$this->assertEquals($friend->get_all_blocked_friends($send_data), $List);

	}

	
}