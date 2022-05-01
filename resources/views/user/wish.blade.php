@extends('includes.master')

@section('title')
    Home
@endsection

@section('style')
    <link rel="stylesheet" href="css/user/wish.css">
    <link rel="stylesheet" href="css/user/items.css">
@endsection

@section('content')

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

    <div class="small-container cart-page">
        <table>
            <tr>
                <th>Product</th>
                <th>Remove</th>
                <th>Unit price</th>
                <th>Stock Status</th>
                <th>Add to Cart</th>
            </tr>
            @foreach ($items as $item )
                <tr>
                    <td> 
                        <div class="cart-info">
                            <img src="image/{{$item->image}}" style="height: 100px; width: 100px;">
                            <div>
                                <p>{{$item->name}}</p>
                                <br>
                            </div>
                        </div>
                    </td>
                    <td>
                        <form action="{{route('deleteFromRemindMe')}}" method="post" class="">
                            @csrf
                            <input type="hidden" name="id" value="{{$item->id }}">
                            <div ><button class="btn btn-primary profile-button" type="submit">Remove</button></div>
                        </form>
                    </td>
                    <td>${{$item->price}}</td>
                    <td>
                        @if ($item->quantity > 0)
                            <span class="in-stock-box">In Stock</span>
                        @else
                            <span class="in-stock-box">Out of Stock</span>
                        @endif
                    </td>
                    <td>
                        <form action="{{route('addToRemindMe')}}" method="post" class="">
                            @csrf
                            <input type="hidden" name="item_id" value="{{$item->id }}">
							<div ><button class="btn btn-primary profile-button" type="submit">Add to cart</button></div>
                        </form>
                    </td>
                    
                </tr>
            @endforeach
            
        </table>     
        
    </div>

@endsection {{-- End content --}}

@section('scripts')
    
@endsection