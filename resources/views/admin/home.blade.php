@extends('admin.main')
<link rel="stylesheet" href="/template/admin/dist/css/admin.css">

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-md-6 col-lg-4 mb-4" style="margin-left: 100px;">
                    <div class=" card shadow-lg border-warning h-100">
                        <div class="card-header bg-warning text-white">
                            <h3 class="card-title">Total Products</h3>
                        </div>
                        <div class="card-body d-flex flex-column  align-items-center">
                            <img src="/template/admin/dist/img/product_illus.jpg" alt="product icon" class="img-fluid mb-3 rounded-circle">
                            <h2 class="text-success mt-auto"><strong>{{ $totalProducts }}</strong></h2>
                            <p class="text-muted">Total number of products in the system.</p>
                            <a href="{{ route('product_list') }}" class="btn-warning mt-3">View Details</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 mb-4" style="margin-left: 100px;">
                    <div class="card shadow-lg border-warning h-100">
                        <div class="card-header bg-warning text-white">
                            <h3 class="card-title">Total Users</h3>
                        </div>
                        <div class="card-body d-flex flex-column  align-items-center">
                            <img src="/template/admin/dist/img/user_illus.png" alt="user icon" class="img-fluid mb-3 rounded-circle">
                            <h2 class="text-info mt-auto"><strong>{{ $totalUsers }}</strong></h2>
                            <p class="text-muted">Total number of users in the system.</p>
                            <a href="{{ route('admin.users.users.list') }}" class="btn-warning mt-3">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
