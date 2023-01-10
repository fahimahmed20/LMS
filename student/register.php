<?php
require_once "../dbcon.php";
if(isset($_POST['submit_btn'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $roll = $_POST['roll'];
    $reg = $_POST['reg'];
    $email = $_POST['email'];
    $unsername = $_POST['unsername'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $input_arr = array();
    if(empty($fname)){
        $input_arr['fname'] = "First name is required";
    }
    if(empty($lname)){
        $input_arr['lname'] = "Last name is required";
    }
    if(empty($roll)){
        $input_arr['roll'] = "Roll is required";
    }
    if(empty($reg)){
        $input_arr['reg'] = "Resistration No. is required";
    }
    if(empty($email)){
        $input_arr['email'] = "Email is required";
    }
    if(empty($unsername)){
        $input_arr['unsername'] = "Unsername is required";
    }
    if(empty($password)){
        $input_arr['password'] = "Password is required";
    }
    if(empty($phone)){
        $input_arr['phone'] = "Phone No. is required";
    }
    if(count($input_arr) == 0 ){
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $result = mysqli_query( $con ,"INSERT INTO `students`(`fname`, `lname`, `roll`, `reg`, `email`, `username`, `password`,`phone`) VALUES ('$fname','$lname','$roll','$reg','$email','$unsername','$password_hash','$phone')");
        
        if($result){
            $res_success = "Registration Successfully!";
        }else{
            $res_error = "Something wrong";
        }
    }
    
}

?>
<!doctype html>
<html lang="en" class="fixed accounts sign-in">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Helsinki</title>
    <link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
    <link rel="icon" type="image/png" sizes="192x192" href="favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/vendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/stylesheets/css/style.css">
</head>

<body>
<div class="wrap">
    <!-- page BODY -->
    <!-- ========================================================= -->
    <div class="page-body animated slideInDown">
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <!--LOGO-->
        <div class="logo">
           <h1 class="text-center">LMS</h1>
        </div>
        <div class="box">
            <!--SIGN IN FORM-->
            <div class="panel mb-none">
                <div class="panel-content bg-scale-0">
                    <form method="post" action="<?php $_SERVER['PHP_SELF'];?>">
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="fname" placeholder="First Name">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php 
                                if(isset($input_arr['fname'])){
                                    echo '<span style="color: red;font-size: 14px;line-height: 18px;margin-top: 4px;display: inline-block;margin-left: 4px;">'.$input_arr['fname'].'</span>';
                                }
                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="lname" placeholder="Last Name">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php 
                                if(isset($input_arr['lname'])){
                                    echo '<span style="color: red;font-size: 14px;line-height: 18px;margin-top: 4px;display: inline-block;margin-left: 4px;">'.$input_arr['lname'].'</span>';
                                }
                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="roll" placeholder="Roll Number" pattern="[0-9]{6}">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php 
                                if(isset($input_arr['roll'])){
                                    echo '<span style="color: red;font-size: 14px;line-height: 18px;margin-top: 4px;display: inline-block;margin-left: 4px;">'.$input_arr['roll'].'</span>';
                                }
                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="reg" placeholder="Registration Number" pattern="[0-9]{6}">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php 
                                if(isset($input_arr['reg'])){
                                    echo '<span style="color: red;font-size: 14px;line-height: 18px;margin-top: 4px;display: inline-block;margin-left: 4px;">'.$input_arr['reg'].'</span>';
                                }
                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="email" class="form-control" name="email" placeholder="Your email">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <?php 
                                if(isset($input_arr['email'])){
                                    echo '<span style="color: red;font-size: 14px;line-height: 18px;margin-top: 4px;display: inline-block;margin-left: 4px;">'.$input_arr['email'].'</span>';
                                }
                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="unsername" placeholder="Username" >
                                <i class="fa fa-user"></i>
                            </span>
                            <?php 
                                if(isset($input_arr['unsername'])){
                                    echo '<span style="color: red;font-size: 14px;line-height: 18px;margin-top: 4px;display: inline-block;margin-left: 4px;">'.$input_arr['unsername'].'</span>';
                                }
                            ?>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                                <i class="fa fa-key"></i>
                            </span>
                            <?php 
                                if(isset($input_arr['password'])){
                                    echo '<span style="color: red;font-size: 14px;line-height: 18px;margin-top: 4px;display: inline-block;margin-left: 4px;">'.$input_arr['password'].'</span>';
                                }
                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="phone" placeholder="Phone Number" pattern="01[1|5|6|7|8|9][0-9]{8}">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php 
                                if(isset($input_arr['phone'])){
                                    echo '<span style="color: red;font-size: 14px;line-height: 18px;margin-top: 4px;display: inline-block;margin-left: 4px;">'.$input_arr['phone'].'</span>';
                                }
                            ?>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Register" class="btn btn-primary btn-block" name="submit_btn">
                        </div>
                        <div class="form-group text-center">
                            Have an account?, <a href="sign-in.php">Sign In</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    </div>
</div>
<!--BASIC scripts-->
<!-- ========================================================= -->
<script src="../assets/vendor/jquery/jquery-1.12.3.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/vendor/nano-scroller/nano-scroller.js"></script>
<!--TEMPLATE scripts-->
<!-- ========================================================= -->
<script src="../assets/javascripts/template-script.min.js"></script>
<script src="../assets/javascripts/template-init.min.js"></script>
<!-- SECTION script and examples-->
<!-- ========================================================= -->
</body>
</html>
