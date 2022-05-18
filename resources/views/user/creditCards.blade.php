@extends('includes.master')

@section('title')
    Home
@endsection

@section('style')
    <link rel="stylesheet" href="css/user/creditCards.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
@endsection

@section('content')
    
<div id="main">



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

        <h5>Want to add new Credit Card? <a href="{{route('showAddCreditCard')}}">Click Here.</a> </h5>
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

</div> {{-- end main --}}


@endsection {{-- End content --}}

@section('scripts')
    
@endsection