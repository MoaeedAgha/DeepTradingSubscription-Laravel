@extends('layouts.app')

@section('content')
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">
        @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
        @endif
        @if($errors->any())
        <div class="alert alert-danger">
            <h4>Something went wrong while processing Payment.</h4>
        </div>    
        @endif

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1><span>Dashboard</span></h1>
        </div>

        <!-- Content Row -->
        @php 
        $stocks = '';
        @endphp
        @if(!empty($items))

            @foreach($items as $item)
                @php
                    $count = sizeof($item);
                @endphp
                <h2 style="color:#2bb3ea">{{ $item[$count -1] }}</h2>
                <div class="row">
            
                    @foreach($item as $index => $stock)
                    
                    @if($index != ($count-1))
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2 bg-dark">
                                    <div class="card-body bg-dark">
                                        <div class="row no-gutters align-items-center bg-dark">
                                            <div class="col mr-2">
                                                <div class="h5 mb-0 font-weight-bold " style="color:#fff">
                                                {{ $stock->Ticker }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-ticket-alt fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endforeach
        @else
            <div class="col-md-12">
                    <p>You have not subscribed to any stock yet. Please click <a href="{{ route('subscribe') }}">here</a> to subscribe.</p>
                </div>
        @endif;
        
    </div>
@endsection
