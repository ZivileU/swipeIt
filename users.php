<?php
	require_once 'templates/header.php'; 

	// get users from the file

	$sajUsers = file_get_contents( 'users.txt' );
	$ajUsers = json_decode( $sajUsers );
	$jDisplayUser = '';
	foreach( $ajUsers as $iIndex => $jUser ){
		$randomKey = array_rand($ajUsers, 1);
		$randomUser = $ajUsers[$randomKey];
		$jDisplayUser = $randomUser;
	}
?>

<div class="container page d-flex justify-content-around align-items-center mt-3 mb-3">
    <div class='card' style='width: 18rem;'>
    <!-- <img class='card-img-top' src='<?php echo $jDisplayUser->img; ?>' alt='Card image cap'> -->
		<div class='card-body'>
			<h5 class='card-title'><?php echo $jDisplayUser->firstname.' '.$jDisplayUser->lastname; ?></h5>
			<a href='controlers/like-save.php?id=<?php echo $jDisplayUser->id; ?>&like=true' class='btn btn-dark' id="btnYes">Yes</a>
			<a href='controlers/like-save.php?id=<?php echo $jDisplayUser->id; ?>&like=false' class='btn btn-dark' id="btnNo">No</a>
		</div>
  	</div>
</div>

<?php
  	require_once 'templates/footer.php';   
?>