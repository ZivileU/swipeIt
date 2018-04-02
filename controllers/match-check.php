<?php
    session_start();

    $iUserIdLiked = $_GET['id'];
    $iUserIdLogedin = $_SESSION['userid'];
    $sajUsers = file_get_contents('../users.txt');
    $ajUsers = json_decode($sajUsers);

	if (!empty($_SESSION['usersliked'])) {
		$aUsersLikedYou = $_SESSION['usersliked'];
        $bLiked = true;
		foreach ($aUsersLikedYou as $iUserId){
			if ($iUserId == $iUserIdLiked) {
                break;
			}
        }
	}else {
        $bLiked = false;
    }

    if ($bLiked ) {
        header("Location: ../profile.php?id=$iUserId");
        
    }else {
        header("Location: ../users.php");
    }
?>