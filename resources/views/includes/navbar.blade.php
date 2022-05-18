@section('navbar-style')
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
@show
@section('navbar')
    {{-- <nav>
        <a href="loggedin" class="logo">
            <img src="image/ghyari.png"/>
        </a>
        <!--------menu-->
        <ul class="menu" id="centermenu">
            <li><a href="{{route('showLoggedin')}}">Home</a></li>
            <li><a href="#">Order</a></li>
            <li><a href="{{route('showItems')}}">Items</a></li>
            <li><a href="#">account</a></li>
            <li><a href="{{route('showCart')}}">Cart</a></li> 
            <li><a href="{{route('showWish')}}">Wish</a></li> 
            <li><a href="{{route('showRemindMe')}}">RemindME</a></li> 
        </ul>
        <!----------search-->
        
        <div class="search">
            <form action="{{route('search')}}" method="post">
                @csrf
                <input type="text" placeholder="Search" name="search"/>
            </form>
            <i class="fa fa-search icons"></i>
        </div>
        <!---login---------->
        <ul class="menu" id="loginmenu">
            <li id="login" class="show-btn"><a href="{{route('logout')}}">logout</a></li>
        </ul>
        
    </nav> --}}
    <nav>
        <a href="loggedin" class="logo">
            <img src="image/ghyari.png"/>
        </a>
        <ul class="menu" id="centermenu">
            <li><a href="{{route('showLoggedin')}}">Home</a></li>
            <li><a href="#">Order</a></li>
            {{-- <li><a href="{{route('showItems')}}">Items</a></li> --}}
            <li>
                <div class="dropdown">
                    <ul class="dropbtn">
                        Items
                        <i class="fa fa-caret-down"></i>
                    </ul>
                    <ui class="dropdown-content">
                        <a href="{{route('showItems')}}">All Items</a>
                        <a href="#">rims</a>
                        <a href="#">oils and filters</a>
                        <a href="#">engine parts</a>
                    </ui>
                </div>
            </li>
            <li><a href="{{route('showCart')}}">Cart</a></li> 
            <li><a href="{{route('showWish')}}">Wishlist</a></li> 
        </ul>
        <div class="search">
            <form action="{{route('search')}}" method="post">
                @csrf
                <input type="text" placeholder="Search" name="search"/>
            </form>
            <i class="fa fa-search icons"></i>
        </div>
    
        <ul class="menu" id="centermenu">
            <li>
                <div class="dropdown">
                    <ul class="dropbtn">
                        {{session()->get('loginName')}}
                        <i class="fa fa-caret-down"></i>
                    </ul>
                    <ui class="dropdown-content">
                        <a href="#">Account</a>
                        <a href="{{route('showRemindMe')}}">RemindME</a>
                        <a href="#">Link 3</a>
                        <a href="{{route('logout')}}" class="logout">logout</a>
                    </ui>
                </div>
            </li>
        </ul>
    </nav>
    

    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col-1">
                    <h3>Our Number</h3>
                    <p>096653897414</p>
                </div>
                <div class="footer-col-2">
                    <img src="image/ghyari.png" width="100px">
                    <p>Ghyari is your choice</p>
                </div>
                <div class="footer-col-2">
                    <h3>Useful links</h3>
                    <ul>
                        <li>wcev</li>
                        <li>veifjkf</li>
                        <li>vres</li>
                        <li>vbgrsvg</li>
                    </ul>
                </div>
    
                <div class="footer-col-2">
                    <h3>Follow us</h3>
                    <ul>
                        <li>Istagram</li>
                        <li>FaceBook</li>
                        <li>Twitter</li>
                        <li>SnapChat</li>
                    </ul>
                </div>
                
            </div>
            <hr>
            <p class="copyright">CopyRight</p>
        </div>
    </div>

@show
