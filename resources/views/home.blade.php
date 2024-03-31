@extends('layouts.app')
@extends('layouts.nav')
@extends('layouts.footer')
@section('content')
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status')->message('dang nhap thanh cong') }}
            </div>
        @endif

        <div class="hero">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-5">
                        <div class="intro-excerpt">
                            <h1>Modern Interior <span clsas="d-block">Design Studio</span></h1>
                            <p class="mb-4">Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam
                                vulputate velit imperdiet dolor tempor tristique.</p>
                            <p><a href="" class="btn btn-secondary me-2">Shop Now</a><a href="#"
                                    class="btn btn-white-outline">Explore</a></p>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="hero-img-wrap">
                            <img src="{{ asset('./FE/images/couch.png') }}" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection
