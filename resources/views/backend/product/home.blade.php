@extends("layout/master")
@section("title","Product Home")
@section("content")
    <div class="container my-3">
        <div class="row">
            <div class="col-md-3">
                @include("layout/admin_sidebar")
            </div>
            <div class="col-md-9">
                @if(\App\Classes\SessionManager::has("create_product_success"))
                    {{\App\Classes\SessionManager::flash("create_product_success")}}
                @endif
                @if(\App\Classes\SessionManager::has("delete_success"))
                    {{\App\Classes\SessionManager::flash("delete_success")}}
                @endif
                @if(\App\Classes\SessionManager::has("delete_fail"))
                 {{\App\Classes\SessionManager::flash("delete_fail")}}
                @endif
                {{-- Table Start --}}
                <table class="table table-bordered">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td><img src="{{$product->image}}" alt="Image" style="max-width:80px; max-height:100px;"></td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->price}}</td>
                                <td>
                                    <a href="/admin/product/{{$product->id}}/edit"><i class="fa fa-edit text-warning"></i></a>
                                    <a href="/admin/product/{{$product->id}}/delete"><i class="fa fa-trash text-danger ml-2"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- Table End --}}
                <div class="mt-3 offset-md-2">
                    {!!$pages!!}
                </div>
            </div>
        </div>
    </div>
@endsection