@extends('merchant.layouts.app')

@section('main_section')

<div class="container">
    <!-- Title -->
    <div class="hk-pg-header align-items-top">
        <div>
            <h2 class="hk-pg-title font-weight-600 mb-10">Officer Details</h2>
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
                        font-size: 20px;
                        margin-bottom: 10px;
                    }
                </style>
            
                <div class="col-lg-12">
                    <p><strong>Name: &nbsp;</strong>{{ $user->name }}</p>
                    <p><strong>Username: &nbsp;</strong>{{ $user->username }}</p>
                    <p><strong>Phone: &nbsp;</strong>{{ $user->phone }}</p>
                    <p><strong>Email: &nbsp;</strong>{{ $user->email }}</p>
                    <p><strong>Address: &nbsp;</strong>{{ $user->address }}</p>
                    <p><strong>Status: &nbsp;</strong>{{ $user->status == 1 ? 'Active' : 'Inactive' }}</p>
                    <br>
                    <a href="{{ route('merchant.editOfficer', $user->id ) }}" class="btn btn-success mt-5 pt-5">Edit Info</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /Row -->
</div>


@endsection
