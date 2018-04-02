
<?php
    session_start();

    if( isset($_POST['txtFirstName']) && isset($_POST['txtLastName']) && isset($_POST['txtEmail']) && isset($_POST['txtPassword']) && isset($_FILES['image']) && $_FILES['image']['size'] != 0 ){
        
        $sFirstName = $_POST['txtFirstName'];
        $sLastName = $_POST['txtLastName'];
        $sEmail = $_POST['txtEmail'];
        $sPassword = $_POST['txtPassword'];
        $sHobbies = $_POST['txtHobbies'];
        $sAge = $_POST['iAge'];
        $sUniqueId = uniqid();
        
        // with backend validation of text input
        if( strlen($sFirstName) >= 2 && strlen($sFirstName) <= 20 && 
        strlen($sLastName) >= 2 && strlen($sLastName) <= 20 &&
        strlen($sEmail) >= 5 && strlen($sEmail) <= 30 &&
        strlen($sPassword) >= 3 && strlen($sPassword) <= 30 &&
        strlen($sHobbies) <=50 &&
        strlen($sAge) >= 1 && strlen($sAge) <= 3){
            
            $sajUsers = file_get_contents( '../users.txt' );
            $ajUsers = json_decode( $sajUsers );
            $jUser = json_decode( '{}' );
            $jUser->firstname = $sFirstName;
            $jUser->lastname = $sLastName;
            $jUser->email = $sEmail;
            $jUser->password = $sPassword;
            $jUser->hobbies = $sHobbies;
            $jUser->age = $sAge;
            $jUser->id = $sUniqueId;
            $jUser->userslikedyou = [];
            array_push( $ajUsers , $jUser );
            $sajUsers = json_encode( $ajUsers  );
            file_put_contents( '../users.txt' , $sajUsers );
        }else {
            echo "Wrong text input";
        }
                
        if( $_FILES['image']['size'] < 150000 ){ 
            $aImage = $_FILES['image'];
            $sOldPath = $aImage['tmp_name'];
            $sImageName = $aImage['name'];
            $aImageName = explode( '.' , $sImageName );
            $sExtension = $aImageName[count($aImageName)-1];
            $sPathToSaveFile = "../img/$sUniqueId.$sExtension";
            move_uploaded_file( $sOldPath , $sPathToSaveFile );
        }else{
            echo "The photo file is too large";
        }
        $_SESSION['id'] = 9999;
        $_SESSION['userid'] = $jUser->id;
        $_SESSION['name'] = $jUser->firstname;
        $_SESSION['usersliked'] = $jUser->userslikedyou;
        header("Location: ../users.php");
        
    }else{
        echo "SORRY, wrong data";
    }
