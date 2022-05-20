@extends('includes.admin')

@section('title')
    Admin Home
@endsection

@section('style')
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" /> --}}
    <link rel="stylesheet" href="css/admin/addItem.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
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

    <div class="container12">
        <h2>Add Item</h2>
        <form action="{{route('addItem')}}" method="post" class="">
            @csrf
            <div class="row">
                <div class="col-25">
                    <label for="name">Item Name</label>
                </div>
                <div class="col-75">
                    <input type="text" id="name" name="name" placeholder="Name.." required/>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="Company">Item Company</label>
                </div>
                <div class="col-75">
                    <select id="Company" name="company_name" >
                        <option value="ford">Ford</option>
                        <option value="">----</option>
                        <option value="">----</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="chassis_number">Chassis number</label>
                </div>
                <div class="col-75">
                    <input type="text" id="chassis_number" name="chassis_number" placeholder="chassis number.." required/>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="Price">Item Price</label>
                </div>
                <div class="col-75">
                    <input type="text" id="Price" name="price" placeholder="Price.." required/>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="Category">Item Category</label>
                </div>
                <div class="col-75">
                    <select id="Category" name="category">
                        <option value="oil">Oil</option>
                        <option value="">----</option>
                        <option value="">----</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="Quantity">Item Quantity</label>
                </div>
                <div class="col-75">
                    <input type="text" id="Quantity" name="quantity" placeholder="Quantity.." required/>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="ItemPho">Item image</label>
                </div>
                <div class="col-75">
                    <input type="file" id="ItemPho" name="image" required/>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="Description">Description</label>
                </div>
                <div class="col-75">
                    <textarea id="Description" name="description" placeholder="Write Description.." style="height: 200px;" required></textarea>
                </div>
            </div>

            <br />
            <div class="row">
                <input type="Submit" value="Add Item" />
            </div>
        </form>
    </div>
@endsection  {{-- End content --}}

@section('scripts')
    
@endsection
