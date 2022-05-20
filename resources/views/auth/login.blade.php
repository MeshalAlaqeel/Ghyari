@extends('includes.log')

@section('title')
    Login
@endsection

@section('style')
    <link rel="stylesheet" href="css/login.css">
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

    <div class="center">

        

        <h1>Log in</h1>
    
        <form action="{{route('login')}}" method="post">
            @csrf
            <div class="txt_field">
                <input type="email" name="email" value="{{ session()->get('email') ?? old ('email') }}" required>
                <span></span>
                <label>ُEmail</label>
            </div>
    
            <div class="txt_field">
                <input type="password" name="password" required >
                <span></span>
                <label>Password</label>
            </div>
    
            <div class="pass"><a href="{{route('showForgetPassword')}}" style="color: rgb(192, 192, 192);"> Forgot Password? </a></div>
            <br />
            <input type="submit" value="Login" />
            <div class="signup_link">Not a member? <a href="{{route('showRegister')}}">Register now.</a></div>
        </form>
    </div>
    

@endsection {{-- End content --}}

@section('scripts')
    
@endsection