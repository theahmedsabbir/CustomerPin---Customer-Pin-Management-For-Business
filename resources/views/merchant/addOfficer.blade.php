@extends('merchant.layouts.app')

@section('main_section')

<div class="container">
    <!-- Title -->
    <div class="hk-pg-header align-items-top">
        <div>
            <h2 class="hk-pg-title font-weight-600 mb-10">Add Officer</h2>
        </div>
    </div>
    <!-- /Title -->
    <!-- Row -->
    <div class="row">
        <div class="col-xl-12">
        	@include('messages')
            <div class="hk-row">
            
                <div class="col-lg-6">

                    <form action="{{ route('merchant.storeOfficer') }}" method="POST">
                    	@csrf
                    	

                    	<div class="form-group">
                    		<label for="">Username</label>
                    		<input type="text" name="username" class="form-control" required>
                    	</div>
                    	

                    	<div class="form-group">
                    		<label for="">Password</label>
                    		<input type="password" name="password" class="form-control" required>
                    	</div>
                    	

                    	<div class="form-group">
                    		<label for="">Confirm Password</label>
                    		<input type="password" name="c_password" class="form-control" required>
                    	</div>
                    	

                    	<div class="form-group">
                    		<label for="">Name</label>
                    		<input type="text" name="name" class="form-control">
                    	</div>
                    	

                    	<div class="form-group">
                    		<label for="">Email</label>
                    		<input type="email" name="email" class="form-control" required>
                    	</div>
                    	

                    	<div class="form-group">
                    		<label for="">Phone</label>
                    		<input type="text" name="phone" class="form-control" required>
                    	</div>
                    	

                    	<div class="form-group">
                    		<label for="">Confirm Phone</label>
                    		<input type="text" name="c_phone" class="form-control" required>
                    	</div>
                    	

                    	<div class="form-group">
                    		<label for="">Address</label>
                    		<textarea name="address" id="" cols="30" rows="3" class="form-control"></textarea>
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
