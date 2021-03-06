@extends('includes.home')

@section('title')
    Home
@endsection

@section('style')
    <link rel="stylesheet" href="css/user/loggedin.css">
    <script src="https://kit.fontawesome.com/0b7794023b.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,700;1,600&display=swap" rel="stylesheet">
@endsection

@section('content')

    <div class="home-container">
        <div class="small-container">
            <div class="col-2">
                <h1>What your car needs!</h1>
                <p> Ghyari <br /> is my choice</p>
                <a href="{{route('showItems')}}" class="btn">Explore Now &#8594; </a>
            </div>
        </div>
        <div class="col-2">
            <img src="image/photo.png" alt="" />
        </div>
    </div>

    <!-----------------featured categories-----------  -->
    <div class="outer-container">
        <div class="containerr1212">
            <h2 class="title">Companies</h2>
            <div class="product-items">
                {{-- @foreach ($collection as $item) --}}
                    <div class="product">
                        <div class="col-4">
                            <form id="Dodge" action="{{route('search')}}" method="post">
                                @csrf
                                <input type="hidden" name="search" value="Dodge">
                                <img src="../image/Dodge.png" href="javascript:{}" onclick="document.getElementById('Dodge').submit();"/>
                                {{-- <a href="javascript:{}" >Chevorlet</a> --}}
                            </form>
                        </div>
                    </div>
                    <div class="product">
                        <div class="col-4">
                            <form id="Ford" action="{{route('search')}}" method="post">
                                @csrf
                                <input type="hidden" name="search" value="Ford">
                                <img src="../image/Ford.png" href="javascript:{}" onclick="document.getElementById('Ford').submit();"/>
                                {{-- <a href="javascript:{}" >Chevorlet</a> --}}
                            </form>
                        </div>
                    </div>
                    <div class="product">
                        <div class="col-4">
                            <form id="Toyota" action="{{route('search')}}" method="post">
                                @csrf
                                <input type="hidden" name="search" value="Toyota">
                                <img src="../image/Toyota.png" href="javascript:{}" onclick="document.getElementById('Toyota').submit();"/>
                                {{-- <a href="javascript:{}" >Chevorlet</a> --}}
                            </form>
                        </div>
                    </div>
                    <div class="product">
                        <div class="col-4">
                            <form id="Chevrolet" action="{{route('search')}}" method="post">
                                @csrf
                                <input type="hidden" name="search" value="Chevrolet">
                                <img src="../image/Chevrolet.png" href="javascript:{}" onclick="document.getElementById('Chevrolet').submit();"/>
                                {{-- <a href="javascript:{}" >Chevorlet</a> --}}
                            </form>
                        </div>
                    </div>
                {{-- @endforeach --}}
            </div>
            <h2 class="title">Featured products</h2>
            <div class="product-items">
                @foreach ($Featured  as $item)
                    <div class="product">
                        <a href="/itemPage/{{$item->id}}">
                            <div class="product-content">
                                <div class="product-img">
                                    <img src="image/{{$item->image }}" alt="product image"/>
                                </div>
                                <div class="product-btns">
                                    <form action="{{route('addToCart')}}" method="post" class="">
                                        @csrf
                                        <input type="hidden" name="item_id" value="{{$item->id }}">
                                        <button type="submit" class="btn-cart">
                                            add to cart
                                            <span><i class="fas fa-shopping-cart"></i></span>
                                        </button>
                                    </form>
                                    <form action="{{route('addToWish')}}" method="post" class="">
                                        @csrf
                                        <input type="hidden" name="item_id" value="{{$item->id }}">
                                        <button type="submit" class="btn-buy">
                                            wishlist
                                            <span><i class="fa fa-heart"></i></span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </a>
                        <div class="product-info">
                            <div class="product-info-top">
                                <h2 class="sm-title">{{$item->company_name }}</h2>
                                <div class="rating">
                                    <span><i class="fas fa-star" style="color: #ffc107"></i></span>
                                    <span>{{$item->rate }}</span>
                                </div>
                            </div>
                            <a href="/itemPage/{{$item->id}}" class="product-name">{{$item->name }}</a>
                            <p class="product-price">${{$item->price }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <h2 class="title">Latest products</h2>
            <div class="product-items">
                @foreach ($Latest as $item)
                    <div class="product">
                        <a href="/itemPage/{{$item->id}}">
                            <div class="product-content">
                                <div class="product-img">
                                    <img src="image/{{$item->image}}" alt="product image"/>
                                </div>
                                <div class="product-btns">
                                    <form action="{{route('addToCart')}}" method="post" class="">
                                        @csrf
                                        <input type="hidden" name="item_id" value="{{$item->id }}">
                                        <button type="submit" class="btn-cart">
                                            add to cart
                                            <span><i class="fas fa-shopping-cart"></i></span>
                                        </button>
                                    </form>
                                    <form action="{{route('addToWish')}}" method="post" class="">
                                        @csrf
                                        <input type="hidden" name="item_id" value="{{$item->id }}">
                                        <button type="submit" class="btn-buy">
                                            wishlist
                                            <span><i class="fa fa-heart"></i></span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </a>
                        <div class="product-info">
                            <div class="product-info-top">
                                <h2 class="sm-title">{{$item->company_name }}</h2>
                                <div class="rating">
                                    <span><i class="fas fa-star" style="color: #ffc107"></i></span>
                                    <span>{{$item->rate }}</span>
                                </div>
                            </div>
                            <a href="/itemPage/{{$item->id}}" class="product-name">{{$item->name }}</a>
                            <p class="product-price">${{$item->price }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="home-container">
        <div class="small-container">
            <div class="row">
                <div class="col-2">
                    <img src="image/{{$HighestRated->image ?? ''}}" class="offer-image" />
                </div>
                <div class="col-2">
                    <h1>Highest rated item</h1>
                    <h5>
                        <br />
                        Based on Ghyari's users rating we recommend this item
                        <div class="home-rating">
                            <span><i class="fas fa-star" style="color: #dede2b;"></i></span>
                            <span>{{$HighestRated->rate ?? ""}}</span>
                        </div>
                    </h5>
                    <br />
                    <a href="/itemPage/{{$HighestRated->id ?? ''}}" class="btn">Buy Now &#8594; </a>
                </div>
            </div>
        </div>
    </div>


@endsection {{-- End content --}}

@section('scripts')
    
@endsection