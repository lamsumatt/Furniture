<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="index.html" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                <div
                    class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                </div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">Jhon Doe</h6>
                <span>Admin</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="{{ asset('/admincp/dashboard') }}" class="nav-item nav-link active"><i
                    class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <div class="nav-item dropdown">
                <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="fa fa-laptop me-2"></i>Product</a>
                <div class="dropdown-menu bg-transparent border-0">

                    <a href="{{ route('product-admin.create') }}" class="dropdown-item">Add Products</a>
                    <a href="{{ route('product-admin.index') }}" class="dropdown-item">List Products</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="fa fa-laptop me-2"></i>Product details</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ route('product-details-admin.create') }}" class="dropdown-item">Add Products</a>
                    <a href="{{ route('product-details-admin.index') }}" class="dropdown-item">List Products</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="fa fa-laptop me-2"></i>Blog</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ route('blog-admin.create') }}" class="dropdown-item">Add blogs</a>
                    <a href="{{ route('blog-admin.index') }}" class="dropdown-item">List blogs</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="far fa-file-alt me-2"></i>Others</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ asset('/login') }}" class="dropdown-item">Sign In</a>
                    <a href="signup.html" class="dropdown-item">Sign Up</a>
                </div>
            </div>
        </div>
    </nav>
</div>
