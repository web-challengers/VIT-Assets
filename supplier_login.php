<?php
session_start();

if (isset($_SESSION['iname'])) {
    header("Location: ./supplier_home.php");
} else {
    if (isset($_POST['password'])) {
        $conn = mysqli_connect('localhost', 'root', '', 'college_inv');
        // $sup_id = $_SESSION['']
        $name = $_POST['email'];
        $password = $_POST['password'];
        $result = mysqli_query($conn, "SELECT * FROM supplier WHERE sup_name='$name'");
        $data = mysqli_fetch_assoc($result);
        if ($_POST['password'] == $data['password'] && $name == $data['sup_name']) {
            if ($data['status'] == 0 || $data['status'] == '0') {
                header("Location: ./supplier_login.php?error=Not Approved!");
                die('DOne');
            }

            $_SESSION['iname'] = $_POST['email'];
            $_SESSION['iid'] = $data['sup_id'];
            print_r($data);
            header("Location: ./supplier_home.php");
        } else {
            header("Location: ./supplier_login.php?error=Incorrect Credentials!");
        }
    } else {
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
            if (isset($_GET['error'])) {
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
                    <a href="./supplier_home.php"> VIT-Assets </a>
                    </h1>
                </a>
                <ul id="links">
                    <li>
                        <a href="./abt_us.html">
                            About Us
                        </a>
                    </li>
                    <!-- <li>
                <a href="">
                    Login
                </a>
            </li> -->
                    <li>
                        <a href="./sup_signup_back.php">
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
                        <a href="./abt_us.html">
                            About Us
                        </a>
                    </li>
                    <!-- <li>
                <a href="">
                    Login
                </a>
            </li> -->
                    <li>
                        <a href="./sup_signup_back.php">
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
                        <form class="signup-form" autocomplete="off" action="./supplier_login.php" method="post">
                            <h2>Supplier Login</h2>
                            <!-- <input type="text" name="name" id="name" placeholder="Enter Your Name"> -->
                            <input type="name" name="email" id="email" placeholder="Email / Supplier-id">
                            <input type="password" name="password" id="password" placeholder="Password">
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