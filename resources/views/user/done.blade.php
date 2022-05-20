@extends('includes.master')

@section('title')
    Home
@endsection

@section('style')
    <link rel="stylesheet" href="css/user/wish.css">
    {{-- <link rel="stylesheet" href="css/user/items.css"> --}}
    <script src="https://kit.fontawesome.com/0b7794023b.js" crossorigin="anonymous"></script>
@endsection

@section('content')

    <div class="container12">
        <div class="container-message">
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

        <div class="container54">
            <div class="small-container cart-page">
                <h3 style="margin-left: 400px">Thank you for user <span style="color: #00ced1"> Ghyari</span>.</h3>
                <h3 style="margin-left: 400px">You can track your orders <a href="{{route('showOrders')}}" style="color: #00ced1">Here.</a></h3>
            </div>
        </div>
    </div>
@endsection {{-- End content --}}

@section('scripts')
    
@endsection