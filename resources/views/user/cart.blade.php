@extends('includes.master')

@section('title')
    Home
@endsection

@section('style')
    <link rel="stylesheet" href="css/user/cart.css">
    {{-- <link rel="stylesheet" href="css/user/items.css"> --}}
    <script src="https://kit.fontawesome.com/0b7794023b.js" crossorigin="anonymous"></script>
@endsection

@section('content')

    <div class="container12">
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

        <div class="container54">
            <div class="small-container cart-page">
                <table>
                    
                    @php
                        $rotate = 1;
                        $total = 0;
                    @endphp
                    @foreach ($items as $item )
                        @php
                            $rotate1 = 1;
                        @endphp
                        <tr>
                            <th>Product</th>
                            <th>Remove</th>
                            <th>Unit price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
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
                                        <form action="{{route('deleteFromCart')}}" method="post" class="">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$item->id }}">
                                            
                                            <div ><button class="btn-primary profile-button" type="submit"><i href="" class="fa-regular fa-trash-can" style="color: red"></i></button></div>
                                        </form>
                                    </td>
                                    <td>${{$item->price}}</td>
                                    <td>
                                        <form action="{{route('editFromCart')}}" method="post" class="">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$item->id }}">
                                            <input type="number" name="quantity" value="{{$quantity}}" style="width: 70px">
                                            {{-- <div ><button class="btn btn-primary profile-button" type="submit">Remove</button></div> --}}
                                        </form>
                                    </td>
                                    {{-- <td><a href="">Remove</a></td> --}}
                                    <td>
                                        $@php
                                            echo ($item->price)*($quantity);
                                            $total += ($item->price)*($quantity);
                                        @endphp
                                    </td>
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
                        @if (count($items) > 0)

                            <tr>
                                <td>Subtotal</td>
                                <td>
                                    $@php
                                        echo ($total);
                                    @endphp
                                </td>
                            </tr>
                            <tr>
                                <td>VAT</td>
                                <td>
                                    $@php
                                        $tax=($total)*(0.15);
                                        echo ($tax);
                                    @endphp
                                </td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td>
                                    $@php
                                        echo ($total)+($tax);
                                    @endphp
                                </td>
                            </tr>
                            <tr>
                                <td><a href="" class="btn btn-success">Check out<i class="fa fa-arrow-right"></i></a> </td>
                            </tr> 
                        @else
                            <h3>No items in Cart.</h3>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection {{-- End content --}}

@section('scripts')
    
@endsection