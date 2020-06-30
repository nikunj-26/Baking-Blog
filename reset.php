<?php
    include_once("includes/db.php");
    include_once("admin/functions.php");
    $title = "Reset Password"; 
    ?>
    
    <?php
if(!isset($_GET['token']) || !isset($_GET['email'])){
    header("Location: index.php");
}else{
    $token = $_GET['token'];
    $email = $_GET['email'];
    $query = "SELECT * FROM users WHERE token='$token'";
    $updatePasswordUser = mysqli_query($connection, $query);
    if(mysqli_num_rows($updatePasswordUser) ==0){
        header("Location: index.php");
    }
}
    if(isset($_POST['submit'])){
        echo "click";
        if(!empty($_POST['password']) && !empty($_POST['password2'])){
            $password = $_POST['password'];
            $password2 = $_POST['password2'];
            if($password === $password2){
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                
                $query = "UPDATE users SET token='', user_password='$hashedPassword' WHERE token='$token' and user_email='$email'";
                $updatePassword = mysqli_query($connection, $query);
                confirmQuery($updatePassword);
                echo "Password Changed Successfully!";
                echo "Please Login and Verify";
            }
            else{
                echo "Both Password DO NOT MATCH!";
            
            }
        }
    }
?>        
    <html>
    <?php include_once("includes/header.php"); ?>
    <body>
       <?php include_once("includes/navigation.php"); ?>
       <div class="container">
           <div class="row">
               <div class="col-md-4 col-md-offset-4">
                   <div class="panel panel-default">
                       <div class="panel-body">
                           <div class="text-center">
                               <h3><i class="fa fa-lock fa-4x"></i></h3>
                               <h2 class="text-center">Forgot Password?</h2>
                               <p>Reset Password</p>
                               <div class="panel-body">
                                   <form action="" method="post" role="from" id="forgot-password">
                                      
                                       <div class="form-group">
                                           <div class="input-group">
                                               <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                               <input class="form-control" type="password" id="password" name="password" placeholder="Enter New Password">
                                           </div>
                                       </div>
                                       
                                       
                                       <div class="form-group">
                                           <div class="input-group">
                                               <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                               <input class="form-control" type="password" id="password2" name="password2" placeholder="Confirm Password">
                                           </div>
                                       </div>

                                       
                                       <div class="form-group">
                                           <input type="submit" class="btn btn-lg btn-primary btn-block" name="submit" >
                                       </div>
                                   </form>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
        
    </body>
</html>