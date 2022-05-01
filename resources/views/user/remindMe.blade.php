@extends('includes.master')

@section('title')
    Home
@endsection

@section('style')
    <link rel="stylesheet" href="css/user/cart.css">
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
                        @if ($item->quantity >0)
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
                    
                    {{-- <td><a href="">Remove</a></td> --}}
                    <td>$650.00</td>
                </tr>
            @endforeach
            
        </table>     
        
        <div class="total-price">
            <table>
                <tr>
                    <td>Subtotal</td>
                    <td>$200.00</td>
                </tr>
                <tr>
                    <td>Tax</td>
                    <td>$35.00</td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td>$235.00</td>
                </tr>
                <!-- <tr>
                    <td><a href="" class="btn btn-success">Check out<i class="fa fa-arrow-right"></i></a> </td>
                </tr> -->
            </table>
        </div>
    </div>

@endsection {{-- End content --}}

@section('scripts')
    
@endsection