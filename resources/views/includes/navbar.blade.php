@section('navbar-style')
    <link rel="stylesheet" href="css/navbar.css">
@show
@section('navbar')
    <nav>
        <a href="loggedin" class="logo">
            <img src="image/ghyari.jpeg"/>
        </a>
        <!--------menu-->
        <ul class="menu" id="centermenu">
            <li><a href="loggedin">Home</a></li>
            <li><a href="#">Order</a></li>
            <li><a href="#">Items</a></li>
            <li><a href="#">account</a></li>
            <li><a href="#">Cart</a></li> 
        </ul>
        <!----------search-->
        
        <div class="search">
            <form action="#" method="post">
                @csrf
                <input type="text" placeholder="Search" name="search"/>
            </form>
            <i class="fa fa-search icons"></i>
        </div>
        <!---login---------->
        <ul class="menu" id="loginmenu">
            <li id="login" class="show-btn"><a href="logout">logout</a></li>
        </ul>
        
    </nav>
@show
