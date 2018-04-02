<?php
    session_start();

    if (isset ($_POST['loginEmail']) && isset ($_POST['loginPassword'])) {
        
        $sEmail = $_POST['loginEmail'];
        $sPassword = $_POST['loginPassword'];
        
        $sajUsers = file_get_contents( '../users.txt' );
        $ajUsers = json_decode( $sajUsers );

        foreach ($ajUsers as $jUser) {
            if ($sEmail == $jUser->email && $sPassword == $jUser->password) {
                $_SESSION['id'] = 9999;
                $_SESSION['userid'] = $jUser->id;
                $_SESSION['name'] = $jUser->firstname;
                $_SESSION['usersliked'] = $jUser->userslikedyou;
                header("Location: ../users.php");
                exit;
            }else{
                header('Location: ../index.php');
                echo "User not found";
            }
        }
    }

