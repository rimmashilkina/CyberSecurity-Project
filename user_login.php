<?php
//configure timeout for 1 minute (60 seconds)
$timeout = 60;

// Set the maxlifetime of session
ini_set( "session.gc_maxlifetime", $timeout );

// Also set the session cookie timeout
ini_set( "session.cookie_lifetime", $timeout );

session_start();

// Update the timeout of session cookie
$sessionName = session_name();

if( isset( $_COOKIE[ $sessionName ] ) ) {
	setcookie( $sessionName, $_COOKIE[ $sessionName ], time() + $timeout, '/' );}

if(isset($_SESSION['user_login']))
    header('location:user_page.php');

?>

    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>User Login</title>
    </head>
    <div class='content'>
        <div class="user_login">
            <form action='' method='POST'>
                <table align="center">
                    <tr><td><span class="caption">User Login</span></td></tr>
                    <tr><td colspan="2"><hr></td></tr>
                    <tr><td>Username:</td></tr>
                    <tr><td><input type="text" name="uname" required></td></tr>
                    <tr><td>Password:</td></tr>
                    <tr><td><input type="password" name="pwd" required></td></tr>
                    <tr><td class="button1"><input type="submit" name="submitBtn" value="Log In" class="button"></td></tr>
                </table>
            </form>
        </div>
    </div>

<?php

if(!isset($_SESSION['user_login']))
{
    if(isset($_REQUEST['submitBtn'])){
        require './no_access/_secret.php';

        $username=$_REQUEST['uname'];
        $sql1="SELECT Username, Password, Salt FROM mydb.User WHERE Username='$username'";
        foreach ($db->query($sql1) as $row) {
            $uname_ret = $row['Username'];
            $pass_ret = $row['Password'];
            $salt_ret = $row['Salt'] ;
        }

        //salting of password
        $password= $_REQUEST['pwd'];
        $password= hash('sha256', $password.$salt_ret);


        if ($_POST["submitBtn"])
        {
            if(!$username || !$password)
            {
                echo "You have not entered all the required fields.<br />";
                echo "Please go back and try again.";
                exit();
            }
            else{
                if($username==$uname_ret && $password==$pass_ret) {

                    $_SESSION['user_login']=1;
                    header('location:user_page.php'); }
                else
                    header('location:user_login.php');
            }
        }
        else {
            header('location:user_page.php');
        }
    }
}
?>
