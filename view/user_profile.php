<?php

include("../controller/userprof_cont.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo  $user_data->username;?></title>
    <link rel="stylesheet" href="../view/style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
</head>
<body>
    <div class="profile_container">
        
        <div class="inner_profile">
            <div class="img">
                <img src="../profile_images/<?php echo $user_data->user_image; ?>" alt="Profile image">
            </div>
            <h1><?php echo  $user_data->username;?></h1>
            <nav>
            <ul>
                <li><a href="profile.php" rel="noopener noreferrer">Home</a></li>
                <li><a href="notifications.php" rel="noopener noreferrer">Requests<span class="badge <?php
                if($get_req_num > 0){
                    echo 'redBadge';
                }
                ?>"><?php echo $get_req_num;?></span></a></li>
                <li><a href="friends.php" rel="noopener noreferrer">Friends<span class="badge"><?php echo $get_frnd_num;?></span></a></li>
                 <li><a href="blocklist.php" rel="noopener noreferrer">Blocklist<span class="badge"><?php echo $get_blocked_frnd_num;?></span></a></li>
				<li><a href="../model/logout.php" rel="noopener noreferrer">Logout</a></li>
            </ul>
        </nav>
		
			<div class="actions">
			<a href="https://mail.google.com/mail/u/1/#inbox?compose=new"><?php   
				if($is_already_friends){
					echo  "You can Contact at " .$user_data->user_email;				
                } 
				
				?> </a>
               <?php   
				if(!$is_already_friends){
					echo  "Be friend to see contact information" 		;		
                } 
				
				?> 
        
            </div>
		 
            <div class="actions">
                <?php
                if($is_already_friends){
                    echo '<a href="../Controller/functions.php?action=unfriend_req&id='.$user_data->id.'" class="req_actionBtn unfriend">Unfriend</a>';
                }
                elseif($check_req_sender){
                    echo '<a href="../Controller/functions.php?action=cancel_req&id='.$user_data->id.'" class="req_actionBtn cancleRequest">Cancel Request</a>';
                }
                elseif($check_req_receiver){
                    echo '<a href="../Controller/functions.php?action=ignore_req&id='.$user_data->id.'" class="req_actionBtn ignoreRequest">Ignore</a>&nbsp;
                    <a href="../Controller/functions.php?action=accept_req&id='.$user_data->id.'" class="req_actionBtn acceptRequest">Accept</a>';
                }
                elseif($if_given_by_frnd){
                  
                }
				elseif($is_already_blocked){
                  
                }
				 else{
                    echo '<a href="../Controller/functions.php?action=send_req&id='.$user_data->id.'" class="req_actionBtn sendRequest">Send Request</a>';
                }
                ?>
        
            </div>
			<div class="actions">
                <?php
                if($is_already_blocked){
                    echo '<a href="../Controller/functions.php?action=unblock_req&id='.$user_data->id.'" class="req_actionBtn unfriend">Unblock</a>';
                }
				else if($if_given_by_frnd){
                    echo '<a href="../Controller/functions.php?action=block_khaisi&id='.$user_data->id.'" class="req_actionBtn sendRequest">You have been Blocked By this user</a>';
                }
                else{
                    echo '<a href="../Controller/functions.php?action=block_req&id='.$user_data->id.'" class="req_actionBtn sendRequest">Block</a>';
                }
                ?>
        
            </div>
        </div>
     
        <p class="site_link"></p>
    </div>
</body>
</html>