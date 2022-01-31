@extends('admin.layouts.app')

@section('main_section')

<div class="container">
    <!-- Title -->
    <div class="hk-pg-header align-items-top">
        <div>
            <h2 class="hk-pg-title font-weight-600 mb-10">Merchants List</h2>
        </div>
    </div>
    <!-- /Title -->
    <!-- Row -->
    @include('messages')
    <div class="row">

        <div class="col-xl-12">
            <div class="hk-row">
            
                <div class="col-lg-12">
                    
                    
					<div class="table-wrap mb-20">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Username</th>
                                        <th>Phone</th>
                                        <th>Pin Generated</th>
                                        <th>Pin Used</th>
                                        <th>Total Users</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach (App\Merchant::orderBy('id','asc')->get() as $merchant)
                                    <tr>
                                        <th scope="row">{{ $loop->index + 1 }}</th>                             <td>
                                            <a href="{{ route('admin.merchantShow', $merchant->id ) }}">{{$merchant->username}}</a></td>
                                        <td>{{ $merchant->phone }}</td>
                                        <td>{{ App\Pin::where('merchant_id', $merchant->id)->count() }}</td>
                                        <td>{{ App\PinUsage::where('merchant_id', $merchant->id)->count() }}</td>
                                        <td>{{ App\Visitor::where('merchant_id', $merchant->id)->count() }}</td>
                                        <td>{{ $merchant->status == 1? 'Active' : 'Inactive'}}</td>
                                        <td>
                                        	<form action="{{ route('admin.merchantStatus', $merchant->id) }}" method="POST">
                                        		@csrf
                                        		
                                        		<input type="submit" value="{{ $merchant->status == 1? 'Inactive' : 'Activate'}}" class="btn btn-info btn-sm">
                                        	</form>
                                        </td>
                                    </tr>
                                	@endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Row -->
</div>


@endsection
