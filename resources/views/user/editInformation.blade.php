@extends('includes.master')

@section('title')
    Edit Information
@endsection

@section('style')
    <link rel="stylesheet" href="css/user/editInformation.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
@endsection

@section('content')

    <h1 style="color: red">Hi</h1>

    <div id="mySidenav" class="sidenav">
        <p class="logo"><span>S</span>uperMarket</p>
        <a href="home.php" class="icon-a"><i class="fa fa-dashboard icons"></i> &nbsp;&nbsp;HOME</a>

        <a href="#" id="items1" class="icon-a"><i class="fa fa-shopping-bag icons"></i> &nbsp;&nbsp;items &emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <button onclick="menu1()" class="fa fa-arrow-down icons"></button></i></a>
        
        <div id="item" class="dropdown-menu">
            <a href="items.php" class="icon-a"><i class="fa fa-dashboard icons"></i> &nbsp;&nbsp;All</a>
            <a href="fruits.php" class="icon-a"><i class="fa fa-dashboard icons"></i> &nbsp;&nbsp;fruits</a>
            <a href="vegetable.php" class="icon-a"><i class="fa fa-dashboard icons"></i> &nbsp;&nbsp;vegetable</a>
            <a href="drinks.php" class="icon-a"><i class="fa fa-dashboard icons"></i> &nbsp;&nbsp;drinks</a>
        </div>
        
        <a href="addItems.php" class="icon-a"><i class="fa fa-cart-plus icons"></i> &nbsp;&nbsp;Add items</a>
        <a href="account.php" class="icon-a"><i class="fa fa-pencil icons"></i> &nbsp;&nbsp;Account</a>
        <a href="#" id="items1" class="icon-a"><i class="fa fa-check icons"></i> &nbsp;&nbsp;Orders &emsp;&emsp;&emsp;&emsp;&emsp; <button onclick="menu2()" class="fa fa-arrow-down icons"></button></i></a>
        
        <div id="order" class="dropdown-menu">
            <a href="orders.php" class="icon-a"><i class="fa fa-check icons"></i> &nbsp;&nbsp;accept</a>
            <a href="order2.php" class="icon-a"><i class="fa fa-check icons"></i> &nbsp;&nbsp;delivery</a>
            <a href="order3.php" class="icon-a"><i class="fa fa-check icons"></i> &nbsp;&nbsp;received</a>
        </div>

        <a href="logout.php" class="icon-a" id="logout"><i class="fa fa-sign-out icons"></i> &nbsp;&nbsp;LogOut</a>
    </div>
    <div id="main">

        <div class="head">
            <div class="col-div-6">
                <span style="font-size:30px;cursor:pointer; color: white;" class="nav"  >Welcome..</span>
            </div>
        </div>

        <div class="clearfix"></div>
    
        <div class="srch-msg">
            <p>  Want to search for any item? </p>
        </div>
        <div class="search">
            <form action="search.php" method="post">
                <input type="text" placeholder="Search" name="search"/>
            </form>
            <i class="fa fa-search icons"></i>
        </div>

        

    </div>
    
    <script>
        
        function menu1() {
            document.getElementById("item").classList.toggle("show");
        }
        function menu2() {
            document.getElementById("order").classList.toggle("show");
        }
        
    </script>

@endsection  {{-- End content --}}

@section('scripts')
    
@endsection
