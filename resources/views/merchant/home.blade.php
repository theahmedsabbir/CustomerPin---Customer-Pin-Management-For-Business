@extends('merchant.layouts.app')

@section('main_section')

<div class="container">
    <!-- Title -->
    <div class="hk-pg-header align-items-top">
        <div>
            <h2 class="hk-pg-title font-weight-600 mb-10">Welcome Merchant</h2>
            <p>You are successfully logged in !!!</p>
        </div>
    </div>
    <!-- /Title -->
    <!-- Row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="hk-row">
            
                <div class="col-lg-12">
                    
                    <div class="card" style="border:none;">
                        <div class="card-body pa-0">


                                @php
                                        $loggedInUserID = Auth::user()->id;
                                        if ($loggedInUserID < 1000) {
                                          $manCode = "CP".sprintf("%04d", $loggedInUserID);
                                        } else {
                                          $manCode = "CP".$loggedInUserID;
                                        }

                                @endphp 

                            <p>Your Merchant ID: <strong>{{ $manCode }}</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Row -->
</div>


@endsection
