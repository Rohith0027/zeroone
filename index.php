<?php


    session_start();
    include 'db.php';
    $unique_id = $_SESSION['unique_id'];
    $email = $_SESSION['email'];
    if(empty($unique_id)){
        header("Location: login.php");
    }
    $qry = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = '{$unique_id}'");
    if(mysqli_num_rows($qry) > 0){
        $row = mysqli_fetch_assoc($qry);
        if($row){
            $_SESSION['verification_status']= $row['verification_status'];
            if($row['verification_status'] != 'verified'){
                header("Location: verify.php");
            }
        }
    }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header id="header">
        <a href="" class="logo"><h1>ZEROONE</h1></a>
        <nav>
            <ul class="navigation">
                <li><a href="logout.php?logout_id=<?php echo $unique_id?>"><button class="logout_btn">Log Out</button></a></li>
            </ul>
        </nav>
    </header>
    <section>
        <h2><span>Welcome : <?php echo $email; ?></span></h2>
    </section>
    <section class="wrapper">
        <div id="stars"></div>
        <div id="stars2"></div>
        <div id="stars3"></div>
    </section>
</body>
</html>