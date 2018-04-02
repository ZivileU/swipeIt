<?php
 	session_start();

	$iUserIdLiked = $_GET['id'];
	$bLike = $_GET['like'];
	$iUserIdLogedin = $_SESSION['userid'];
	$sajUsers = file_get_contents('../users.txt');
	$ajUsers = json_decode($sajUsers);

	foreach ($ajUsers as $jUser) {
		if($iUserIdLiked == $jUser->id) {
			if ($bLike == 'true') {
				$jUser->like++;
				$jUser->userslikedyou[] = $iUserIdLogedin; //saving userid who liked a user
			}else if ($bLike == 'false'){
				$jUser->dislike++;
				break;
			}
		}
	}
	
	$sajUsers = json_encode($ajUsers);
	file_put_contents('../users.txt', $sajUsers);
	
	header("Location: match-check.php?id=$iUserIdLiked"); //redirect
