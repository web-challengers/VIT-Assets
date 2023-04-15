<?php
    session_start();

    if(isset($_SESSION['name'])){
            header("Location: ./home.php");
    }else{
    if(isset($_POST['submit'])){
        if($_POST['password']=="Group5" && $_POST['email'] =='admin'){
            $_SESSION['name'] = $_POST['email'];
            header("Location: ./home.php");
        }else{
            header("Location: ./login.php?error=Incorrect Password!");
        }
    }
    else{
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VITAccess</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
<?php
        if(isset($_GET['error'])){
            ?>
            <script>
                alert("<?php echo $_GET['error'] ?>");
            </script>
            <?php
        }
    ?>
    <nav>
        <a href="">
            <h1 class="logo">
                VITAsset
            </h1>
        </a>
        <ul id="links">
            <li>
                <a href="">
                    About Us
                </a>
            </li>
            <li>
                <a href="">
                    Login
                </a>
            </li>
            <li>
                <a href="">
                    Signup
                </a>
            </li>
        </ul>

        <div id="lines">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>

        <ul id="mob-links">
            <li>
                <a href="">
                    About Us
                </a>
            </li>
            <li>
                <a href="">
                    Login
                </a>
            </li>
            <li>
                <a href="">
                    Signup
                </a>
            </li>
        </ul>
    </nav>
    <main>
        <div id="login-container">
            <div class="left">
                Photo
            </div>
            <div class="right">
                <form class="signup-form" autocomplete="off" action="">
                    <h2>VIT Login</h2>
                    <!-- <input type="text" name="name" id="name" placeholder="Enter Your Name"> -->
                    <input type="email" name="email" id="email" placeholder="Enter Your Email">
                    <input type="password" name="password" id="password" placeholder="Enter Your Password">
                    <!-- <input type="password" name="repassword" id="repassword" placeholder="Confirm Your Password"> -->
                    <button class="signup-btn">Login</button>

                </form>
            </div>
        </div>
    </main>
    <script src="./navbar.js"></script>
</body>
</html>

<?php
    }
}
?>