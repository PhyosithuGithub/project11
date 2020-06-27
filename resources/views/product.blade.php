@extends("layout/master")
@section("title","Product Detail")
@section("content")
    <div class="container my-3">
        {{-- Product Detail Start --}}
        <h3 class="text-primary">Product Details</h3>
        <div class="jumbotron rounded-0">
            <div class="row">
                <div class="col-md-3">
                    <img src="{{$product->image}}" alt="Img" width="250px" height="280px">
                </div>
                <div class="col-md-9">
                    <h3 class="text-info">{{$product->name}}</h3>
                    <p>{{$product->description}}</p>
                        <button class="btn btn-info btn-sm rounded-0">$ {{$product->price}}</button>
                        <button class="btn btn-warning btn-sm rounded-0 ml-2">Add To Cart</button>
                        <h3 class="mt-2 text-danger">The Special Offer will be due in</h3>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                        </div>
                    <div class="mt-3">
                        <span>
                            Rate:
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star-half text-warning"></i>
                            <i class="fa fa-star text-light"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        {{-- Product Detail End  --}}
       
    </div>
@endsection