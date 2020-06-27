@extends("layout/master")
@section("title","Login Form")
@section("content")

<div class="container my-3">
    <div class="col-md-8 offset-md-2">
        <h3 class="text-info text-center mb-4">User Login</h3>
        @if(\App\Classes\SessionManager::has("success_message"))
            {{\App\Classes\SessionManager::flash("success_message")}}
        @endif
        @if(\App\Classes\SessionManager::has("error_message"))
            {{\App\Classes\SessionManager::flash("error_message")}}
        @endif
        <form action="/user/login" method="POST">
            <input type="hidden" name="token" value="{{\App\Classes\CSRFToken::_token()}}">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control rounded-0" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control rounded-0" name="password" id="password" required>
            </div>
            <div class="row justify-content-between no-gutters">
                <strong class="text-muted">Don't have an account? <a href="/user/register">Please Sign up!</a></strong>
                <span>
                    <button type="reset" class="btn btn-outline-primary btn-sm">Cancel</button>
                    <button type="submit" class="btn btn-primary btn-sm">Login</button>
                </span>
            </div>
        </form>
    </div>
</div>
@endsection