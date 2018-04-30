<?php
include("connect.php");
include("Functions.php");
$output="";

if(Logged_in()==true)
{// when the user is logged in,it will be redirected to view.php
    header("location:View.php");
    //this meas it will not execute any script below that
    exit();
}

if(isset($_POST['Login']))
{
    
    $email=$_POST['email'];
    $password=$_POST['pass'];
    $check=isset($_POST['remember']);

    if(email_exists($email,$dbc))
    {
    //we need to sign the user it
    $result= mysqli_query($dbc,"SELECT password FROM user WHERE email='$email'");
    $getpassword= mysqli_fetch_assoc($result);
    if(md5($password) !== $getpassword['password'])
    {
      $output=" Password Incorrect";
    }
    else
    {
    $_SESSION['email']=$email;
    if($check==on)
    {
        setcookie("email",$email,time()+3600);
    }
    header("location:view.php");
    }
    }
    else
    {
        $output="Email Does Not Exist";
    }

}



?>




<!doctype> 

<html>
<head> <title> Login | Durban Cypher</title>
 <link rel="stylesheet" href="DCcss.css" type="text/css"/>
</head>
<body>
    <!--Navigation-->
<nav class="active">
        <ul>
            <li class="logo">
             Durban Cypher
            </li>
            <li>
            <a href="Login.php">LOGIN |</a>
            </li>
            <li>
             <a href="signup.php">SIGN UP |</a>
            </li>
            <li>
             <a href="">ABOUT US  | </a>
            </li>
            <li>
            <a href="">HOME | </a> 
            </li>
        </ul>
    </nav>
        <form id="msform" action="Login.php" method="post">
    <!-- fieldsets #1 -->
<fieldset>
        <h2 class="fs-title">LOGIN</h2>
       <h3 class="fs-subtitle">Login To Your Account</h3>
       <input type="email" name="email" placeholder="Email" />
       <input type="password" name="pass" placeholder="Password" />
       <br/>
       <input type="checkbox" name="remember"/>&nbsp;&nbsp;<label for="remember"><b>Remember Me</b></label>
       <br/><br>
      <div id="fp" class="fp"><a href="ForgotPassword.php">Forgot Password?</a></div>
       <br/>
    <input type="submit" name="Login" class="next action-button" value="Login" />
</fieldset>
        </form>
        <div><p><?php echo $output?>  </P>  </div>
    
</body>


</html>