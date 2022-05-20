@extends('includes.master')

@section('title')
    Home
@endsection

@section('style')
    <link rel="stylesheet" href="../css/user/orderPage.css">
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
                    <h1 class="main">Invoice</h1>
                    <span class="code">#{{$order->id}}</span>
                </div>
                <div class="top-right">
                    <br>
                    <div class="date">Date: 23.08.2022</div>
                    <div class="date">Status: {{$order->status}}</div>
                </div>
            </div>
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
                                    <img class="imagee" src="../image/{{$item->image}}" alt="" style="width: 30px; height: 30px;" />
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
                    <br/>
                    <tfoot>
                        <tr class="total">
                            <td class="name" colspan="3">Payment Method</td>
                            <td colspan="4" class="number">
                                "payment method"
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="note">
                <p>Thank You for working with us!</p>
                <p>Ghyari</p>
            </div>
        </div>
    </div>

    
@endsection {{-- End content --}}

@section('scripts')
    
@endsection