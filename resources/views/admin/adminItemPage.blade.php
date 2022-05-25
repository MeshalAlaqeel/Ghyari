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

    <div class="container12">
        <h2>Edit Item</h2>
        <form action="{{route('editItem')}}" method="post" class="">
            @csrf
            <input type="hidden" name="itemId" value="{{$item->id}}">
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
                    <label for="Company">Item Company</label>
                </div>
                <div class="col-75">
                    <select id="Company" name="company_name" value="{{$item->company_name}}" >
                        <option value="Chevorlet">Chevorlet</option>
                        <option value="Dodge">Dodge</option>
                        <option value="Ford">Ford</option>
                        <option value="Toyota">Toyota</option>
                    </select>
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-25">
                    <label for="chassis_number">Chassis number</label>
                </div>
                <div class="col-75">
                    <input type="text" id="chassis_number" name="chassis_number" placeholder="chassis number.." value={{$item->chassis_number}} required/>
                </div>
            </div> --}}
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
                    <label for="Category">Item Category</label>
                </div>
                <div class="col-75">
                    <select id="Category" name="category" value="{{$item->category}}">
                        <option value="Engine parts">Engine parts</option>
                        <option value="Brakes">Brakes</option>
                        <option value="Suspensions">Suspensions</option>
                        <option value="Body parts">Body parts</option>
                        <option value="Oils and Filters">Oils and Filters</option>
                        <option value="Lighting">Lighting</option>
                        <option value="Cooling system">Cooling system</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="Quantity">Item Quantity</label>
                </div>
                <div class="col-75">
                    <input type="text" id="Quantity" name="quantity" placeholder="Quantity.." value="{{$item->quantity}}" required/>
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
                    {{-- <textarea id="Description" name="description" placeholder="Write Description.." style="height: 200px;" value={{$item->description}} required></textarea> --}}
                    <input type="text" id="Description" name="description" placeholder="Write Description.." style="height: 200px;" value="{{$item->description}}" required>
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
        <form action="{{route('deleteComment')}}" method="post" class="modal-content">
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
