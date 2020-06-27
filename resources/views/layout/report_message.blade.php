@if(isset($errors))
    @foreach($errors as $error)
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{$error}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">x</span>
        </button>
    </div>
    @endforeach
@endif

@if(isset($success))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{$success}}</strong>
    <button class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">x</span>
    </button>
  </div>
@endif

<!-- Use this when render data or select data for view function -->