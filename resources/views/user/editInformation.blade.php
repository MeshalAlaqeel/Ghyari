@extends('includes.master')

@section('title')
    Edit Information
@endsection

@section('style')
    <link rel="stylesheet" href="css/user/editInformation.css">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" /> --}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://kit.fontawesome.com/0b7794023b.js" crossorigin="anonymous"></script>
@endsection

@section('content')

    <div class="message">
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="color: red">{{$error}}</li>
                @endforeach
            </ul>
        @endif

        @if (session()->has('success'))
            <div class="green-Messages">{{session()->get('success')}}</div>
        @endif
        @if (session()->has('fail'))
            <div class="red-Messages">{{session()->get('fail')}}</div>
        @endif
    </div>

    <div class="center11">
        <h1>Edit Your Account</h1>
        <form action="{{route('editInformation')}}" method="post">
            @csrf
            <div class="txt_field">
                <input type="text" class="form-control" name="username" placeholder="username" value={{$user->username }} required>
                <span></span>
                <label>Change Username</label>
            </div>

            <div class="txt_field">
                <input type="text" class="form-control" name="email" placeholder="Email" value={{$user->email}} required>
                <span></span>
                <label>Change Email</label>
            </div>

            <div class="txt_field">
                <input type="text" class="form-control" name="phone_number" placeholder="Phone number" value={{$user->phone_number}} >
                <span></span>
                <label> Change Phone Number</label>
            </div>

            <br />
            <input type="submit" value="Save Profile" />
        </form>

        <form action="{{route('address')}}" method="post">
            @csrf
            <!----------------------here the location will show in writing after the user mark it--------------------------->
            <h1>Mark Your Address</h1>
            <br>
            <h4>Your location is: </h4>

            
            @if (!empty($address))
                <div class="txt_field">
                    <input type="text" class="form-control" id="address" name="name" placeholder="address" value={{$address->address_name}} required>
                    <div class="txt_field" id="map" style="width: 100%; height: 400px; border-radius: 10px;"></div>
                    <input type="hidden" class="form-control" id="latitude" name="lat" placeholder="lat" value={{$address->lat}} required>
                    <input type="hidden" class="form-control" id="longitude" name="lng" placeholder="lng" value={{$address->lng }} required >
                    <input type="submit" value="Update Your Address" />
                </div>
            @else
                <div class="txt_field">
                    <input type="hidden" class="form-control" id="address" name="name" placeholder="address" value="" required>
                    <div class="txt_field" id="map" style="width: 100%; height: 400px; border-radius: 10px;"></div>
                    <input type="hidden" class="form-control" id="latitude" name="lat" placeholder="lat" value="" required>
                    <input type="hidden" class="form-control" id="longitude" name="lng" placeholder="lng" value="" required >
                    <input type="submit" value="Save Address" />
                </div>
            @endif
            
        </form>


        <div class="txt_field">
            <button class="popUp-btn" onclick="document.getElementById('id01').style.display='block'">Delete My Account <i class="fa fa-trash"></i></button>
        </div>
    </div>

    <!--------------------------Pop up message for deletinig user account---------------------------->
    <div id="id01" class="modal">
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
        <form class="modal-content" action="/action_page.php">
            <div class="container5656">
                <h1>Delete Account</h1>
                <p>Are you sure you want to delete your account?</p>

                <div class="clearfix">
                    <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>

                    <form action="{{route('deleteAccount')}}" method="post">
                        @csrf
                        <input type="hidden" name="email" value="{{$user->email }}">
                        <button type="submit" onclick="document.getElementById('id01').style.display='none'" class="deletebtn">Delete</button>
                    </form>
                </div>
            </div>
        </form>
    </div>


@endsection  {{-- End content --}}

@section('scripts')
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBBlemcFr6vRpyLIy3ZQMynX7fI4UXW38A"></script>
    <script type="text/javascript" src="js/googleMap.js"></script>
    <script>
        var modal = document.getElementById("id01");

        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        };
    </script>
@endsection
