<?php
    require_once 'templates/header.php';
?>

        <div id="pageLogIn" class="container page">
            <p class="h3 mx-auto">Log In</p>
            <form id="logInForm" name="logInForm" action="controllers/verify-login.php" method="post" style="width: 300px;">
                <div class="form-group">
                    <input type="text" class="form-control" name="loginEmail" placeholder="Email" data-min="5" data-max="30">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="loginPassword" placeholder="Password" data-min="3" data-max="30">
                </div>
                <button id="btnLogin" type="button" class="btn btn-dark">Log In</button>
            </form>
            <a id="noAccount" href="#pageSignup">Don't have an account yet?</a>
        </div>

        <div id="pageSignUp" class="container page">
            <p class="h3 mx-auto">Sign Up</p>
            <form name="signUpForm" action="controllers/signup-save.php" method="post" enctype="multipart/form-data" style="width: 300px;">

                <div class="form-group">
                    <input type="text" class="form-control" name="txtFirstName" placeholder="First Name">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="txtLastName" placeholder="Last Name">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="txtEmail" placeholder="Email">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="txtPassword" placeholder="Password">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="txtHobbies" placeholder="Your hobbies">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="iAge" placeholder="Age" data-min="1">
                </div>
                <div class="form-group">
                    <input type="file" class="form-control" name="image" onchange="readUrl(this)">
                </div>
                <div>
                    <img id="uploadImg" src="">
                </div>
                <button id="btnSignUp" type="submit" class="btn btn-dark">Sign Up</button>
            </form>
            <a id="backLogIn" href="#pageLogin">Back to Log In</a>
        </div>

<?php
    require_once 'templates/footer.php';
?>




