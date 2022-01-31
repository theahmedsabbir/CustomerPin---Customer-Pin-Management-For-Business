@extends('admin.layouts.app')

@section('main_section')

<div class="container">
    <!-- Title -->
    <div class="hk-pg-header align-items-top">
        <div>
            <h2 class="hk-pg-title font-weight-600 mb-10">Merchant Details</h2>
        </div>
    </div>
    <!-- /Title -->
    <!-- Row -->
    @include('messages')
    <div class="row">

        <div class="col-xl-12">
            <div class="hk-row">    
                <style>
                    .hk-row p{
                        font-size: 14px;
                        margin-bottom: 10px;
                    }
                </style>
            
                <div class="col-lg-12">
                    <p><strong>Username: &nbsp;<br></strong>{{ $user->username }}</p>
                    <p><strong>Full Name: &nbsp;<br></strong>{{ $user->name }}</p>
                    <p><strong>Phone: &nbsp;<br></strong>{{ $user->phone }}</p>
                    <p><strong>Email: &nbsp;<br></strong>{{ $user->email }}</p>
                    <p><strong>Address: &nbsp;<br></strong>{{ $user->address }}</p>
                    <p><strong>Product Type: &nbsp;<br></strong>{{ $user->product_type }}</p>
                    <p><strong>Total User: &nbsp;<br></strong>
                        {{ App\Visitor::where('merchant_id', $user->id)->count() }}
                    </p>
                    <p><strong>Total Pins: &nbsp;<br></strong>
                        {{ App\Pin::where('merchant_id', $user->id)->count() }}
                    </p>
                    <p><strong>Unused Pins: &nbsp;<br></strong>
                        {{ App\Pin::where('merchant_id', $user->id)->where('used_status',0)->count() }}
                    </p>
                    <p><strong>Used Pins: &nbsp;<br></strong>
                        {{ App\Pin::where('merchant_id', $user->id)->where('used_status',1)->count() }}
                    </p>
                    <p><strong>Status: &nbsp;<br></strong>{{ $user->status == 1 ? 'Active' : 'Inactive' }}</p>
                    <p>

                    <a href="{{ route('admin.merchantReport', $user->id) }}" class="">View Details</a>

                    </p>
                    <br>
                    <a href="{{ route('admin.editMerchant', $user->id ) }}" class="pt-5 btn btn-info btn-sm">Edit Details</a>

                    <form action="{{ route('admin.merchantLogin') }}" method="POST" class="d-inline">
                        @csrf
                        
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <input type="submit" value="Login As {{ $user->username }}" class="btn btn-success btn-sm">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Row -->
</div>


@endsection
