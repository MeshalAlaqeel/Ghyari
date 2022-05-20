@extends('includes.log')

@section('title')
    Forget Password
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
    <!---------------Enter Email--------------------->
    <div class="center22">
        
        <h1>Forget Password</h1>

        <form action="{{route('sendResetLink')}}" method="post" class="login-email">
            @csrf
            <br />
            <p>Enter Your Email to send you a link</p>
            <div class="txt_field">
                <input type="email" name="email" value="{{old('email')}}" required>
                <span></span>
                <label>ُEmail</label>
            </div>

            <input type="submit" value="Send" />
            <div class="signup_link">Want to login? <a href="{{route('showLogin')}}">login here</a>.</div>
        </form>
    </div>

    

@endsection  {{-- End content --}}

@section('scripts')
    
@endsection
