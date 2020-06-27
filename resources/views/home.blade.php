@extends("layout/master")
@section("title","Triple P")
@section("content")
    <div class="container my-3">
        {{-- Feature Start --}}
        <h3 class="text-primary">Featured</h3>
        <div class="row">
            @foreach($featured as $product)
            <div class="col-md-3">
                <div class="card mb-2 rounded-0">
                    <div class="card-header text-center">{{$product->name}}</div>
                    <div class="card-body">
                        <img src="{{$product->image}}" alt="Image" width="100px" height="120px">
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-between">
                            <a href="/product/{{$product->id}}/detail" class="btn btn-info btn-sm">
                                <i class="fa fa-eye"></i>
                            </a>
                            <span>${{$product->price}}</span>
                            <button class="btn btn-warning btn-sm" onclick="addToCart({{$product->id}})">
                                <i class="fa fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{-- Featured End  --}}
        <hr/>
        {{-- Most Popular Start --}}
        <h3 class="text-primary">Most Popular</h3>
        <div class="row">
            @foreach($products as $product)
            <div class="col-md-3">
                <div class="card mb-2 rounded-0">
                    <div class="card-header text-center">{{$product->name}}</div>
                    <div class="card-body">
                        <img src="{{$product->image}}" alt="Image" width="100px" height="120px">
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-between">
                            <a href="/product/{{$product->id}}/detail" class="btn btn-info btn-sm">
                                <i class="fa fa-eye"></i>
                            </a>
                            <span>${{$product->price}}</span>
                            <button class="btn btn-warning btn-sm" onclick="addToCart({{$product->id}})">
                                <i class="fa fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row justify-content-center">
            {!!$pages!!}
        </div>
        {{-- Most Popular End  --}}
    </div>
@endsection