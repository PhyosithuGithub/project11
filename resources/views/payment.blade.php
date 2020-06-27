@extends("layout/master");
@section("title","Payment")
@section("content")
<div class="container my-5">
    <h1 class="text-success bm-font-45">Your Payment is successfully!</h1>
    <a href="/">Back to Home</a>
</div>
@endsection

@section("script")
<script>
    localStorage.removeItem("products");
    localStorage.removeItem("items");
</script>
@endsection