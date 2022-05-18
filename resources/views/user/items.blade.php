@extends('includes.master')

@section('title')
    Items
@endsection

@section('style')
    <link rel="stylesheet" href="css/user/items.css" />
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/> --}}
    <script src="https://kit.fontawesome.com/0b7794023b.js" crossorigin="anonymous"></script>
@endsection

@section('content')



    <div class="row">

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="color: red">{{$error}}</li>
                @endforeach
            </ul>
        @endif

        @if (session()->has('success'))
            <div style="color: green">{{session()->get('success')}}</div>
        @endif
        @if (session()->has('fail'))
            <div style="color: red">{{session()->get('fail')}}</div>
        @endif

    </div>
    
    <!------------------------------------------products--------------------------------------------->

    <div class="products">
        <div class="containerr1212">
            <h1 class="lg-title">Ghyari You will find what you need!!</h1>
            
            <div class="product-items">
                @foreach ($items as $item)
                    <div class="product">
                        <div class="product-content">
                            <div class="product-img">
                                <img src="image/{{$item->image }}" alt="product image" />
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

                        <div class="product-info">
                            <div class="product-info-top">
                                <h2 class="sm-title">Dodge</h2>
                                <div class="rating">
                                    <span><i class="fas fa-star"></i></span>

                                    <span>4.7(21)</span>
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


@endsection  {{-- End content --}}

@section('scripts')
    
@endsection
