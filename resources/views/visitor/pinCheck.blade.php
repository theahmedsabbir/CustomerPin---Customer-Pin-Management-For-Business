@extends('visitor.layouts.app')

@section('main_section')

<div class="container">
    <!-- Title -->
    <div class="hk-pg-header align-items-top">
        <div>
            <h2 class="hk-pg-title font-weight-600 mb-10">Check Pin</h2>
        </div>
    </div>
    <!-- /Title -->
    <!-- Row -->
    <div class="row">
        <div class="col-xl-12">
        	@include('messages')
            <div class="hk-row">
            
                <div class="col-lg-6">

                    <form action="{{ route('visitor.pinInfo') }}" method="POST">
                    	@csrf
                    	

                    	<div class="form-group">
                    		<label for="">Please Enter PIN Below</label>
                    		<input type="text" name="pin" class="form-control">
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
