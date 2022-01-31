@extends('merchant.layouts.app')

@section('main_section')

<div class="container">

	<script type="text/javascript">
	    function selectText(containerid) {
	        if (document.selection) {
	            var range = document.body.createTextRange();
	            range.moveToElementText(document.getElementById(containerid));
	            range.select();
	        } else if (window.getSelection) {
	            var range = document.createRange();
	            range.selectNode(document.getElementById(containerid));
	            window.getSelection().addRange(range);
	        }
	    }
	</script>
    <!-- Title -->
    <div class="hk-pg-header align-items-top">
        <div>
            <h2 class="hk-pg-title font-weight-600 mb-10">Generate Pin</h2>
        </div>
    </div>
    <!-- /Title -->
    <!-- Row -->
    <div class="row">
        <div class="col-xl-12">
        	@include('messages')
            <div class="hk-row">
            
                <div class="col-lg-6">

                    <form action="{{ route('merchant.pinStore') }}" method="POST">
                    	@csrf
                    	

                    	<div class="form-group">
                    		<label for="">PIN Class</label>
                    		<select name="class" id="" class="form-control" required>
                    			<option value="1">Class 1</option>
                    			<option value="2">Class 2</option>
                    			<option value="3">Class 3</option>
                    			<option value="4">Class 4</option>
                    			<option value="5">Class 5</option>
                    			<option value="6">Class 6</option>
                    			<option value="7">Class 7</option>
                    			<option value="8">Class 8</option>
                    			<option value="9">Class 9</option>
                    			<option value="10">Class 10</option>
                    		</select>
                    	</div>
                    	

                    	<div class="form-group">
                    		<label for="">No. of PINs</label>
                    		<input type="text" name="pin_no" class="form-control" required>
                    	</div>                   	
                    	

                    	<div class="form-group">
                    		<input type="submit" value="Generate" class="btn btn-primary">
                    	</div>

                    </form>               	
          
	      
			          <div  id="selectable" onclick="selectText('selectable')">
			            @php
			               if(isset($_GET['pinDisplay'])){
			               		echo $_GET['pinDisplay'];
			               	}
			            @endphp            
			          </div>

                </div>
            </div>
        </div>
    </div>
    <!-- /Row -->
</div>


@endsection
