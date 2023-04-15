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

        <div id="prod-form">
            <button class="close" id="close">
                X
            </button>
            <form action="" class="form">

                <input type="text" class="input-type" name="prod_name" id="prod_name" placeholder="Product Name" >
                <input type="text" class="input-type" name="supplier_name" id="supplier_name" placeholder="Supplier Name">
                <select name="" id="" class="input-type">
                    <option value="cat">Select</option>
                    <option value="cat">Select</option>
                    <option value="cat">Select</option>
                </select>
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
                        
                        <div class="link"><h3 class="link-text">
                            <a href="#">
                            Product
                        </a>
                        </h3> </div>
                            
                        <div class="link"><h3 class="link-text">
                            <a href="#">
                            Category
                        </a>
                        </h3> </div>
                            
                        <div class="link"><h3 class="link-text">
                            <a href="#">
                            Orders
                        </a>
                        </h3> </div>
                            
                        <div class="link"><h3 class="link-text">
                            <a href="#">
                            Suppliers
                        </a>
                        </h3> 
                    </div> 
                    </div>

                    <div class=" col-10 sec-2">
                            <nav>
                                <h1 class="logo">
                                    VIT-Assets
                                </h1>


                                <ul class="links">
                                    <li class="link-text">
                                        <a href="" class="nav-link">
                                            About Us
                                        </a>
                                    </li>

                                    <li class="link-text">
                                        <a href="" class="nav-link">
                                            Logout
                                        </a>
                                    </li>

                                </ul>
                            </nav>

<div class="search-bar-outer">
    
       <div class="search-bar">
           
            <input type="text" class="search-bar-1" placeholder="Search">
            <div class="search-bar-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                  </svg>
            </div>
        </div>

        <div class="add" id="addBtn">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
              </svg>
        </div>
    </div>
                            
<table id="customers">
    <tr>
        <th style="text-align:center; padding: 20px;">Sr. No.</th>
        <th style="text-align:center; padding: 20px;">Product Name</th>
      <th style="text-align:center; padding: 20px;">Supplier</th>
      <th style="text-align:center; padding: 20px;">Category</th>
      <th style="text-align:center; padding: 20px;">Count</th>
      <th style="text-align:center; padding: 20px;">Update</th>
      <th style="text-align:center; padding: 20px;">Delete</th>
    </tr>
    <?php
        $i = 0;
        $conn = mysqli_connect('localhost', 'root', '', 'college_inv')
        or die('Connection Issue');
    
        $res = mysqli_query($conn,'select * from products');
       
    
        while($data = mysqli_fetch_assoc($res)){
            $sup_id = $data["sup_id"];
            $cat_id = $data["cat_id"];
            $sqli = mysqli_query($conn, "SELECT * from supplier where sup_id = '$sup_id'");
            $sqli2 = mysqli_query($conn, "SELECT * from category where cat_id = '$cat_id'");
            ?>
   <tr>
   
   <td><?php echo ++$i; ?></td>
 <td><?php echo $data["prod_name"]; ?></td>
 <td><?php echo mysqli_fetch_assoc($sqli)['sup_name']; ?></td>
 <td><?php echo mysqli_fetch_assoc($sqli2)['cat_name']; ?></td>
 <td><?php echo $data["prod_count"]; ?></td>
 <td class="btn-center">
   <a href=""><button class="update-btn">
       <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
           <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
         </svg>
   </button></a>
 </td class="btn-center">
 <td class="btn-center"><a href=""><button class="delete-btn">
   <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
       <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
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