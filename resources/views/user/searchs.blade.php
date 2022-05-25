@extends('includes.home')

@section('title')
    Items
@endsection

@section('style')
    <link rel="stylesheet" href="css/user/items.css" />
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/> --}}
    <script src="https://kit.fontawesome.com/0b7794023b.js" crossorigin="anonymous"></script>
@endsection

@section('content')



    
    
    <!------------------------------------------products--------------------------------------------->

    <div class="products">

        <div class="message">
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style="color: red">{{$error}}</li>
                    @endforeach
                </ul>
            @endif
            
            @if (!empty($success))
            <div class="green-Messages">{{$success}}</div>
            @endif
            @if (!empty($fail))
            <div class="red-Messages">{{$fail}}</div>
            @endif
        </div>

        <div class="containerr1212">
            <h1 class="lg-title">Ghyari You will find what you need!!</h1>
            
            <div class="product-items">
                @foreach ($items as $item)
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
                                <h2 class="sm-title">{{$item->company_name}}</h2>
                                <div class="rating">
                                    <span><i class="fas fa-star" style="color: #ffc107"></i></span>

                                    <span>{{$item->rate}}</span>
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
