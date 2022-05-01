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

    @if (session()->has('success'))
    <div style="color: green">{{session()->get('success')}}</div>
    @endif
    @if (session()->has('fail'))
    <div style="color: red">{{session()->get('fail')}}</div>
    @endif
    
    
<div class="small-container single-product">
    <div class="row">
        <div class="col-2">
            <img src="../image/{{$item->image }}" width="100%" id="ProductImg">
            <br>
        </div>
        <div class="col-2">
            <p>Home / {{$item->category }} </p>
            <h1>{{$item->name }} </h1>
            <h4>${{$item->price }}</h4>
            {{-- <h4>{{$item->rate }}</h4> --}}

            @if ($item->quantity > 0)
                <form action="{{route('addToCart')}}" method="post" class="">
                    @csrf
                    <h4>How many pieces do you want?</h4>
                    <input type="number" value="" placeholder="1">
                    <input type="hidden" name="item_id" value="{{$item->id }}">
                    <div class="acart"><button class="btn btn-primary profile-button" type="submit">Add to cart</button></div>
                </form>
            @else
                <form action="{{route('addToRemindMe')}}" method="post" class="">
                    @csrf
                    <h4>Item not available :( <br> Do you want me to remind You?</h4>
                    <input type="hidden" name="item_id" value="{{$item->id }}">
                    <div class="acart" ><button class="fa-regular fa-heart fa-1x icons btn" class="btn btn-primary profile-button" type="submit"> Remind ME</button></div>
                </form>
            @endif
            
            <form action="{{route('addToWish')}}" method="post" class="">
                @csrf
                <input type="hidden" name="item_id" value="{{$item->id }}">
                <div class="acart" ><button class="fa-regular fa-heart fa-1x btn" class="btn btn-primary profile-button" type="submit">Wishlist</button></div>
            </form>
            <h3>product details <i class="fa fa-indent" ></i></h3>
            <br>
            <p>details about the product</p>
        </div>
        <div class="outer-container">
            <div class="inner-container">
                <h1>Rating </h1>
                <br>
                <br>
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
                    <div class="acart" ><button class="btn btn-primary profile-button" type="submit">Submit</button></div>
                </form>
            </div>
            <br>
            <div class="inner-container">
                @foreach ($comments as $comment)
                    <div class="comment">
                        <h4>{{$comment->user_id }}</h4>
                        <p>{{$comment->comment }} </p>
                        <i class="fa fa-calendar"></i>{{$comment->created_at }}</li>
                    </div>
                @endforeach
                
                <br>
                <form action="{{route('addComment')}}" method="post" class="">
                    @csrf
                    <input type="hidden" name="item_id" value="{{$item->id }}">
                    <input type="text" class="comment-bar" name="comment" placeholder="Please write your comment here">
                    <div class="acart" ><button class="btn btn-primary profile-button" type="submit">Submit</button></div>
                </form>
                
            </div>
        </div>
    </div>
</div>
    


@endsection {{-- End content --}}

@section('scripts')
    
@endsection