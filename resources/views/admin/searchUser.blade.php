@extends('includes.admin')

@section('title')
    Admin Home
@endsection

@section('style')
    <link rel="stylesheet" href="css/admin/disableAccounts.css" />
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" /> --}}
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

        @if (!empty($success))
            <div style="color: green">{{$success}}</div>
        @endif
        @if (!empty($fail))
            <div style="color: red">{{$fail}}</div>
        @endif
    </div>
    <br />

    <div class="container12">
        <h2>Accounts</h2>
        <br />

        <form action="{{route('searchUser')}}" method="post">
            @csrf
            <div style="width: 50%; float: left;">
                <input type="text" placeholder="Search.." name="search" />
            </div>
        </form>
        <br/>
        <div class="row">
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

@endsection  {{-- End content --}}

@section('scripts')
    
@endsection
