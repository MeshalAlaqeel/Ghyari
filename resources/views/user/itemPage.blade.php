@extends('includes.master')

@section('title')
    Home
@endsection

@section('style')
    <link rel="stylesheet" href="../css/user/itemPage.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,700;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
    <script src="https://kit.fontawesome.com/0b7794023b.js" crossorigin="anonymous"></script>
@endsection

@section('content')

    <div class="message">
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="color: red">{{$error}}</li>
                @endforeach
            </ul>
        @endif

        @if (session()->has('success'))
            <div class="green-Messages">{{session()->get('success')}}</div>
        @endif
        @if (session()->has('fail'))
            <div class="red-Messages">{{session()->get('fail')}}</div>
        @endif
    </div>
    
    <div class="products-details">
        <div class="small-container">
            <div class="card-wrapper">
                <div class="card">
                    <!-- card left -->
                    <div class="product-imgs">
                        <img src="../image/{{$item->image }}" alt=" image" />
                    </div>
                    <!-- card right -->
                    <div class="product-content">
                        <h2 class="product-title">{{$item->name }}</h2>
                        <a href="#" class="product-link">{{$item->company_name }}</a>
                        <div class="product-rating">
                            <i class="fas fa-star"></i>
                            <span>{{$item->rate }}</span>
                        </div>
                        <div class="product-price">
                            <p class="new-price">Price: <span>${{$item->price }}</span></p>
                        </div>
                        <div class="product-detail">
                            <h2>about this item:</h2>
                            <ul>
                                <li>Available: <span>
                                    @if ($item->quantity > 0)
                                        in stock
                                    @else
                                        out of stock
                                    @endif</span></li>
                                <li>Category: <span>{{$item->category }}</span></li>
                                <li>Description: <span>{{$item->description }}</span></li>
                            </ul>
                        </div>
                        <div class="purchase-info">
                            @if ($item->quantity > 0)
                                <form action="{{route('addToCart')}}" method="post" class="">
                                    @csrf
                                    <input type="number" name="quantity" min="0" max="99" value="1">
                                    <input type="hidden" name="item_id" value="{{$item->id }}">
                                    <button type="submit" class="btn">Add to Cart <i class="fas fa-shopping-cart"></i></button>
                                </form>
                            @else
                                <form action="{{route('addToRemindMe')}}" method="post" class="">
                                    @csrf
                                    <input type="hidden" name="item_id" value="{{$item->id }}">
                                    <button type="submit" class="btn">Add to Remind-me <i class="fas fa-shopping-cart"></i></button>
                                </form>
                            @endif
                            <form action="{{route('addToWish')}}" method="post" class="">
                                @csrf
                                <input type="hidden" name="item_id" value="{{$item->id }}">
                                <div class="bcart">
                                <button class="btn btn-primary profile-button fa fa-heart fa-1x" type="submit"></button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-wrapper2">
                <div class="container-r">
                    <h3 class="cr-block-rate">Rate this item: </h3>
                    <div class="inner-container-rate">
                        <form action="{{route('addRating')}}" method="post" class="">
                            @csrf
                                <fieldset class="rating">
                                <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Very good - 5 stars"></label>
                                <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Good - 4 stars"></label>
                                <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Average  - 3 stars"></label>
                                <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Bad - 2 stars"></label>
                                <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Very bad - 1 star"></label>
                            </fieldset>
                            <input type="hidden" name="item_id" value="{{$item->id }}">
                            {{-- <div class="acart-rate" ><button class="btn btn-primary profile-button" type="submit">Submit</button></div> --}}
                            <div class="purchase-info" ><button type="submit" class="btn" style="margin-top: -27px; margin-left: -205px;">Submit </button></div>
                        </form>
                    </div>
                </div>
                <div class="inner-container">
                    <h3 class="cr-block">Comments</h3>
                    <br>
                    @foreach ($comments as $comment)
                        <div class="comment">
                            <h4>{{$comment->username }}</h4>
                            <p>{{$comment->comment }} </p>
                            <i class="fa fa-calendar"></i>{{$comment->created_at }}</li>
                        </div>
                    @endforeach
                    <div class="container-c">
                        <form action="{{route('addComment')}}" method="post" class="">
                            @csrf
                            <input type="hidden" name="item_id" value="{{$item->id }}">
                            <input type="text" class="comment-bar" name="comment" placeholder="Please write your comment here">
                            {{-- <div class="acart" ><button class="btn btn-primary profile-button" type="submit">Submit</button></div> --}}
                            <div class="purchase-info" ><button type="submit" class="btn" style="margin-left: 550px; bottom: 110px; position: relative;">Submit </button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection {{-- End content --}}

@section('scripts')
    
@endsection