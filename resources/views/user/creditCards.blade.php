@extends('includes.master')

@section('title')
    Home
@endsection

@section('style')
    <link rel="stylesheet" href="css/user/creditCards.css" />
    {{-- <link rel="stylesheet" href="css/user/wish.css"> --}}
    <script src="https://kit.fontawesome.com/0b7794023b.js" crossorigin="anonymous"></script>
@endsection

@section('content')
    
{{-- <div id="main"> --}}

    
{{-- 
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

    <div style="width:700px; margin:50 auto; margin-left: 300px;">

        
        <br>
        
        <div class="items">
            @if (!empty($cards))
                <table class="table">
                    <tbody>
                        <tr>
                            <td>CARD NAME</td>
                            <td>CARD NUMBER</td>
                            <td>MONTH</td>
                            <td>YEAR</td>
                        </tr>
                        @foreach ($cards as $card)
                                <tr>
                                    <td>{{$card->name }}<br/></td>
                                    <td>{{$card->number }}<br/></td>
                                    <td>{{$card->expiration_month }}<br/></td>
                                    <td>{{$card->expiration_year }}<br/></td>
                                    <td>
                                        <form action="{{route('deleteCreditCard')}}" method="POST" >
                                            @csrf
                                            <input type="hidden" name="id" value="{{$card->id }}">
                                            <input type="submit" value="Delete" name="deleteCreditCard" class="dlt_btn" style="width:100px;">
                                        </form>
                                    </td>
                                </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            @else
                <h3> {{ "NO Cards" }} </h3>
            @endif
        </div>
    </div>
--}}

    
    <div class="container12">
        
        <h3 class="add">Want to add new Credit Card? <a href="{{route('showAddCreditCard')}}">Click Here.</a> </h3>

        
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
                    @if (count($cards) > 0 )
                        <tr>
                            <th>CARD NAME</th>
                            <th>CARD NUMBER</th>
                            <th>MONTH</th>
                            <th>YEAR</th>
                            <th>DELETE</th>
                        </tr>
                        @foreach ($cards as $card)
                            <tr>
                                <td>
                                    <p>{{$card->name }}</p>
                                </td>
                                <td>
                                    {{$card->number }}
                                </td>
                                <td>
                                    {{$card->expiration_month }}
                                </td>
                                <td>
                                    {{$card->expiration_year }}
                                </td>
                                <td>
                                    <form action="{{route('deleteCreditCard')}}" method="POST" >
                                        @csrf
                                        <input type="hidden" name="id" value="{{$card->id }}">
                                        <input type="submit" value="Delete" name="deleteCreditCard" class="btn" style="width:100px;">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <h3 style="margin-left: 440px">No Cards.</h3>
                    @endif
                </table>     
            </div>
        </div>
    </div>

{{-- </div> end main --}}


@endsection {{-- End content --}}

@section('scripts')
    
@endsection