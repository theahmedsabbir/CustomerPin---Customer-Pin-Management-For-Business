@extends('visitor.layouts.app')

@section('main_section')

<div class="container">
    <!-- Title -->
    <div class="hk-pg-header align-items-top">
        <div>
            <h2 class="hk-pg-title font-weight-600 mb-10">User Password Reset</h2>
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
		                    @if (session('status'))
		                        <div class="alert alert-success" role="alert">
		                            {{ session('status') }}
		                        </div>
		                    @endif

		                    <form method="POST" action="{{ route('visitor.password.email') }}">
		                        @csrf

		                        <div class="form-group row">
		                            <label for="email" class="col-md-2 col-form-label">{{ __('E-Mail Address') }}</label>

		                            <div class="col-md-6">
		                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

		                                @error('email')
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong>{{ $message }}</strong>
		                                    </span>
		                                @enderror
		                            </div>
		                        </div>

		                        <div class="form-group row mb-0">
		                            <div class="col-md-6 offset-md-2">
		                                <button type="submit" class="btn btn-primary">
		                                    {{ __('Send Password Reset Link') }}
		                                </button>
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



