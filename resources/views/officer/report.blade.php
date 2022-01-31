@extends('officer.layouts.app')

@section('main_section')

<div class="container">
    <!-- Title -->
    <div class="hk-pg-header align-items-top">
        <div>
            <h2 class="hk-pg-title font-weight-600 mb-10">Sale Report</h2>
        </div>
    </div>
    <!-- /Title -->
    <!-- Row -->
    @include('messages')
    <div class="row">

        <div class="col-xl-12">
            <div class="hk-row">
            
                <div class="col-lg-6">
                    @if ( isset($total))
                    	@php
                    		$from_date = substr($from,6,2).'/'.substr($from,4,2).'/'.substr($from,0,4);
                    		$to_date = substr($to,6,2).'/'.substr($to,4,2).'/'.substr($to,0,4);
                    	@endphp
                    	<p class="mb-4 text-left">Sales report of the period <strong>{{$from_date}}</strong> to <strong>{{ $to_date }}</strong></p>
						<div class="table-wrap mb-20">
	                        <div class="table-responsive">
	                            <table class="table table-bordered mb-0 text-center">
	                            	<style>
	                            		th{
	                            			font-size: 13px !important;
	                            		}
	                            	</style>
	                                <thead class="thead-light">
	                                    <tr>
	                                        <th>Class</th>
	                                        <th>Sales</th>
	                                    </tr>
	                                </thead>
	                                <tbody>
	                                    <tr>
	                                        <td>Class 1</td>
	                                    	<td>{{ $class1 }}</td>
	                                    </tr>
	                                    <tr>
	                                        <td>Class 2</td>
	                                    	<td>{{ $class2 }}</td>
	                                    </tr>
	                                    <tr>
	                                        <td>Class 3</td>
	                                    	<td>{{ $class3 }}</td>
	                                    </tr>
	                                    <tr>
	                                        <td>Class 4</td>
	                                    	<td>{{ $class4 }}</td>
	                                    </tr>
	                                    <tr>
	                                        <td>Class 5</td>
	                                    	<td>{{ $class5 }}</td>
	                                    </tr>
	                                    <tr>
	                                        <td>Class 6</td>
	                                    	<td>{{ $class6 }}</td>
	                                    </tr>
	                                    <tr>
	                                        <td>Class 7</td>
	                                    	<td>{{ $class7 }}</td>
	                                    </tr>
	                                    <tr>
	                                        <td>Class 8</td>
	                                    	<td>{{ $class8 }}</td>
	                                    </tr>
	                                    <tr>
	                                        <td>Class 9</td>
	                                    	<td>{{ $class9 }}</td>
	                                    </tr>
	                                    <tr>
	                                        <td>Class 10</td>
	                                    	<td>{{ $class10 }}</td>
	                                    </tr>
	                                    <tr>
	                                        <td><strong>Total</strong></td>
	                                    	<td>{{ $total }}</td>
	                                    </tr>
	                                </tbody>
	                            </table>
	                        </div>
	                    </div>
                    @endif
                </div>
                <div class="col-lg-6">
                	&nbsp;
                </div>                
                <div class="col-lg-6">
                	<h6 class="mt-4 mb-4">Please select a date range</h6>
                    <form action="{{ route('officer.reportShow', $visitorId) }}" method="POST">
                    	@csrf
                    	

                    	<div class="form-group">
                    		<label for="">From</label>
                    		<input type="date" name="from" class="form-control" required>
                    	</div>

                    	<div class="form-group">
                    		<label for="">To</label>
                    		<input type="date" name="to" class="form-control" required>
                    	</div>
                    	

                    	<div class="form-group mt-4">
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
