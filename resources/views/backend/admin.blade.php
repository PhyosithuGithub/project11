@extends("layout/master")
@section("title","Admin Panel")
@section("content")
<div class="container my-3">
    <div class="row">
        <div class="col-md-3">
            @include("layout/admin_sidebar")
        </div>
        <div class="col-md-9">
            <h1>Welcome to Admin Panel</h1>
        </div>
    </div>
</div>
@endsection