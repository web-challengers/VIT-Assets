<?php
session_start();
if (!isset($_SESSION['iid'])) {
    echo "Hello";
    header("Location: ./supplier_login.php");
}

?>
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="table.css">
    <style>
        li {
            float: left;
        }

        li a,
        .dropbtn {
            display: inline-block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }


        li.dropdown {
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown-content a:hover {
            background-color: #bdd4e4;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
</head>

<body>



    <section>

        <div class="main-row">

            <div class="col-2 sec-1 ">

                <div class="div-img">
                    <img src="logo.png" width="160px">
                </div>

                <div class="link">
                    <h3 class="link-text">
                        <a href="./supplier_pending_order.php">
                            Pending &nbsp; Orders
                        </a>
                    </h3>
                </div>

                <div class="link">
                    <h3 class="link-text">
                        <a href="./supplier_completed_order.php">
                            Completed &nbsp; Orders
                        </a>
                    </h3>
                </div>

                <!-- <div class="link"><h3 class="link-text">
                            <a href="#">
                            Orders
                        </a>
                        </h3> </div>
                            
                        <div class="link"><h3 class="link-text">
                            <a href="#">
                            Suppliers
                        </a>
                        </h3> 
                        </div>  -->
            </div>

            <div class=" col-10 sec-2">
                <nav>
                    <h1 class="logo">
                        <a href="./supplier_home.php"> VIT-Assets </a>
                    </h1>


                    <ul class="links">
                        <li class="link-text">
                            <a href="./abt_us.html" class="nav-link">
                                About Us
                            </a>
                        </li>

                        <li class="link-text dropdown">
                            <!-- <a href="" class="nav-link">
                                            Logout
                                        </a> -->
                            <div style="display: flex;"><a href="javascript:void(0)" class="dropbtn nav-link">
                                    <?php echo explode(' ', $_SESSION['iname'])[0] ?>
                                </a> <img src="profile.svg" width="25" style="margin-left: -10px;"></div>
                            <div class="dropdown-content">
                                <a href="./logout.php">Logout</a>
                            </div>
                        </li>

                    </ul>
                </nav>
                <table id="customers">
                    <tr>
                        <th style="text-align:center; padding: 20px;">Sr. No.</th>
                        <th style="text-align:center; padding: 20px;">Order ID</th>
                        <th style="text-align:center; padding: 20px;">Product</th>
                        <th style="text-align:center; padding: 20px;">Date</th>
                        <th style="text-align:center; padding: 20px;">Item &nbsp; Count</th>
                        <th style="text-align:center; padding: 20px;">Amount</th>
                        <!-- <th style="text-align:center; padding: 20px;">Update</th> -->
                        <!-- <th style="text-align:center; padding: 20px;">Delete</th> -->
                    </tr>
                    <?php
                    $i = 0;
                    $conn = mysqli_connect('localhost', 'root', '', 'college_inv')
                        or die('Connection Issue');
                    $id = $_SESSION['iid'];
                    if (isset($_GET['search'])) {
                        $src = $_GET['search'];
                        $res = mysqli_query($conn, "select * from orders WHERE sup_name LIKE '%$src%'sup_id=$id AND and status='1'");
                    } else {
                        $res = mysqli_query($conn, "select * from orders where sup_id=$id AND  status='1'");
                    }


                    while ($data = mysqli_fetch_assoc($res)) {
                        // $sup_id = $data["sup_id"];
                        $prod_id = $data["prod_id"];
                        $sqli = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * from products where prod_id = '$prod_id'"));
                        ?>
                        <tr>
                            <td>
                                <?php echo ++$i; ?>
                            </td>
                            <td>VIT
                                <?php echo $data['order_id'] ?>
                            </td>
                            <td>
                                <?php echo $sqli['prod_name']; ?>
                            </td>
                            <td>
                                <?php echo $data['order_date'] ?>
                            </td>
                            <td>
                                <?php echo $data['order_count'] ?>
                            </td>
                            <td>
                                <?php echo $data['amount'] ?>
                            </td>

                        </tr>

                        <?php
                    }
                    ?>
                </table>

            </div>
        </div>
    </section>
    <script src="./forms.js"></script>
</body>

</html>