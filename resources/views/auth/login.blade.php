@extends('apps/app')
@section('style')
<style>

    .bt-title {
        font-size: 12pt;
        font-weight: bold;
    }
    
    .bt-caption {
        font-size: 10pt;
    }
    
    input[type="text"],
    input[type="password"] {
        font-size: 12pt;
    }
    
    .btn {
        font-size: 12pt;
        background-color: #1d266c;
    }
    
    .card {
        border-top: 3px solid #1d266c;
    }
    </style>
@endsection
@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-10 col-sm-12 col-md-8 col-lg-6 col-xl-5 pt-5"> 
            <div class="card mt-5">
                <div class="card-body">
                    <h3 class="bt-title text-primary">Login</h3>
                    @if(session('msg'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {!!session('msg')!!}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate>
                        @csrf
                        <div class="form-group pb-1 mt-5">
                            <div class="form-check pl-0">
                                <label for="username" class="bt-caption">Username</label>
                                <input type="text" class="rounded form-control form-control-lg" name="username" id="username"
                                    placeholder="Username" required>
                                <div class="invalid-feedback">
                                    Username tidak boleh kosong
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check pl-0">
                                <label for="password" class="bt-caption">Password</label>
                                <input type="password" class="rounded form-control form-control-lg" name="password" id="password"
                                    placeholder="Password" required>
                                <div class="invalid-feedback">
                                    Password tidak boleh kosong
                                </div>
                            </div>

                        </div>
                        <button class="btn btn-block btn-lg mt-5 text-white" type="submit">Login</button>
                    </form>
                    <a href="{{url('/')}}" class="d-block text-center mt-3 bt-caption">&#8592; BERANDA</a>
                    <script>
                        // Example starter JavaScript for disabling form submissions if there are invalid fields
                        (function () {
                            'use strict';
                            window.addEventListener('load', function () {
                                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                var forms = document.getElementsByClassName('needs-validation');
                                // Loop over them and prevent submission
                                var validation = Array.prototype.filter.call(forms, function (form) {
                                    form.addEventListener('submit', function (event) {
                                        if (form.checkValidity() === false) {
                                            event.preventDefault();
                                            event.stopPropagation();
                                        }
                                        form.classList.add('was-validated');
                                    }, false);
                                });
                            }, false);
                        })();
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection