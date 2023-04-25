    <!DOCTYPE html>
    <html>
        <head>
            <title>
                VIT-Assets
        </title>        
            <!--  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
            <link rel="stylesheet" href="home.css">
        </head>
        <body>
        <?php
                    session_start();
                    
                    if(!isset($_SESSION['name'])){
                        echo "Hello";
                        header("Location: ./login.php");
                    }

                    $conn = mysqli_connect("localhost", "root", "", "college_inv")
                    or die("Connection Error!!");

                    // Counts Of Data

                    $tables = array("products","cat","orders","supplier");
                    $counts = array();
                    foreach ($tables as $table) {
                        array_push($counts, mysqli_num_rows(mysqli_query($conn,"SELECT * FROM $table")));
                    }
            ?>
            <section>   

                    <div class="main-row">

                    <div class="col-2 sec-1 ">

                            <div class="div-img">
                                <img src="logo.png" width="160px">
                            </div>

                            <div class="link"><h3 class="link-text">
                                <a href="./products.php">
                                Products
                            </a>
                            </h3> </div>
                                
                            <div class="link"><h3 class="link-text">
                                <a href="./category.php">
                                Category
                            </a>
                            </h3> </div>
                                
                            <div class="link"><h3 class="link-text">
                                <a href="./order.php">
                                Orders
                            </a>
                            </h3> </div>
                                
                            <div class="link"><h3 class="link-text">
                                <a href="./supplier.php">
                                Suppliers
                            </a>
                            </h3> 
                        </div> 
                        </div>

                        <div class=" col-10 sec-2">
                                <nav>
                                    <h1 class="logo">
                                    <a href="./home.php"> VIT-Assets </a>
                                    </h1>


                                    <ul class="links">
                                        <li class="link-text">
                                            <a href="./abt_us.html" class="nav-link">
                                                About Us
                                            </a>
                                        </li>

                                        <li class="link-text">
                                            <a href="./logout.php" class="nav-link">
                                                Logout
                                            </a>
                                        </li>

                                    </ul>
                                </nav>

                                <div class="dashboard">
                                    <a href="" class="card">
                                            <h1 class="number-dash">
                                            <?php echo $counts[0] ?>
                                            </h1>
                                            <h2 class="name-dash">
                                                Products
                                            </h2>
                                    </a>

                                    <a href="./category.php" class="card">
                                        <h1 class="number-dash">
                                        <?php echo $counts[1] ?>
                                        </h1>
                                        <h2 class="name-dash">
                                            Categories
                                        </h2>
                                </a>

                                <a href="./order.php" class="card">
                                    <h1 class="number-dash">
                                    <?php echo $counts[2] ?>
                                    </h1>
                                    <h2 class="name-dash">
                                        Orders
                                    </h2>
                            </a>

                            <a href="./supplier.php" class="card">
                                <h1 class="number-dash">
                                <?php echo $counts[3] ?>
                                </h1>
                                <h2 class="name-dash">
                                    Suppliers
                                </h2>
                        </a>
                                </div>
                        </div>
                    </div>
                </section>
        </body>
    </html>
   
    <?php
        mysqli_close($conn);
?>