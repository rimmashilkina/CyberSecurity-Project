<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add new user</title>
</head>
<?php
//make a connection to the database outside of the code of this page
require('./no_access/_secret.php');

//executes only is a user click Submit button at the form.
if(isset($_REQUEST['Submit'])) {

    $salt = rand(1000000000, 9999999999);
    $pwd = htmlentities($_REQUEST['pwd'], ENT_QUOTES);
    $hashpw = hash("sha256", $pwd . $salt);
    $username = htmlentities($_REQUEST['UName'], ENT_QUOTES);

    $sql1 = "INSERT INTO mydb.User (`Username`, `Password`, `Salt`) VALUES ('$username','$hashpw','$salt')";
    $db->query($sql1);
}
// Generate form for adding a user.
echo ("<form action=\"add_user.php\" method=\"POST\">");
echo "<h2> Add user </h2>";
echo "<table>";
echo "<tr>";
echo "<td>";
echo "<label for=\"UName\">Username</label>";
echo "</td>";
echo "<td>";
echo "<input type=\"text\" id=\"UName\" name=\"UName\" required>";
echo "</td>";
echo "</tr>";
echo ("<tr>
            <td>
                <label for=\"pwd\">Password</label>
            </td>
            <td>
                <input type=\"password\" id=\"pwd\" name=\"pwd\" required>
            </td>
        </tr>
        </table>");
echo ("
            <table><tr>
            <td>
                <input type=\"submit\" value=\"Add user\" name=\"Submit\">
            </td>
            <td>
                <input type=\"reset\" value=\"Clear\">
            </td>
        </tr>
        </table>
    </form>");
?>