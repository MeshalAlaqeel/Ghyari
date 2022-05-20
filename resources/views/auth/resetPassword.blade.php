@extends('includes.log')

@section('title')
    Reset Password
@endsection

@section('style')
    <link rel="stylesheet" href="../css/login.css">
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
    <!---------------Enter New Password--------------------->
<div class="center33">
    
    <h1>Enter Your New Password</h1>

    <form action="{{route('resetPassword')}}" method="post">
        @csrf
        <input type="hidden" name="token" value="{{$token}}">

        <div class="txt_field">
            <input type="email" name="email" value="{{ $email ?? old ('email') }}" required>
            <span></span>
            <label>ُEmail</label>
        </div>

        <div class="txt_field">
            <input type="password" name="password"  required>
            <span></span>
            <label>ُPassword</label>
        </div>

        <div class="txt_field">
            <input type="password" name="Confirm-password"  required>
            <span></span>
            <label>Confirm Password</label>
        </div>

        <input type="submit" value="Reset" />
        <div class="signup_link">Want to login? <a href="{{route('showLogin')}}">Login here</a></div>
    </form>
</div>


@endsection  {{-- End content --}}

@section('scripts')
    
@endsection
