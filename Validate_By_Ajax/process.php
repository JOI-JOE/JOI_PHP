<?php
$con = mysqli_connect("localhost", "gogab4tr_bfriendly_u", "12345", "gogab4tr_bootstrapfriendly_demo");
if (!$con) {
    echo "connection error";
}
$name = htmlspecialchars(trim($_POST['username']));
$email = htmlspecialchars(trim($_POST['email']));
$pass = htmlspecialchars(trim($_POST['password']));
//$cpass = htmlspecialchars(trim($_POST['cpassword']));
$mobile = htmlspecialchars(trim($_POST['mobile']));

if (empty($name) || empty($email) || empty($pass) || empty($mobile)) {
    echo '<div class="alert alert-success">please fill all required field</div>';
} else {
    $sql = "insert into jquery_val_table(username,email,password,mobile) values ('$name','$email','$pass','$mobile')";
    if ($res = mysqli_query($con, $sql)) {
        echo '<div class="alert alert-success">data successfully inserted</div>';
    } else {
        echo '<div class="alert alert-warning">data not inserted</div>';
    }
}
