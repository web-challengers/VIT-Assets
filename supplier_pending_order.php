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
</head>

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

<body>
    <?php
if (isset($_GET['error'])) {
        ?>
        <script>
            alert('<?php echo $_GET['error'] ?>');
        </script>
        <?php
    }
    ?>
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
                            <div style="display: flex;"><a href="javascript:void(0)"
                                    class="dropbtn nav-link">
                                    <?php
    echo explode(' ', $_SESSION['iname'])[0]
                                    ?>
                                </a> <img src="profile.svg" width="25"
                                    style="margin-left: -10px;"></div>
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
                        <th style="text-align:center; padding: 20px;">Completed?</th>
                        <th style="text-align:center; padding: 20px;">Delete</th>
                    </tr>
                    <?php
                    $i = 0;
                    $conn = mysqli_connect('localhost', 'root', '', 'college_inv')
                        or die('Connection Issue');
                    $id = $_SESSION['iid'];
                    if (isset($_GET['search'])) {
                        $src = $_GET['search'];
                        $res = mysqli_query($conn, "select * from orders WHERE sup_name LIKE '%$src%'sup_id=$id AND and status='0'");
                    } else {
                        $res = mysqli_query($conn, "select * from orders WHERE sup_id=$id AND  status='0'");
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
                            <td><?php echo $sqli['prod_name']; ?></td>
                            <td>
                                <?php echo $data['order_date'] ?>
                            </td>
                            <td>
                                <?php echo $data['order_count'] ?>
                            </td>
                            <td>
                                <?php echo $data['amount'] ?>
                            </td>
                            <td class="btn-center">
                                <a href="./completeOrder.php?id=<?php echo $data['order_id'] ?>"><button class="update-btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                                            class="bi bi-pen" viewBox="0 0 16 16">
                                            <path
                                                d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
                                        </svg>
                                    </button></a>
                            </td>
                            <td class="btn-center"><a href="./deleteOrder.php <?php echo $data['order_id'] ?>"><button class="delete-btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                                            class="bi bi-trash3" viewBox="0 0 16 16">
                                            <path
                                                d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                        </svg>
                                    </button></a></td>
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