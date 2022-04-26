@extends('includes.master')

@section('title')
    Home
@endsection

@section('style')
    
@endsection

@section('content')
    
    
    <div style="font-size:40px; color:lightseagreen; margin-left: 600px; margin-top: 300px">
        Welcome
        <a href="editInformation">Edit Information</a>
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