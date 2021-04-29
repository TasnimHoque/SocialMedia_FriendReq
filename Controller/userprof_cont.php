<?php
require '../init.php';
if(isset($_SESSION['user_id']) && isset($_SESSION['email'])){
    if(isset($_GET['id'])){
        $user_data = $user_obj->find_user_by_id($_GET['id']);
        if($user_data ===  false){
            header('Location: profile.php');
            exit;
        }
        else{
            if($user_data->id == $_SESSION['user_id']){
                header('Location: profile.php');
                exit;
            }
        }
    }
}
else{
    header('Location: ../model/logout.php');
    exit;
}
// CHECK if blocked by used
$is_already_blocked = $frnd_obj->is_already_blocked($_SESSION['user_id'], $user_data->id);
$if_given_by_frnd = $frnd_obj->if_given_by_frnd($_SESSION['user_id'], $user_data->id);
// CHECK FRIENDS
$is_already_friends = $frnd_obj->is_already_friends($_SESSION['user_id'], $user_data->id);
//  IF I AM THE REQUEST SENDER
$check_req_sender = $frnd_obj->am_i_the_req_sender($_SESSION['user_id'], $user_data->id);
// IF I AM THE REQUEST RECEIVER
$check_req_receiver = $frnd_obj->am_i_the_req_receiver($_SESSION['user_id'], $user_data->id);
// TOTAL REQUESTS
$get_req_num = $frnd_obj->request_notification($_SESSION['user_id'], false);
// TOTAL FRIENDS
$get_frnd_num = $frnd_obj->get_all_friends($_SESSION['user_id'], false);
$get_blocked_frnd_num = $frnd_obj->get_all_blocked_friends($_SESSION['user_id'], false);
$get_all_blocked_friends = $frnd_obj->get_all_blocked_friends($_SESSION['user_id'], true);
?>