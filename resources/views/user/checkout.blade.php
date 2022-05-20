@extends('includes.master')

@section('title')
    Home
@endsection

@section('style')
    <link rel="stylesheet" href="css/user/Checkout.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
@endsection

@section('content')
    @php
        $total=0;
    @endphp
    <div class="main-content">
        <div class="invoice-container">
            <div class="top">
                <div class="top-left">
                    <h1 class="main">Checkout</h1>
                </div>
            </div>
            <form action="{{route('payMethod')}}" method="post">
                @csrf
                <div class="table-bill">
                    <table class="table-service">
                        <thead>
                            <th class="imagee">Item</th>
                            <th class="quantity">Name</th>
                            <th class="quantity">Unit Price</th>
                            <th class="quantity">Quantity</th>
                            <th class="cost">Cost</th>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>
                                        <img class="imagee" src="image/{{$item->image}}" alt="" style="width: 30px; height: 30px;" />
                                    </td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->price}}</td>
                                    <td>{{$item->quantity}}</td>
                                    <td class="cost">
                                        $@php
                                            echo ($item->price)*($item->quantity);
                                            $total += ($item->price)*($item->quantity);
                                        @endphp
                                    </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                        <tfoot>
                            <tr class="total">
                                <td class="name" colspan="2">Ship To</td>
                                <td colspan="4" class="number">
                                    <p style="font-size: 20px; text-align: left;">
                                        {{$address->address_name}}
                                    </p>
                                </td>
                            </tr>
                        </tfoot>
                        <br />
                        <tfoot >
                            <tr class="total">
                                <td class="name" colspan="3">Total + VAT</td>
                                <td colspan="4" class="number">
                                    @php
                                        $vat=($total)*(0.15);
                                        $final=($total)+($vat);
                                        echo ($final);
                                    @endphp
                                </td>
                            </tr>
                        </tfoot>
                        <br />
                        <tfoot>
                            <tr class="total">
                                <td class="name" colspan="3">Payment Method</td>
                                <td colspan="4" class="number">
                                    <select name="payMethod" id="target">
                                        <option value="cash">Cash</option>
                                        <option value="creditCard">Credit Card</option>
                                    </select>
                                    <div id="creditCard" class="invv">
                                        <!-- <form><input type="radio" id="1402" name="Crad_Type" value="1402"><label for="html">1402</label><input type="radio" id="1502" name="Crad_Type" value="1502"><label for="1502">1502</label><input type="radio" id="newcard" name="Crad_Type" value="newcard"><label for="newcard">New Card</label></form>  -->
                                        <select>
                                            @foreach ($creditCards as $creditCard)
                                                <option value="{{$creditCard->name}}">{{$creditCard->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="actions">
                    <input type="hidden" name="final" value="@php echo $final @endphp">
                    <button type="submit" class="btn btn-main">checkout</button>
                </div>
            </form>
            <div class="note">
                <p>Thank You for working with us!</p>
                <p>Ghyari</p>
            </div>
        </div>
    </div>

    
@endsection {{-- End content --}}

@section('scripts')
    <script>
        document
                .getElementById('target')
                .addEventListener('change', function () {
                    'use strict';
                    var vis = document.querySelector('.vis'),   
                        target = document.getElementById(this.value);
                    if (vis !== null) {
                        vis.className = 'invv';
                    }
                    if (target !== null ) {
                        target.className = 'vis';
                    }
            });
        var MenuItems = document.getElementById("MenuItems");
        
        MenuItems.style.maxHeight = "0px";

        function menutoggle(){
            if(MenuItems.style.maxHeight == "0px"){

                MenuItems.style.maxHeight = "200px";

            }
            else
            {
                MenuItems.style.maxHeight = "0px";
            }
        }
        
    </script>
@endsection