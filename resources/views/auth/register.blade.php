@extends('includes.log')

@section('title')
    Register
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
        <!-------------------Register------------->
    <div class="center11">

        <h1>Register</h1>
        <form action="{{route('register')}}" method="post" >
            @csrf

            <div class="txt_field">
                <input type="email" name="email" value="{{old('email')}}" required>
                <span></span>
                <label>Email</label>
            </div>

            <div class="txt_field">
                <input type="text" name="username" value="{{old('username')}}" required>
                <span></span>
                <label>Username</label>
            </div>
            <div class="txt_field">
                <input type="password" name="password"  required>
                <span></span>
                <label>Password</label>
            </div>

            <div class="txt_field">
                <input type="password" name="Confirm-password"  required>
                <span></span>
                <label>Confirm Password</label>
            </div>
            <br />
            <input type="submit" value="Register" />
            <div class="signup_link">Have an account? <a href="{{route('showLogin')}}">Login here</a>.</div>
        </form>
    </div>


@endsection  {{-- End content --}}

@section('scripts')
    
@endsection
