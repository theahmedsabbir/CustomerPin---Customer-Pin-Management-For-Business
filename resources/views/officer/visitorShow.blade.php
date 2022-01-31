@extends('officer.layouts.app')

@section('main_section')

<div class="container">
    <!-- Title -->
    <div class="hk-pg-header align-items-top">
        <div>
            <h2 class="hk-pg-title font-weight-600 mb-10">User Details</h2>
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
                        font-size: 18px;
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
                    <p><strong>Total Sales: &nbsp;</strong>

                        @php
                            $sales = 0;
                            if (isset($user->pinUsage) && $user->pinUsage->count() > 0) {
                                foreach ($user->pinUsage as $sale) {
                                    $sales++;
                                }
                            }
                            echo $sales;
                        @endphp

                        <a href="{{ route('officer.visitorReport', $user->id) }}" class="ml-2">View Details</a>
                    </p>
                    <br>
                    <a href="{{ route('officer.editVisitor', $user->id ) }}" class="btn btn-info pt-5">Edit Info</a>

                    <form action="{{ route('officer.visitorLogin') }}" method="POST" class="d-inline">
                        @csrf
                        
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <input type="submit" value="Login As {{ $user->username }}" class="btn btn-success">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Row -->
</div>


@endsection
