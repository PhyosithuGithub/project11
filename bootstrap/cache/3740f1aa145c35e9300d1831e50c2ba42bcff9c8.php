<div class="container-fluid bg-success">
    <nav class=" container navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="/">
            <img src="<?php echo URL_ROOT.'/assets/images/ec.jpg'; ?>" alt="Image" width="30px" height="30px" class="rounded">
            <span class="ml-2">Online Shop</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fa fa-list"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/admin">Admin</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/cart">
                <i class="fa fa-shopping-cart text-white"></i>
                <span class="badge badge-danger badge-pill" style="position:relative;top:-10px;left:-5px" id="cart-count">0</span>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php if(\App\Classes\Auth::check()): ?>
                  <?php echo e(\App\Classes\Auth::user()->user_name); ?>

                <?php else: ?>
                  Member
                <?php endif; ?>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <?php if(\App\Classes\Auth::check()): ?>
                  <a class="dropdown-item" href="/user/logout">Logout</a>
                <?php else: ?>
                  <a class="dropdown-item" href="/user/login">Login</a>
                  <a class="dropdown-item" href="/user/register">Register</a>
                <?php endif; ?>
                
                
              </div>
            </li>
          </ul>
        </div>
      </nav>
</div><?php /**PATH C:\xampp\htdocs\project1\resources\views/layout/navbar.blade.php ENDPATH**/ ?>