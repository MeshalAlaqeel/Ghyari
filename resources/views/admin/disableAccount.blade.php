@extends('includes.admin')

@section('title')
    Admin Home
@endsection

@section('style')
    <link rel="stylesheet" href="css/admin/item.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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
            <div class="items">
                @if (!empty($users))
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>USER NAME</td>
                                <td>USER EMAIL</td>
                                <td>STATUS</td>
                                <td>Activation</td>
                            </tr>
                            @foreach ($users as $user)
                                @if ($user->active == 1)
                                    <tr>
                                        <td>{{$user->username }}<br/></td>
                                        <td>{{$user->email }}<br/></td>
                                        <td>{{$user->active }}<br/></td>
                                        <td>
                                            <form action="{{route('disableAccount')}}" method="POST" >
                                                @csrf
                                                <input type="hidden" name="id" value="{{$user->id }}">
                                                <input type="submit" value="Disable" name="disableAccount" class="dlt_btn" style="width:100px;">
                                            </form>
                                        </td>
                                    </tr>
                                @else
                                    <tr>
                                        <td>{{$user->username }}<br/></td>
                                        <td>{{$user->email }}<br/></td>
                                        <td>{{$user->active }}<br/></td>
                                        <td>
                                            <form action="{{route('enableAccount')}}" method="POST" >
                                                @csrf
                                                <input type="hidden" name="id" value="{{$user->id }}">
                                                <input type="submit" value="Enable" name="disableAccount" class="dlt_btn" style="width:100px;">
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                                
                            @endforeach
                            
                        </tbody>
                    </table>
                @else
                    <h3> {{ "NO Users" }} </h3>
                @endif
            </div>
        </div>

    </div> {{-- end main --}}
    

@endsection  {{-- End content --}}

@section('scripts')
    
@endsection
