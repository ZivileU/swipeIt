<?php
	$iUserId = $_GET['id'];
	$bLike = $_GET['like'];
	$sajUsers = file_get_contents('../users.txt');
	$ajUsers = json_decode($sajUsers);
	foreach ($ajUsers as $jUser) {
		if($iUserId == $jUser->id) {
			if ($bLike == 'true') {
				$jUser->like++;
			}else if ($bLike == 'false'){
				$jUser->dislike++;
				break;
			}
		}
	}

	$sajUsers = json_encode($ajUsers);
	file_put_contents('../users.txt', $sajUsers);

	header("Location: ../users.php"); //redirect