@extends('includes.admin')

@section('title')
    Admin Home
@endsection

@section('style')
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" /> --}}
    <link rel="stylesheet" href="css/admin/addItem.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
@endsection

@section('content')


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

    <div class="container12">
        <h2>Send Message Notification</h2>
        
        <br />
        <form action="{{route('notification')}}" method="post" class="">
            @csrf
            <div class="row">
                <div class="col-25">
                    <label for="message">message Notification</label>
                </div>
                <div class="col-75">
                    <textarea id="message" name="message" placeholder="Write message Notification.." style="height: 300px;"></textarea>
                </div>
            </div>

            <br />
            <div class="row">
                <input type="Submit" value="Send Notification" />
            </div>
        </form>
    </div>
@endsection  {{-- End content --}}

@section('scripts')
    
@endsection
