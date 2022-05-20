@extends('includes.master')

@section('title')
    Home
@endsection

@section('style')
    <link rel="stylesheet" href="css/user/wish.css">
    {{-- <link rel="stylesheet" href="css/user/items.css"> --}}
    <script src="https://kit.fontawesome.com/0b7794023b.js" crossorigin="anonymous"></script>
@endsection

@section('content')

    <div class="container12">
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

        <div class="container54">
            <div class="small-container cart-page">
                <table>
                    @if (count($items) > 0 )
                        
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
                                    <form action="{{route('deleteFromWish')}}" method="post" class="">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$item->id }}">
                                        <div ><button class="btn-primary profile-button" type="submit"><i href="" class="fa-regular fa-trash-can" style="color: red"></i></button></div>
                                    </form>
                                </td>
                                <td>${{$item->price}}</td>
                                <td>
                                    @if ($item->quantity > 0)
                                        <span class="green-Messages">In Stock</span>
                                    @else
                                        <span class="red-Messages">Out of Stock</span>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{route('addToCart')}}" method="post" class="">
                                        @csrf
                                        <input type="hidden" name="item_id" value="{{$item->id }}">
                                        <div ><button class="btn btn-primary profile-button" type="submit">Add to cart</button></div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <h3 style="margin-left: 400px">No items in Wishlist.</h3>
                    @endif
                </table>     
            </div>
        </div>
    </div>
@endsection {{-- End content --}}

@section('scripts')
    
@endsection