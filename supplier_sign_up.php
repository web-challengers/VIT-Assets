<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VITAccess</title>
    <link rel="stylesheet" href="login.css">
    <script src="validation.js"></script>
</head>
<body>
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
            <!-- <li>
                <a href="">
                    Signup
                </a>
            </li> -->
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
            <!-- <li>
                <a href="">
                    Signup
                </a>
            </li> -->
        </ul>
    </nav>
    <main>
        <div id="login-container">
            <div class="left">
                Photo
            </div>
            <div class="right">
                <form class="signup-form" autocomplete="off" action="">
                    <h2>Supplier Signup</h2>
                    
                    <div >
                        <input  type="text" name="name" id="name" placeholder="Firstname  Lastname" onkeyup ="null_textfield('name')" class="form-control" required>
                        <div id="div_name" class="alldiv"  style="font-size:x-small; font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; margin: 2% 0 -2% 2%;  "></div>                      
                    </div>
                    
                    <div>
                        <input type="email" name="email" id="email" placeholder="Email" onkeyup ="null_textfield('email')" class="form-control" required>
                        <div id="div_email" class="alldiv"  style="font-size:x-small; font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; margin: 2% 0 -2% 2%;  "></div>                      
                    </div>
                    
                    <div>
                        <input type="tel" name="phone" id="phone" placeholder="Phone No." onkeyup ="null_textfield('phone')" class="form-control" required>
                        <div id="div_phone" class="alldiv"  style="font-size:x-small; font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; margin: 2% 0 -2% 2%;"></div>
                    </div>

                    <input type="password" name="password" id="password" placeholder="Password" required>
                    <input type="password" name="confirm password" id="password" placeholder="Confirm Password" required>
                    
                    <button class="signup-btn form-group form-control" onclick="submit_fun()">Login</button>
                    
                </form>
            </div>
        </div>
    </main>
    <script src="./navbar.js"></script>
</body>
</html>