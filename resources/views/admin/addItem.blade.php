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


    <div id="main">

{{-- 
        
        <form action="{{route('addItem')}}" method="post" class="">
            @csrf
            <div class="container rounded bg-white mt-5">
                <div class="row">
                    <div class="col-md-8">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="d-flex flex-row align-items-center back"><i class="fa fa-long-arrow-left mr-1 mb-1"></i>
                                    <h6>Back to home</h6>
                                </div>
                                <h6 class="text-right">Add Item</h6>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6"><input type="text" class="form-control" name="name" placeholder="Name" value="" required></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6"><input type="text" class="form-control" name="price" placeholder="Price" value="" required></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6"><input type="text" class="form-control" name="category" placeholder="Category" value="" ></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6"><input type="text" class="form-control" name="quantity" placeholder="Quantity" value="" ></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6"><input type="file" class="form-control" name="image" placeholder="Image" value="" ></div>
                            </div>
                            <div class="mt-5 text-right"><button class="btn btn-primary profile-button" type="submit">Add Item</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </form> --}}

    </div> {{-- end main --}}


    <div class="container12">
        <h2>Add Item</h2>
        <form action="{{route('addItem')}}" method="post" class="">
            @csrf
            <div class="row">
                <div class="col-25">
                    <label for="name">Item Name</label>
                </div>
                <div class="col-75">
                    <input type="text" id="name" name="name" placeholder="Name.." />
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="Price">Item Price</label>
                </div>
                <div class="col-75">
                    <input type="text" id="Price" name="price" placeholder="Price.." />
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="Quantity">Item Quantity</label>
                </div>
                <div class="col-75">
                    <input type="text" id="Quantity" name="quantity" placeholder="Quantity.." />
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="ChassisNumber">Item Chassis Number </label>
                </div>
                <div class="col-75">
                    <input type="text" id="ChassisNumber" name="chassisNumber" placeholder="Chassis Number.." />
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
                    <label for="Company">Item Company</label>
                </div>
                <div class="col-75">
                    <select id="Company" name="Company">
                        <option value="ford">Ford</option>
                        <option value="">----</option>
                        <option value="">----</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="ItemPho">Item Photo</label>
                </div>
                <div class="col-75">
                    <input type="file" id="ItemPho" name="image" />
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="Description">Description</label>
                </div>
                <div class="col-75">
                    <textarea id="Description" name="description" placeholder="Write Description.." style="height: 200px;"></textarea>
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
