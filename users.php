<?php
	require_once 'templates/header.php'; 

	// get users from the file

	$sajUsers = file_get_contents( 'users.txt' );
	$ajUsers = json_decode( $sajUsers );
	$iUserIdLogedin = $_SESSION['userid'];
	$sUserType = $_SESSION['usertype'];
	$jDisplayUser = '';

	foreach( $ajUsers as $iIndex => $jUser ){
		$randomKey = array_rand($ajUsers, 1);     
		$randomUser = $ajUsers[$randomKey];
		$aUsersLiked = $randomUser->userslikedyou;
		if ($iUserIdLogedin !== $randomUser->id) {
			if ( !empty($aUsersLiked) ) {
				$bNotLiked = true;
				foreach ($aUsersLiked as $iUserId) {		   
					if ($iUserIdLogedin == $iUserId) {
						$bNotLiked = false;
						break;
					}else {
						continue;
					}
				}
				if ($bNotLiked) {
					$jDisplayUser = $randomUser;
					break;
				}	
			}else {
				$jDisplayUser = $randomUser;
				break;
			}
		}
	}

	if (empty($jDisplayUser)) {
		foreach ($ajUsers as $jUser) {
			if ($jUser->id==$iUserIdLogedin) {
				$jDisplayUser = $jUser;
				echo "<h3 class='text-center'>You have reached your swiping limit :(</h3>";
			}
		}
	}
	
	$files = glob("img/*.*");
	for ($i=0; $i<count($files); $i++) {
		$file = $files[$i];
		$aImagePath = pathinfo($file);
		$sImageName = $aImagePath['filename'];
		$sExtension = $aImagePath['extension'];

		if ($sImageName == $jDisplayUser->id) {
			$sImagePath = "img/$sImageName.$sExtension";
		}
	}
		
	print_r ($_SESSION['name']);
	print_r ($_SESSION['usertype']);
		
?>

<div class="container page d-flex justify-content-around align-items-center mt-3 mb-3">
    <div class='card' style='width: 18rem;'>
    <img class='card-img-top' src='<?php echo $sImagePath; ?>' alt='Card image cap'>
		<div class='card-body'>
			<h5 class='card-title mb-4'><?php echo $jDisplayUser->firstname.' '.$jDisplayUser->lastname; ?></h5>
			<h6 class='card-title <?php if($sUserType!=='vip'){echo 'd-none';}?>'>Age: <?php echo "{$jDisplayUser->age} Likes: {$jDisplayUser->like}"?> </h6>
			<h6 class='card-title <?php if($sUserType!=='vip'){echo 'd-none';}?>'>Hobbies: <?php echo $jDisplayUser->hobbies;?> </h6>
			<a href='controllers/like-save.php?id=<?php echo $jDisplayUser->id; ?>&like=true' class='btn btn-dark <?php if($jDisplayUser->id==$iUserIdLogedin){echo 'd-none';} ?>' id="btnYes">Yes</a>
			<a href='controllers/like-save.php?id=<?php echo $jDisplayUser->id; ?>&like=false' class='btn btn-dark <?php if($jDisplayUser->id==$iUserIdLogedin){echo 'd-none';} ?>' id="btnNo">No</a>
			<a href='delete.php?id=<?php echo $jDisplayUser->id; ?>' class='btn btn-dark <?php if($sUserType!=='admin'){echo 'd-none';} ?>' id="btnDelete">Delete</a>
		</div>
  	</div>
</div>

<?php
  	require_once 'templates/footer.php';   
?>