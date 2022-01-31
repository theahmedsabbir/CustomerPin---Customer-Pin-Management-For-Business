@extends('visitor.layouts.app')

@section('main_section')

<div class="container">
    <!-- Title -->
    <div class="hk-pg-header align-items-top">
        <div>
            <h2 class="hk-pg-title font-weight-600 mb-10">User Login</h2>
        </div>
    </div>
    <!-- /Title -->
    <!-- Row -->
    @include('messages')
    <div class="row">
        <div class="col-xl-12">
            <div class="hk-row">
            
                <div class="col-lg-12">
                    
                    <div class="card" style="border:none;">
                        <div class="card-body pa-0">
                            <form method="POST" action="{{ route('visitor.login') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="username" class="col-md-2 col-form-label">{{ __('Username') }}</label>

                                    <div class="col-md-6">
                                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-2 col-form-label">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8">
                                        <button type="submit" class="btn btn-primary pt-5">
                                            {{ __('Login') }}
                                        </button><br>

                                        @if (Route::has('visitor.password.request'))
                                            <a class="btn btn-link mt-4" style="padding-left: 0 !important;" href="{{ route('visitor.password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Row -->
</div>


@endsection
