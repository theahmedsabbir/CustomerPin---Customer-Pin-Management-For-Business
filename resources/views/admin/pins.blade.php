@extends('admin.layouts.app')

@section('main_section')

<div class="container">
    <!-- Title -->
    <div class="hk-pg-header align-items-top">
        <div>
            <h2 class="hk-pg-title font-weight-600 mb-10">Pin List</h2>
        </div>
    </div>
    <!-- /Title -->
    <!-- Row -->
    @include('messages')
    <div class="row">

        <div class="col-xl-12">
            <div class="hk-row">
            	

                <div class="col-lg-12">                    
	            	{{-- filters start --}}
	            	<div class="text-left mb-4">
	            		<p><a href="{{ route('admin.pins', "all") }}">All</a> - 
	            			<a href="{{ route('admin.pins', "unused") }}">Unused</a> - 
	            			<a href="{{ route('admin.pins', "used") }}">Used</a></p>
	            		<p class="mt-4">
	            			<a href="{{ route('admin.pins', "class1") }}">Class 1</a> - 
	            			<a href="{{ route('admin.pins', "class2") }}">Class 2</a> - 
	            			<a href="{{ route('admin.pins', "class3") }}">Class 3</a> - 
	            			<a href="{{ route('admin.pins', "class4") }}">Class 4</a> - 
	            			<a href="{{ route('admin.pins', "class5") }}">Class 5</a> - 
	            			<a href="{{ route('admin.pins', "class6") }}">Class 6</a> - 
	            			<a href="{{ route('admin.pins', "class7") }}">Class 7</a> - 
	            			<a href="{{ route('admin.pins', "class8") }}">Class 8</a> - 
	            			<a href="{{ route('admin.pins', "class9") }}">Class 9</a> - 
	            			<a href="{{ route('admin.pins', "class10") }}">Class 10</a>
	            		</p>
                        <p class="mt-4 pt-3">Generated PIN: 
                            {{App\Pin::count()}}</p>
                        <p class="mt-4">Total Used PIN: 
                            {{App\Pin::where('used_status', 0)->count()}}
                        </p>
                        <p class="mt-4">Total Unused PIN: 
                            {{App\Pin::where('used_status', 1)->count()}}
                        </p>
	            	</div>
	            	{{-- filters end --}}
                    
	            	<form action="{{ route('admin.pinDel') }}" method="POST"  onsubmit="return confirm('Do you really want to delete these?');">
	            		@csrf
	            		<input type="submit" name="" value="Delete These Pins" class="btn btn-danger mb-4">

						<div class="table-wrap mb-20">
	                        <div class="table-wrap">
	                            <table id="datable_3" class="table table-hover w-100 display pt-4">
	                                <thead class="thead-light">
	                                    <tr>
	                                        <th><input type="checkbox" id="check_all" onclick="checkAll()"></th>
	                                        <th>S.N.</th>
	                                        <th>Pin</th>
	                                        <th>Class</th>
	                                        <th>Use Status</th>
	                                    </tr>
	                                </thead>
	                                <tbody>
	                                    @foreach ($pins as $pin)
	                                    <tr>
	                                        <td><input type="checkbox" name="del[]" class="del" value="{{ $pin->id }}" /></td>  
	                                        <td>{{ $loop->index + 1 }}</td>  
	                                        <td>{{ $pin->pin }}</td>
	                                        <td>{{ $pin->class }}</td>
	                                        <td>{{ $pin->used_status }}</td>
	                                    </tr>
	                                    @endforeach
	                                </tbody>
	                            </table>
	                        </div>
	                    </div>
	                </form>
                    
                    <div class="mt-4">{{ $pins->links() }}</div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Row -->
</div>

<script>
	function checkAll(){
		var status = document.getElementById('check_all').checked;
		if( status == true ){
			//check all input checkbox to checked
			var inputs = document.getElementsByTagName("input");
			for(var i = 0; i < inputs.length; i++) {
			    if(inputs[i].type == "checkbox") {
			        inputs[i].checked = true; 
			    }  
			}

		}else{
			//uncheck all input checkboxes			
			var inputs = document.getElementsByTagName("input");
			for(var i = 0; i < inputs.length; i++) {
			    if(inputs[i].type == "checkbox") {
			        inputs[i].checked = false; 
			    }  
			}
		}
	}
</script>

@endsection
