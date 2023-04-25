<?php
session_start();
if (!isset($_SESSION['name'])) {
    header("Location: ./login.php");
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
    <div id="order-form">
        <button class="close" id="close">
            X
        </button>
        <form action="./insertOrder.php" method="post" class="form">
            <select name="prod_id" id="" class="input-type">
                <?php
                $conn = mysqli_connect('localhost', 'root', '', 'college_inv');
                $res = mysqli_query($conn, "select * from products");


                while ($data = mysqli_fetch_assoc($res)) {
                    $prod_id = $data['prod_id'];
                    ?>
                    <option value="<?php echo $prod_id ?>"><?php echo $data['prod_name']; ?></option>
                    <?php
                }
                ?>
            </select>
            <input type="text" class="input-type" name="order_count" id="item_count" placeholder="Item Count">

            <button class="submit-btn">
                Add
            </button>
        </form>
    </div>

    <section>

        <div class="main-row">

            <div class="col-2 sec-1 ">

                <div class="div-img">
                    <img src="logo.png" width="160px">
                </div>

                <div class="link">
                    <h3 class="link-text">
                        <a href="./products.php">
                            Product
                        </a>
                    </h3>
                </div>

                <div class="link">
                    <h3 class="link-text">
                        <a href="./category.php">
                            Category
                        </a>
                    </h3>
                </div>

                <div class="link">
                    <h3 class="link-text">
                        <a href="./order.php">
                            Orders
                        </a>
                    </h3>
                </div>

                <div class="link">
                    <h3 class="link-text">
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

                <div class="search-bar-outer">
                    <div class="add" id="addBtn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                            class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                            <path
                                d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                        </svg>
                    </div>
                </div>

                <table id="customers">
                    <tr>
                        <th style="text-align:center; padding: 20px;">Sr. No.</th>
                        <th style="text-align:center; padding: 20px;">Product</th>
                        <th style="text-align:center; padding: 20px;">Date</th>
                        <th style="text-align:center; padding: 20px;">Item &nbsp; Count</th>
                        <th style="text-align:center; padding: 20px;">Amount</th>
                        <th style="text-align:center; padding: 20px;">Status</th>
                    </tr>
                    <?php
                    $i = 0;
                    $conn = mysqli_connect('localhost', 'root', '', 'college_inv')
                        or die('Connection Issue');

                    $res = mysqli_query($conn, 'select * from orders');


                    while ($data = mysqli_fetch_assoc($res)) {
                        $pro_id = $data["prod_id"];
                        $sqli = mysqli_query($conn, "SELECT * from products where prod_id = '$pro_id'");
                        ?>
                        <tr>
                            <td>
                                <?php echo ++$i; ?>
                            </td>
                            <td>
                                <?php echo mysqli_fetch_assoc($sqli)['prod_name']; ?>
                            </td>
                            <td>
                                <?php echo $data["order_date"]; ?>
                            </td>
                            <td>
                                <?php echo $data["order_count"]; ?>
                            </td>
                            <td>
                                <?php echo $data["amount"]; ?>
                            </td>
                            <td>
                                <?php
                                if ($data['status'] == '0') {
                                    echo "Pending";
                                } else {
                                    echo "Completed";
                                }
                                ?>
                            </td>

                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </section>
    <script>
        var forms = document.querySelector('#order-form');
        console.log(forms);
        var addBtn = document.querySelector('#addBtn');

        console.log('Hello');

        addBtn.addEventListener('click', function () {
            console.log('Hi');
            console.log(forms.style.display == 'none');
            forms.style.display = 'flex';

        })

        var closeBtn = document.querySelector('#close');

        closeBtn.addEventListener('click', function () {
            // if(forms.style.display == 'flex'){
            forms.style.display = 'none';
            // }
        })

    </script>
</body>

</html>