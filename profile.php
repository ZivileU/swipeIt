<?php
    require_once 'templates/header.php'; 

    $sajUsers = file_get_contents( 'users.txt' );
    $ajUsers = json_decode( $sajUsers );
    $iUserIdLogedin = $_SESSION['userid'];
    $jDisplayUser = '';

    foreach ($ajUsers as $jUser) {
        if (isset($_GET['id'])) {
            $iMatchedUserId = $_GET['id'];
            if ($iMatchedUserId == $jUser->id) {
                $jDisplayUser = $jUser;
                echo "<h4 class='text-center'>You have a match!</h4>";
            }
        }else if ($iUserIdLogedin == $jUser->id) {
            $jDisplayUser = $jUser; 
        }
    }

    $files = glob("img/*.*");
	for ($i=0; $i<count($files); $i++) {
		$file = $files[$i];
		$aImagePath = pathinfo($file);
		$sImageName = $aImagePath['filename'];
		$sExtension = $aImagePath['extension'];

		if ($sImageName = $jDisplayUser->id) {
			$sImagePath = "img/$sImageName.$sExtension";
		}
	}
?>
<div class="container page d-flex justify-content-around align-items-center mt-3 mb-3">
    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src='<?php echo $sImagePath; ?>' alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title"><?php echo $jDisplayUser->firstname.' '.$jDisplayUser->lastname.', '.$jDisplayUser->age; ?></h5>
            <p class="card-text">Hobbies: <?php echo $jDisplayUser->hobbies?></p>
            <p class="card-text">Email: <?php echo $jDisplayUser->email?></p>
        </div>
    </div>
</div>

<?php
  	require_once 'templates/footer.php';   
?>