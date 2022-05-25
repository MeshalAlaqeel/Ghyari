@extends('includes.admin')

@section('title')
    All Items
@endsection

@section('style')
    <link rel="stylesheet" href="css/admin/adminItems.css" />
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" /> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
@endsection

@section('content')
{{-- 
    <div id="main">

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="color: red">{{$error}}</li>
                @endforeach
            </ul>
        @endif

        @if (!empty($success))
            <div style="color: green">{{$success}}</div>
        @endif
        @if (!empty($fail))
            <div style="color: red">{{$fail}}</div>
        @endif


        <div style="width:700px; margin:50 auto; margin-left: 200px;">
            <div class="search">
                <form action="{{route('searchItem')}}" method="post">
                    @csrf
                    <input type="text" placeholder="Search" name="search"/>
                </form>
                <i class="fa fa-search icons"></i>
            </div>
            <div class="items">
                @if (!empty($items))
                    <table class="table">
                        <tbody>
                            <tr>
                                <td> Image</td>
                                <td> Name</td>
                                <td> Price</td>
                                <td> Quantity</td>
                                <td> Category</td>
                                <td> Show Item</td>
                            </tr>
                            @foreach ($items as $item)
                                    <tr>
                                        
                                        <td><img src="image/{{$item->image }}" alt="" style="height: 50px; width:50px;"><br/></td>
                                        <td>{{$item->name }}<br/></td>
                                        <td>{{$item->price }}<br/></td>
                                        <td>{{$item->quantity }}<br/></td>
                                        <td>{{$item->category }}<br/></td>
                                        <td>
                                            <a href="/adminItemPage/{{$item->id}}"><input type="submit" value="Show Item" name="disableAccount" class="dlt_btn" style="width:100px;"></a>
                                        </td>
                                    </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <h3> {{ "NO Items" }} </h3>
                @endif
            </div>
        </div>

    </div> end main --}}
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
        <h2>Items</h2>
        <br />

        <form action="{{route('searchItem')}}" method="post">
            @csrf
            <div style="width: 50%; float: left;">
                <input type="text" placeholder="Search.." name="search" />
            </div>
        </form>
        <br />
        <div class="row">
            @if (!empty($items))
                <table class="table">
                    <tbody>
                        <tr>
                            <td> Image</td>
                            <td> Name</td>
                            <td> Company</td>
                            <td> Price</td>
                            <td> Quantity</td>
                            <td> Category</td>
                            <td> Show Item</td>
                        </tr>
                        @foreach ($items as $item)
                                <tr>
                                    
                                    <td><img src="image/{{$item->image }}" alt="" style="height: 50px; width:50px;"><br/></td>
                                    <td>{{$item->name }}<br/></td>
                                    <td>{{$item->company_name }}<br/></td>
                                    <td>{{$item->price }}<br/></td>
                                    <td>{{$item->quantity }}<br/></td>
                                    <td>{{$item->category }}<br/></td>
                                    <td>
                                        <a href="/adminItemPage/{{$item->id}}"><input type="submit" value="Show Item" name="disableAccount" class="dlt_btn" style="width:100px;"></a>
                                    </td>
                                </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h3> {{ "NO Items" }} </h3>
            @endif
        </div>
    </div>

@endsection  {{-- End content --}}

@section('scripts')
    
@endsection
