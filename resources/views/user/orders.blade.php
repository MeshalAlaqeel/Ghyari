@extends('includes.master')

@section('title')
    Orders
@endsection

@section('style')
    <link rel="stylesheet" href="css/user/wish.css">
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
                    @if (count($orders) > 0 )
                        <tr>
                            <th>ORDER ID</th>
                            <th>STATUS</th>
                            <th>ORDER PAGE</th>
                        </tr>
                        @foreach ($orders as $order )
                            <tr>
                                <td>
                                    <p>#{{$order->id}}</p>
                                </td>
                                <td>
                                    {{$order->status}}
                                </td>
                                <td>
                                    <a href="/orderPage/{{$order->id}}"><input type="submit" value="Show Order" name="disableAccount" class="btn btn-primary profile-button"></a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <h3 style="margin-left: 440px">No Order.</h3>
                    @endif
                </table>     
            </div>
        </div>
    </div>

@endsection {{-- End content --}}

@section('scripts')
    
@endsection