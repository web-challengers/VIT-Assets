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
        <link rel="stylesheet" href="table.css">

        <style>
          
            li {
              float: left;
            }
            
            li a, .dropbtn {
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
              box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
              z-index: 1;
            }
            
            .dropdown-content a {
              color: black;
              padding: 12px 16px;
              text-decoration: none;
              display: block;
              text-align: left;
            }
            
            .dropdown-content a:hover {background-color: #bdd4e4;}
            
            .dropdown:hover .dropdown-content {
              display: block;
            }
            </style>


    </head>
    <body>

        <div id="order-form">
            <button class="close" id="close">
                X
            </button>
            <form action="" class="form">

                <input type="text" class="input-type" name="supplier_name" id="supplier_name" placeholder="Supplier Name" >
                <input type="text" class="input-type" name="password" id="password" placeholder="Password">
                <input type="text" class="input-type"  name="update_id" id="update_id" placeholder="Supplier_id">
                <button  style="background-color: rgba(240, 255, 255, 0);">
                    <img src="change.svg" width="23"/>
                </button>
               
                <button class="submit-btn">
                    Update
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
                            Pending  &nbsp; Orders
                        </a>
                        </h3> </div>
                            
                        <div class="link"><h3 class="link-text">
                            <a href="#">
                            Completed &nbsp;  Orders
                        </a>
                        </h3> </div>
                            
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
                                    VIT-Assets
                                </h1>


                                <ul class="links">
                                    <li class="link-text">
                                        <a href="" class="nav-link">
                                            About Us
                                        </a>
                                    </li>

                                    <li class="link-text dropdown">
                                        <!-- <a href="" class="nav-link">
                                            Logout
                                        </a> -->
                                             <div style="display: flex;"><a href="javascript:void(0)" class="dropbtn nav-link">Rakzz23</a> <img src="profile.svg" width="25" style="margin-left: -10px;" ></div>
                                            <div class="dropdown-content">
                                              <a href="#" class="add" id="addBtn">Settings</a>
                                              <a href="#">Logout</a>
                                            </div>
                                    </li>

                                </ul>
                            </nav>

                            <div class="dashboard">
                                <a href="" class="card">
                                        <h1 class="number-dash">
                                            3
                                        </h1>
                                        <h2 class="name-dash" style="margin-top: 1rem;">
                                            Pending Orders
                                        </h2>
                                </a>

                                <a href="" class="card">
                                    <h1 class="number-dash">
                                        13
                                    </h1>
                                    <h2 class="name-dash" style="margin-top: 1rem;">
                                        Completed Orders
                                    </h2>
                            </a>

                            <a href="" class="card">
                                <h1 class="number-dash">
                                    Rs. 106231 
                                </h1>
                                <h2 class="name-dash" style="margin-top: 1rem;">
                                    Ammount Earned
                                </h2>
                        </a>

                        <a href="" class="card">
                            <h1 class="number-dash">
                                23-12-23
                            </h1>
                            <h2 class="name-dash" style="margin-top: 1rem;"> 
                                ID expiry date
                            </h2>
                    </a>
                            </div>
                    </div>
                </div>
            </section>
            <script src="./forms.js"></script>
    </body>
</html>