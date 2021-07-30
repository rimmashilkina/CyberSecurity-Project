<?php
session_start();
if(!isset($_SESSION['user_login']))
    header('location:user_login.php');
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Users</title>
    </head>

<?php
/*

 require('./no_access/_secret.php');

//reading user list
echo "<h2>Users</h2>";
echo "<table>";
echo ("<tr>
        <th>Username</th>
        <th>Password</th>
        <th>Salt</th>
        </tr>");
forEach($db->query('SELECT Username, Password, Salt FROM mydb.User;') as $row ){
    echo "<tr>";
    echo "<td>" . $row['Username'] . "</td>";
    echo "<td>" . $row['Password'] . "</td>";
    echo "<td>" . $row['Salt'] . "</td>";;
    echo "</tr>";
}
echo "</table>";
*/
echo "<h2>You are successfully authenticated</h2>";
//$_SESSION['user_login']=0;
?>