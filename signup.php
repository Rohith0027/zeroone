<?php
session_start();
include_once 'db.php';
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$password = md5($_POST['pass']);
$cpassword = md5($_POST['cpass']);
$Role = 'user';
$verification_status = '0';

if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password) && !empty($cpassword)){
    if(filter_var($email,FILTER_VALIDATE_EMAIL)){
        $sql = mysqli_query($conn,"SELECT email FROM users WHERE email = '{$email}'");
        if(mysqli_num_rows($sql)>0){
            echo "$email ~ Already Exists";
        }
        else{
            if($password == $cpassword){
                $random_id = rand(time(),10000000);
                $otp = mt_rand(1111,9999);
                $sql2 = mysqli_query($conn,"INSERT INTO users (unique_id, fname, lname, email, password, otp, verification_status, Role)
                VALUES ({$random_id},'{$fname}','{$lname}','{$email}','{$password}','{$otp}','{$verification_status}','{$Role}')");
                if($sql2){
                    $sql3 = mysqli_query($conn , "SELECT * FROM users WHERE email = '{$email}'");
                    if(mysqli_num_rows($sql3)>0){
                        $row = mysqli_fetch_assoc($sql3);
                        $_SESSION['unique_id'] = $row['unique_id'];
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['otp'] = $row['otp'];


                        if($otp){
                            $receiver = $email;
                            $subject = "From: $fname $lname <$email>";
                            $body = "Name "."$fname $lname \n Email "." $email \n "."$otp";
                            $sender = "From:system.log9@gmail.com";
                            if (mail($receiver,$subject,$body,$sender)){
                                echo "success";
                            }
                            else{
                                echo "Email Problem!" . mysqli_error($conn);

                            }
                        }
                        else{
                            echo "Otp Sending Failed Try Again!";
                        }
                    }
                }
                else{
                    echo "Somethings Went Wrong!";
                }
            }
            else{
                echo "Password Does Not Match";
            }
        }
    }
    else{
        echo "$email ~ This is not a Valid Email";
    }
}
else{
    echo "All Input Fields are Required";
}
?>