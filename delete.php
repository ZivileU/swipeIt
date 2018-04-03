<?php
	require_once 'templates/header.php'; 

	if( isset($_GET['id']) ){
		$sId = $_GET['id'];
		$sajUsers = file_get_contents( 'users.txt' );
		$ajUsers = json_decode( $sajUsers );
		$jDeletedUser = '';
		foreach( $ajUsers as $iIndex => $jUser ){
			if( $jUser->id == $sId ){
				$jDeletedUser = $jUser;
				array_splice( $ajUsers , $iIndex , 1 );
				break;
			}
		}
		file_put_contents( 'users.txt' , json_encode($ajUsers) );
		echo "<h4 class='text-center'>You have deleted {$jDeletedUser->firstname} {$jDeletedUser->lastname}</h4>";
	}
	require_once 'templates/footer.php'; 
