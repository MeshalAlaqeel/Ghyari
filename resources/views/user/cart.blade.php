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
                <th>Quantity</th>
                <th>Unit price</th>
                <th>Remove</th>
                <th>Total</th>
            </tr>
            @php
                $rotate = 1;
            @endphp
            @foreach ($items as $item )
                @php
                    $rotate1 = 1;
                @endphp
                

                @foreach ($quantitys as $quantity)
                    @if ($rotate==$rotate1)
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
                                <form action="{{route('editFromCart')}}" method="post" class="">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$item->id }}">
                                    <input type="number" name="quantity" value="" placeholder="{{$quantity}}">
                                    {{-- <div ><button class="btn btn-primary profile-button" type="submit">Remove</button></div> --}}
                                </form>
                            </td>
                            <td>${{$item->price}}</td>
                            <td>
                                <form action="{{route('deleteFromCart')}}" method="post" class="">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$item->id }}">
                                    <div ><button class="btn btn-primary profile-button" type="submit">Remove</button></div>
                                </form>
                            </td>
                            {{-- <td><a href="">Remove</a></td> --}}
                            <td>$650.00</td>
                        </tr>
                    @endif
                    @php
                        $rotate1++;
                    @endphp
                @endforeach
                @php
                    $rotate++;
                @endphp
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
                <tr>
                    <td><a href="" class="btn btn-success">Check out<i class="fa fa-arrow-right"></i></a> </td>
                </tr> 
            </table>
        </div>
    </div>

@endsection {{-- End content --}}

@section('scripts')
    
@endsection