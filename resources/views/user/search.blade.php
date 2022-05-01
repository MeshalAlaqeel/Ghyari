@extends('includes.master')

@section('title')
    Search Items
@endsection

@section('style')
    <link rel="stylesheet" href="css/user/items" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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
    
    @if (!empty($success))
        <div style="color: green">{{$success}}</div>
    @endif
    @if (!empty($fail))
        <div style="color: red">{{$fail}}</div>
    @endif
    
    @foreach ($items as $item)
        <div class="col-4" style="background-color: white">
            <img src="image/{{$item->image }}" style="height: 100px; width: 100px;">
            <h4>{{$item->name }}</h4>
            <div class="rating">
                <i class="fa fa-star" ></i>
                <i class="fa fa-star" ></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star" ></i>
                <i class="fa fa-star-half-o"></i>
            </div>
            <p>{{$item->price }}</p>
            <form action="{{route('addToCart')}}" method="post" class="">
                @csrf
                <input type="hidden" name="item_id" value="{{$item->id }}">
                <div class="btn acart"><button class="btn btn-primary profile-button" type="submit">Add to cart</button></div>
            </form>
            <form action="{{route('addToWish')}}" method="post" class="">
                @csrf
                <input type="hidden" name="item_id" value="{{$item->id }}">
                <div class="btn acart" ><button class="fa-regular fa-heart fa-2x btn" class="btn btn-primary profile-button" type="submit"></button></div>
            </form>
            <form action="{{route('addToRemindMe')}}" method="post" class="">
                @csrf
                <input type="hidden" name="item_id" value="{{$item->id }}">
                <div class="btn acart" ><button class="fa-regular fa-heart fa-2x btn" class="btn btn-primary profile-button" type="submit">Remind ME</button></div>
            </form>
            
        </div>
    @endforeach

</div>


    <div id="main">

        
{{-- 
        <form action="{{route('editInformation')}}" method="post" class="login-email">
            @csrf
            <div class="container rounded bg-white mt-5">
                <div class="row">
                    <div class="col-md-8">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="d-flex flex-row align-items-center back"><i class="fa fa-long-arrow-left mr-1 mb-1"></i>
                                    <h6>Back to home</h6>
                                </div>
                                <h6 class="text-right">Edit Profile</h6>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6"><input type="text" class="form-control" name="username" placeholder="username" value={{$user->username }} required></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6"><input type="text" class="form-control" name="email" placeholder="Email" value={{$user->email}} required></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6"><input type="text" class="form-control" name="phone_number" placeholder="Phone number" value={{$user->phone_number}} ></div>
                            </div>
                            <div class="mt-5 text-right"><button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <form action="{{route('deleteAccount')}}" method="post" class="login-email">
            @csrf
            <input type="hidden" name="email" value="{{$user->email }}">
            <div class="1">
                <div class="row">
                    <div class="col-md-8">
                        <div class="p-3 py-5">
                            <div class="mt-5 text-right"><button class="btn btn-primary profile-button" type="submit">Delete Account</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        
 --}}
    </div> {{-- end main --}}
    
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
