@extends('includes.master')

@section('title')
    Edit Information
@endsection

@section('style')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
@endsection

@section('content')

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
    <form action="{{route('deleteAccount')}}" method="post" class="login-email">
        @csrf
        <input type="hidden" name="email" value="{{$user->email }}">
        <div class="1">
            <div class="row">
                <div class="col-md-8">
                    <div class="p-3 py-5">
                        <div class="mt-5 text-right"><button class="btn btn-primary profile-button" type="submit">Delete Account</button></div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <form action="{{route('address')}}" method="post" class="login-email">
        @csrf
        <div class="container rounded bg-white mt-5">
            <div class="row">
                <div class="col-md-8">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="text-right">Save Location</h6>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6"><input type="text" class="form-control" id="address" name="name" placeholder="address" value={{$address->address_name}} required></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6"><input type="hidden" class="form-control" id="latitude" name="lat" placeholder="lat" value={{$address->lat}} required></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6"><input type="hidden" class="form-control" id="longitude" name="lng" placeholder="lng" value={{$address->lng}} required ></div>
                        </div>
                        <div id="map" style="height: 500px; width: 1000px; margin-left: -160px">
                            {{-- map --}}
                        </div>
                        <div class="mt-5 text-right"><button class="btn btn-primary profile-button" type="submit">Save Address</button></div>

                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection  {{-- End content --}}

@section('scripts')
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBBlemcFr6vRpyLIy3ZQMynX7fI4UXW38A"></script>
    <script type="text/javascript" src="js/googleMap.js"></script>
@endsection
