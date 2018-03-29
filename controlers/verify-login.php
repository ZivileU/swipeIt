<?php
    session_start();

    if (isset ($_POST['loginEmail']) && isset ($_POST['loginPassword'])) {
        
        $sEmail = $_POST['loginEmail'];
        $sPassword = $_POST['loginPassword'];
        
        $sajUsers = file_get_contents( '../users.txt' );
        $ajUsers = json_decode( $sajUsers );

        foreach ($ajUsers as $Index => $jUser) {
            if ($sEmail == $jUser->email && $sPassword == $jUser->password) {
                $_SESSION['id'] = 9999;
                header("Location: ../users.php");
                exit;
            }else{
                header('Location: ../index.php');
                echo "User not found";
            }
        }
    }