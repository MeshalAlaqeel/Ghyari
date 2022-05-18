@extends('includes.admin')

@section('title')
    Admin Home
@endsection

@section('style')
    <link rel="stylesheet" href="../css/admin/adminEditItemPage.css">
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
{{-- {{-- 
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

        <form action="{{route('editItem')}}" method="post" class="">
            @csrf
            <div class="container rounded bg-white mt-5">
                <div class="row">
                    <div class="col-md-8">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="d-flex flex-row align-items-center back"><i class="fa fa-long-arrow-left mr-1 mb-1"></i>
                                    <h6>Back to home</h6>
                                </div>
                                <h6 class="text-right">Edit Item</h6>
                            </div>
                            <input type="hidden" name="itemId" value={{$item->id}}>
                            <div class="row mt-2">
                                <div class="col-md-6"><input type="text" class="form-control" name="name" placeholder="Name" value="{{$item->name}}" required></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6"><input type="text" class="form-control" name="price" placeholder="Price" value="{{$item->price}}" required></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6"><input type="text" class="form-control" name="category" placeholder="Category" value="{{$item->category}}" ></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6"><input type="text" class="form-control" name="quantity" placeholder="Quantity" value="{{$item->quantity}}" ></div>
                            </div>
                            <div class="row mt-3">
                                <img src="/image/{{$item->image}}" alt="" style="height: 50px; width:50px;"><div class="col-md-6"><input type="file" class="form-control" name="image" placeholder="Image" value="" ></div>
                            </div>
                            <div class="mt-5 text-right"><button class="btn btn-primary profile-button" type="submit">Save Item</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <form action="{{route('deleteItem')}}" method="post" class="">
            @csrf
            <input type="hidden" name="id" value="{{$item->id }}">
            <div class="container rounded bg-white mt-5">
                <div class="row">
                    <h4>Delete Your Account</h4>
                    <div class="col-md-8">
                        <div class="p-3 py-5">
                            <div class="mt-5 text-right"><button class="btn btn-primary profile-button" type="submit">Delete Item</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="container rounded bg-white mt-5" style="margin-bottom: 30px;">
            <div class="row">
                @if ($comments && count($comments) > 0 )
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>USER ID</td>
                                <td>ITEM ID</td>
                                <td>COMMENT</td>
                                <td>CREATED_AT</td>
                                <td>DELETE</td>
                            </tr>
                            @foreach ($comments as $comment)
                                <tr>
                                    <td>{{$comment->user_id }}<br/></td>
                                    <td>{{$comment->item_id }}<br/></td>
                                    <td>{{$comment->comment }}<br/></td>
                                    <td>{{$comment->created_at }}<br/></td>
                                    <td>
                                        <form action="{{route('deleteComment')}}" method="POST" >
                                            @csrf
                                            <input type="hidden" name="id" value="{{$comment->id }}">
                                            <input type="submit" value="Delete" name="deleteComment" class="dlt_btn" style="width:100px;">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <h3 style="margin-top: -60px"> {{ "NO Comments" }} </h3>
                @endif
            </div>
        </div>
        
        

    </div> end main --}}

    <div class="container12">
        <h2>Edit Item</h2>
        <form action="{{route('editItem')}}" method="post" class="">
            @csrf
            <input type="hidden" name="itemId" value={{$item->id}}>
            <div class="row">
                <div class="col-25">
                    <label for="name">Item Name</label>
                </div>
                <div class="col-75">
                    <input type="text" id="name" name="name" placeholder="Name.." value="{{$item->name}}" required/>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="Price">Item Price</label>
                </div>
                <div class="col-75">
                    <input type="text" id="Price" name="price" placeholder="Price.." value="{{$item->price}}" required/>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="Quantity">Item Quantity</label>
                </div>
                <div class="col-75">
                    <input type="text" id="Quantity" name="quantity" placeholder="Quantity.." value="{{$item->quantity}}"/>
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
                    <select id="Category" name="category" value="{{$item->category}}" >
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
                    {{-- <img src="/image/{{$item->image}}" alt=""> --}}
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
                <input type="Submit" value="Save Item" />
            </div>
        </form>
    </div>
    <div class="container12">
        <h2>Delete Item</h2>
        <br />
        <input type="Submit" onclick="document.getElementById('id01').style.display='block'" value="deleteItem " />
    </div>
    <br />
    
    <div class="container12">
        <h2>Comments</h2>
        <br />
    
        <div class="row">
            @if ($comments && count($comments) > 0 )
                <table class="table">
                    <tbody>
                        <tr>
                            <td>USER ID</td>
                            <td>ITEM ID</td>
                            <td>COMMENT</td>
                            <td>CREATED_AT</td>
                            <td>DELETE</td>
                        </tr>
                        @foreach ($comments as $comment)
                            <tr>
                                <td>{{$comment->user_id }}<br/></td>
                                <td>{{$comment->item_id }}<br/></td>
                                <td>{{$comment->comment }}<br/></td>
                                <td>{{$comment->created_at }}<br/></td>
                                <td>
                                    <input type="Submit" onclick="document.getElementById('id01').style.display='block'" value="deleteComment " />
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h3 style=""> {{ "NO Comments" }} </h3>
            @endif
        </div>
    </div>
    
    <!--------------------------Pop up message for deletinig user account---------------------------->
    <div id="id01" class="modal">
        <span onclick="document.getElementById('id01').style.display='none'" class="closee" title="closee Modal">×</span>
        <form action="{{route('deleteItem')}}" method="post" class="modal-content">
            @csrf
            <input type="hidden" name="id" value="{{$item->id }}" />
            <div class="containerr">
                <h1>Delete</h1>
                <p>Are you sure you want to delete ? </p>
    
                <div class="clearfix">
                    <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                    <button type="submit" onclick="document.getElementById('id01').style.display='none'" class="deletebtn">Delete</button>
                </div>
            </div>
        </form>
    </div>
    

@endsection  {{-- End content --}}

@section('scripts')
    
@endsection
