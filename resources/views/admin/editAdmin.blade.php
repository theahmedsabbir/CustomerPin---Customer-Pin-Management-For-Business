@extends('admin.layouts.app')

@section('main_section')

<div class="container">
    <!-- Title -->
    <div class="hk-pg-header align-items-top">
        <div>
            <h2 class="hk-pg-title font-weight-600 mb-10">Change Info</h2>
            <p class="text-danger">If you don't want to change password, keep the password fields empty</p>
        </div>
    </div>
    <!-- /Title -->
    <!-- Row -->
    <div class="row">
        <div class="col-xl-12">
        	@include('messages')
            <div class="hk-row">
            
                <div class="col-lg-6">

                    <form action="{{ route('admin.updateAdmin') }}" method="POST">
                    	@csrf
                    	

                    	<div class="form-group">
                    		<label for="">Email</label>
                    		<input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}" required>
                    	</div>
                    	

                    	<div class="form-group">
                    		<label for="">Old Password</label>
                    		<input type="password" name="old_password" class="form-control">
                    	</div>
                    	

                    	<div class="form-group">
                    		<label for="">Password</label>
                    		<input type="password" name="password" class="form-control">
                    	</div>
                    	

                    	<div class="form-group">
                    		<label for="">Confirm Password</label>
                    		<input type="password" name="c_password" class="form-control">
                    	</div>
                    	

                    	<div class="form-group">
                    		<input type="submit" value="Submit" class="btn btn-primary">
                    	</div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Row -->
</div>


@endsection
