@extends('includes.log')

@section('title')
    Reset Password
@endsection

@section('style')
    <link rel="stylesheet" href="../css/login.css">
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
        
        <form action="{{route('resetPassword')}}" method="post" class="login-email">
            @csrf
            <input type="hidden" name="token" value="{{$token}}">

            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Reset Password</p>

            <div class="input-group">
                <input type="email" placeholder="Email" name="email" value="{{ $email ?? old ('email') }}" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password"  required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Confirm Password" name="Confirm-password"  required>
            </div>
            <div class="input-group">
                <button name="submit" type="submit" class="btn">Reset</button>
            </div>
            <p class="login-register-text">Want to login? <a href="../login">Login Here</a>.</p>

        </form>

    </div>
    

@endsection  {{-- End content --}}

@section('scripts')
    
@endsection
