@section('navbar-style')
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
@show
@section('navbar')

    <nav>
        <a href="loggedin" class="logo">
            <img src="{{ asset('image/ghyari.png')}}"/>
        </a>
        <ul class="menu" id="centermenu">
            <li><a href="{{route('showHome')}}">Home</a></li>
            
            <li>
                <div class="dropdown">
                    <ul class="dropbtn">
                        Companies
                        <i class="fa fa-caret-down"></i>
                    </ul>
                    <ui class="dropdown-content">
                        <form id="Chevorlet" action="{{route('search')}}" method="post">
                            @csrf
                            <input type="hidden" name="search" value="Chevorlet">
                            <a href="javascript:{}" onclick="document.getElementById('Chevorlet').submit();">Chevorlet</a>
                        </form>
                        <form id="Dodge" action="{{route('search')}}" method="post">
                            @csrf
                            <input type="hidden" name="search" value="Dodge">
                            <a href="javascript:{}" onclick="document.getElementById('Dodge').submit();">Dodge</a>
                        </form>
                        <form id="Ford" action="{{route('search')}}" method="post">
                            @csrf
                            <input type="hidden" name="search" value="Ford">
                            <a href="javascript:{}" onclick="document.getElementById('Ford').submit();">Ford</a>
                        </form>
                        <form id="Toyota" action="{{route('search')}}" method="post">
                            @csrf
                            <input type="hidden" name="search" value="Toyota">
                            <a href="javascript:{}" onclick="document.getElementById('Toyota').submit();">Chevorlet</a>
                        </form>
                    </ui>
                </div>
            </li>
            <li>
                <div class="dropdown">
                    <ul class="dropbtn">
                        Items
                        <i class="fa fa-caret-down"></i>
                    </ul>
                    <ui class="dropdown-content">
                        <a href="{{route('showItems')}}">All Items</a>
                        <form id="Engine_parts" action="{{route('search')}}" method="post">
                            @csrf
                            <input type="hidden" name="search" value="Engine parts">
                            <a href="javascript:{}" onclick="document.getElementById('Engine_parts').submit();">Engine parts</a>
                        </form>
                        <form id="Brakes" action="{{route('search')}}" method="post">
                            @csrf
                            <input type="hidden" name="search" value="Brakes">
                            <a href="javascript:{}" onclick="document.getElementById('Brakes').submit();">Brakes</a>
                        </form>
                        <form id="Suspensions" action="{{route('search')}}" method="post">
                            @csrf
                            <input type="hidden" name="search" value="Suspensions">
                            <a href="javascript:{}" onclick="document.getElementById('Suspensions').submit();">Suspensions</a>
                        </form>
                        <form id="Body_parts" action="{{route('search')}}" method="post">
                            @csrf
                            <input type="hidden" name="search" value="Body parts">
                            <a href="javascript:{}" onclick="document.getElementById('Body_parts').submit();">Body parts</a>
                        </form>
                        <form id="Oils_and_Filters" action="{{route('search')}}" method="post">
                            @csrf
                            <input type="hidden" name="search" value="Oils and Filters">
                            <a href="javascript:{}" onclick="document.getElementById('Oils_and_Filters').submit();">Oils and Filters</a>
                        </form>
                        <form id="Lighting" action="{{route('search')}}" method="post">
                            @csrf
                            <input type="hidden" name="search" value="Lighting">
                            <a href="javascript:{}" onclick="document.getElementById('Lighting').submit();">Lighting</a>
                        </form>
                        <form id="Cooling_system" action="{{route('search')}}" method="post">
                            @csrf
                            <input type="hidden" name="search" value="Cooling system">
                            <a href="javascript:{}" onclick="document.getElementById('Cooling_system').submit();">Cooling system</a>
                        </form>
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
    
        <ul class="menu" id="loginmenu">
            <li><a href="{{route('showLogin')}}">Login</a></li> 
        </ul>
    </nav>
    

    <div class="footer">
        <div class="containerfooter">
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
                        <li>Home</li>
                        <li>Items</li>
                        <li>Companies</li>
                        <li>wishlist</li>
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
