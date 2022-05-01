@extends('includes.master')

@section('title')
    Items
@endsection

@section('style')
    <link rel="stylesheet" href="css/user/items.css" />
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" /> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" /> --}}
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> --}}
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
    
    @foreach ($items as $item)
        <div class="col-4" style="background-color: white">
            <a href="/itemPage/{{$item->id}}">
                <img src="image/{{$item->image }}" style="height: 100px; width: 100px;">
                <h4>{{$item->name }}</h4>
            </a>
            <div class="rating">
                <i class="fa fa-star" ></i>
                <i class="fa fa-star" ></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star" ></i>
                <i class="fa fa-star-half-o"></i>
            </div>
            <p>${{$item->price }}</p>
            <form action="{{route('addToCart')}}" method="post" class="">
                @csrf
                <input type="hidden" name="item_id" value="{{$item->id }}">
                <div class="acart"><button class="btn btn-primary profile-button" type="submit">Add to cart</button></div>
            </form>
            <form action="{{route('addToWish')}}" method="post" class="">
                @csrf
                <input type="hidden" name="item_id" value="{{$item->id }}">
                <div class="acart" ><button class="fa-regular fa-heart fa-1x btn" class="btn btn-primary profile-button" type="submit">Wishlist</button></div>
            </form>
        </div>
    @endforeach

</div>


    <div id="main">

    </div> {{-- end main --}}
    

@endsection  {{-- End content --}}

@section('scripts')
    
@endsection
