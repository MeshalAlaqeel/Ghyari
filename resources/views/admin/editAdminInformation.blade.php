@extends('includes.admin')

@section('title')
    Admin Home
@endsection

@section('style')
    <link rel="stylesheet" href="css/admin/adminEditInformation.css">
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
{{--     
    <div id="main">

        

        <form action="{{route('editInformation')}}" method="post" class="login-email">
            @csrf
            <div class="container rounded bg-white mt-5">
                <div class="row">
                    <div class="col-md-8">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="d-flex flex-row align-items-center back"><i class="fa fa-long-arrow-left mr-1 mb-1"></i>
                                    <h6>Back to home</h6>
                                </div>
                                <h6 class="text-right">Edit Profile</h6>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6"><input type="text" class="form-control" name="username" placeholder="username" value={{$user->username }} required></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6"><input type="text" class="form-control" name="email" placeholder="Email" value={{$user->email}} required></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6"><input type="text" class="form-control" name="phone_number" placeholder="Phone number" value={{$user->phone_number}} ></div>
                            </div>
                            <div class="mt-5 text-right"><button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div> {{-- end main --}}
    
    <div class="container12">
        <h2>Edit Information</h2>
        <form action="{{route('editInformation')}}" method="post" class="login-email">
            @csrf
            <div class="row">
                <div class="col-25">
                    <label for="email">Email</label>
                </div>
                <div class="col-75">
                    <input type="text" id="email" name="email" placeholder="Email.."  value={{$user->email}} required/>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="Username">Username</label>
                </div>
                <div class="col-75">
                    <input type="text" id="Username" name="username" placeholder="Username.."  value={{$user->username }} required/>
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="Phone">Phone Number</label>
                </div>
                <div class="col-75">
                    <input type="text" id="Phone" name="Phone" placeholder="Phone.." value={{$user->phone_number}} />
                </div>
            </div>

            <div class="row">
                <input type="Submit" value="Save" />
            </div>
        </form>
    </div>

@endsection  {{-- End content --}}

@section('scripts')
    <script>
        
        function menu1() {
            document.getElementById("item").classList.toggle("show");
        }
        function menu2() {
            document.getElementById("order").classList.toggle("show");
        }
        
    </script>
@endsection
