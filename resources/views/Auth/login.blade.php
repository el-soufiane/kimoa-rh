@extends('form')

@section('content')
<section class="ftco-section" style="background-image: url('dashboard-form/images/auth-bg.jpg'); background-size: cover; background-position: center;">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="wrap d-md-flex">
                    <div class="img" style="background-image: url(dashboard-form/images/kimoasoft-connect.jpg);">
                    </div>
                    <div class="login-wrap p-4 p-md-5">
                        <div class="d-flex">
                            <div class="w-100">
                                <h3 class="mb-4">Connexion</h3>
                            </div>
                            <div class="w-100">
                                <p class="social-media d-flex justify-content-end">
                                    <a href="#" class="social-icon d-flex align-items-center justify-content-center">
                                        <span class="fa fa-facebook"></span>
                                    </a>
                                    <a href="#" class="social-icon d-flex align-items-center justify-content-center">
                                        <span class="fa fa-twitter"></span>
                                    </a>
                                </p>
                            </div>
                        </div>
                        <form action="{{ route('auth.login') }}" method="POST" class="signin-form">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="label" for="email">Identifiant</label>
                                <input type="email" id="email" name="email" placeholder="name@example.com"  class="form-control" value="{{ old('email') }}" required >
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="label" for="password">Mot de passe</label>
                                <input type="password" id="password" name="password" class="form-control" required>
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary rounded submit px-3">Se connecter</button>
                            </div>
                        </form>
                        <p class="text-center">KIMOASOFT</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
