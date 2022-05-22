@extends('includes.admin')

@section('title')
    Admin Home
@endsection

@section('style')
    <link rel="stylesheet" href="css/admin/adminIndex.css">
    <script src="https://kit.fontawesome.com/0b7794023b.js" crossorigin="anonymous"></script>
@endsection

@section('content')

    <div class="con_info1">
        <br />
        <h1 style="padding-left: 20px;">Users</h1>

        <br />
        <i class="fas fa-user fa-2x" style="margin-left: 230px;"></i>
        <h1 style="padding-left: 20px;">{{$users}}</h1>
    </div>

    <div class="con_info2">
        <br />
        <h1 style="padding-left: 20px;">Items</h1>

        <br />
        <i class="fas fa-shopping-bag fa-2x" style="margin-left: 230px;"></i>
        <h1 style="padding-left: 20px;">{{$items}}</h1>
    </div>
    <div class="con_info3">
        <br />
        <h1 style="padding-left: 20px;">Orders</h1>
        <br />

        <i class="fas fa-file fa-2x" style="margin-left: 230px;"></i>
        <h1 style="padding-left: 20px;">{{$orders}}</h1>
    </div>
    {{-- <div class="con_info4">
        <br />

        <h1 style="padding-left: 20px;">Revenue</h1>
        <br />

        <i class="fas fa-money-bill fa-2x" style="margin-left: 230px;"></i>
        <h1 style="padding-left: 20px;">3000 $</h1>
    </div> --}}

@endsection  {{-- End content --}}

@section('scripts')
    
@endsection
