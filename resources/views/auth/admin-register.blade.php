@extends('layouts.admin-app')
@section('page_title')
    {{ "Admin Registration" }}
@stop

@section('content')
<div class="row">
    <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
        <form class="form" method="POST" action="{{ route('admin.register.submit') }}" enctype="multipart/form-data">
        @csrf
            <div class="card card-login card-hidden">
                <div class="card-header card-header-rose text-center">
                    <h4 class="card-title">Register</h4>
                    <div class="social-line">
                        <a href="#" class="btn btn-just-icon btn-link btn-white"><i class="fa fa-facebook-square"></i></a>
                        <a href="#" class="btn btn-just-icon btn-link btn-white"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="btn btn-just-icon btn-link btn-white"><i class="fa fa-google-plus"></i></a>
                    </div>
                </div>
                <div class="card-body ">
                    <p class="card-description text-center">Or Be Classical</p>
                    <span class="bmd-form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="material-icons">face</i></span>
                            </div>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Username..." name="name" value="{{ old('name') }}" required autocomplete="name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </span>
                    <br>
                    <span class="bmd-form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="material-icons">email</i></span>
                            </div>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email..." name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </span>
                    <br>
                    <span class="bmd-form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="material-icons">lock_outline</i></span>
                            </div>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password..." name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </span>
                    <br>
                    <span class="bmd-form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="material-icons">lock_outline</i></span>
                            </div>
                            <input type="password" class="form-control" placeholder="Confirm Password..." name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </span>
                    <br>
                    <span class="bmd-form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="material-icons">add_a_photo</i></span>
                            </div>
                            <input type="file" class="form-control" name="avatar" id="avatar" required>
                        </div>
                    </span>
                </div>
                <div class="card-footer justify-content-center">
                    <button class="btn btn-rose btn-link btn-lg" type="submit">Lets Go</button>
                </div>
            </div>
        </form>
    </div>
</div>
@stop