@extends("layout/master")
@section("title","Create Product")
@section("content")
    <div class="container my-3">
        <div class="row">
            <div class="col-md-3">
                @include("layout/admin_sidebar")
            </div>
            <div class="col-md-9">
                @include("layout/report_message")
                {{-- Form Start --}}
                <form action="/admin/product/create" class="table-bordered pb-5 px-5" method="POST" enctype="multipart/form-data">
                    <h3 class="text-center my-4 text-info">Create Product</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name"> Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Product Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" step="any" class="form-control" id="price" name="price">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cat_id">Category</label>
                                <select name="cat_id" id="cat_id" class="form-control">
                                    @foreach($cats as $cat)
                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sub_cat_id">Sub Category</label>
                                <select name="sub_cat_id" id="sub_cat_id" class="form-control">
                                    @foreach($sub_cats as $sub_cat)
                                        <option value="{{$sub_cat->id}}">{{$sub_cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="file">Image</label>
                        <input type="file" class="form-control-file bg-dark text-white" id="file" name="file">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" rows="4" class="form-control"></textarea>
                    </div>
                    <input type="hidden" name="token" value="{{\App\Classes\CSRFToken::_token()}}">
                    <div class="row justify-content-end no-gutters">
                        <button type="reset" class="btn btn-outline-primary btn-sm">Cancel</button>
                        <button type="submit" class="btn btn-primary btn-sm ml-3">Create</button>
                    </div>
                </form>
                {{-- Form End --}}
            </div>
        </div>
    </div>
@endsection