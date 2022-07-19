<?php
include_once 'includes/ini.php';
$user = new User();
if ($user->isLoggendIn()) {
    Go::to('admin/page/post');
}

if (Input::exist()) {
    //echo "Eksiston";
    if (Token::check(Input::get('token'))) {
        $x = new Validation();
        $validate = $x->check($_POST, [
            'email' => [
                'req' => true,
                'email' => true
            ],
            'password' => [
                'req' => true
            ],
        ]);

        if ($validate->passed()) {
            $u = new User();
            $login = $u->login(Input::get('email'), Input::get('password'));

            if ($login) {
                Go::to('admin/page/post');
            }
        } else {
            $validate->getError();
        }
    }
}
?>


<!DOCTYPE html>
<!-- === Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!--<title>Login & Registration Form</title>-->
</head>

<body>
    <div class="login-form">
        <div class="container">
            <div class="forms">
                <div class="form login">
                    <span class="title">Login</span>
                    <?= getErrors() ?>
                    <form action="" method="POST">
                        <div class="input-field mb-3" style="margin-top: 25px;">
                            <label for="email">Email: </label>
                            <input
                                    class="input-form"
                                    type="text"
                                    name="email"
                                    placeholder="Email-in"
                                    required
                                    autofocus
                                    autocomplete
                                    value="<?= trim(strtolower(e(Input::get('email')))) ?>"
                                    oninvalid="this.setCustomValidity('Ju lutem shkruani Emailin');"
                                    oninput="this.setCustomValidity('')";
                            >
                        </div>
                        <div class="input-field mb-3">
                            <label for="password">Password: </label>
                            <input
                                    class="input-form password"
                                    type="password"
                                    name="password"
                                    placeholder="Enter your password"
                                    required
                                    autocomplete="off"
                            >
                            <i class="uil uil-eye-slash showHidePw"></i>
                        </div>

                        <div class="checkbox-text">
                            <div class="checkbox-content">
                                <input type="checkbox" id="logCheck">
                                <label for="logCheck" class="text">Remember me</label>
                            </div>
                        </div>

                        <div class="input-field button">
                            <input type="hidden" name="token" value="<?= Token::get() ?>">
                            <input class="btn" type="submit" value="Login">
                        </div>
                    </form>

                    <div class="login-signup">
                        <span class="text">Not a member?
                            <a href="register.html" class="text signup-link" style="color: red">Signup Now</a>
                        </span>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script>
        
const container = document.querySelector(".container"),
pwShowHide = document.querySelectorAll(".showHidePw"),
pwFields = document.querySelectorAll(".password");

//   js code to show/hide password and change icon
pwShowHide.forEach(eyeIcon =>{
  eyeIcon.addEventListener("click", ()=>{
      pwFields.forEach(pwField =>{
          if(pwField.type ==="password"){
              pwField.type = "text";

              pwShowHide.forEach(icon =>{
                  icon.classList.replace("uil-eye-slash", "uil-eye");
              })
          }else{
              pwField.type = "password";

              pwShowHide.forEach(icon =>{
                  icon.classList.replace("uil-eye", "uil-eye-slash");
              })
          }
      }) 
  })
})
    </script>
</body>

</html>