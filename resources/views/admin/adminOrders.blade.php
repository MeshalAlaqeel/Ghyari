@extends('includes.admin')

@section('title')
    All Items
@endsection

@section('style')
<link rel="stylesheet" href="css/admin/disableAccounts.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
@endsection

@section('content')

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
    <br />

    <div class="container12">
        <h2>Orders</h2>
        <br />

        <form action="{{route('searchOrder')}}" method="post">
            @csrf
            <div style="width: 50%; float: left;">
                <input type="text" placeholder="Search.." name="search" />
            </div>
        </form>
        <br />
        <div class="row">
            @if (!empty($orders))
                <table class="table">
                    <tbody>
                        <tr>
                            <td> ORDER ID</td>
                            <td> USER NAME</td>
                            <td> STATUS</td>
                            <td> CREATED_AT</td>
                            <td> BUTTON</td>
                        </tr>
                        @foreach ($orders as $order)
                                <tr>
                                    
                                    <td>{{$order->id }}<br/></td>
                                    <td>{{$order->username }}<br/></td>
                                    <td>{{$order->status }}<br/></td>
                                    <td>{{$order->created_at }}<br/></td>
                                    <td>
                                        <form action="{{route('changeStatus')}}" method="POST" >
                                            @csrf
                                            <input type="hidden" name="id" value="{{$order->id }}">
                                            <input type="hidden" name="status" value="{{$order->status }}">
                                            <input type="hidden" name="email" value="{{$order->email }}">
                                            <input type="submit" value="Button" name="disableAccount" class="dlt_btn" style="width:100px;">
                                        </form>
                                    </td>
                                </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h3> {{ "NO Orders" }} </h3>
            @endif
        </div>
    </div>

@endsection  {{-- End content --}}

@section('scripts')
    
@endsection
