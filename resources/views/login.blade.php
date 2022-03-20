@extends('includes.log')

@section('title')
    Login
@endsection

@section('style')
    <link rel="stylesheet" href="css/login.css">
@endsection

@section('content')
    
    
    <div class="container">

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

        <form action="{{route('login')}}" method="post" class="login-email">
            @csrf
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" value="{{old('email')}}" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" required >
            </div>
            <p style="margin-bottom: 10px;"><a href="#">forgot your password?</a></p>
            <div class="input-group">
                <button name="submit" class="btn">Login</button>
            </div>
            <p class="login-register-text">Don't have an account? <a href="register">Register Here</a>.</p>

        </form>
        

    </div>


@endsection {{-- End content --}}

@section('scripts')
    
@endsection