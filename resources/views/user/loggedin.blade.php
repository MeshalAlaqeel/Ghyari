@extends('includes.master')

@section('title')
    Home
@endsection

@section('style')
    <link rel="stylesheet" href="css/user/loggedin.css">
    <style type="text/css">
        body{ background-color: white; }
    </style>
@endsection

@section('content')
    
    
    <div style="font-size:40px; color:lightseagreen; margin-left: 600px; margin-top: 300px">
        Welcome
        <br>
        <a href="{{route('showEditInformation')}}">Edit Information</a>
        <br>
        <a href="{{route('showAddCreditCard')}}">Add Credit Card</a>
        <br>
        <a href="{{route('showCreditCards')}}">Credit Cards</a>
        
    </div>
    
    @foreach ($items as $item)
        {{$item->name}}
        <br>
        <img src="/image/{{$item->image}}" alt="" style="height: 200px; width:200px;">
        <br>
        
    @endforeach


@endsection {{-- End content --}}

@section('scripts')
    
@endsection