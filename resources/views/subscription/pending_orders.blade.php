@extends('layouts.app')

@section('content')

        <style>
           
            .content {
                margin-top: 100px;
                text-align: center;
            }
        </style>
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1><span>Pending Order</span></h1>
        </div>
        <div class="row table-dark">
            <div class="col-md-12">
                <div class="table-dark">
                    <div class="card-body table-responsive table-dark">
                        <table class="table table-responsive-lg table-bordered table-dark table-hover  table-striped">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Order Date</th>
                                    <th>Product</th>
                                    <th>Stocks</th>
                                    <th>Amount</th>
                                    <th>Expiry Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $index => $o)
                                    <tr>
                                        <td>{{ ++$index }}</td>
                                        <td>{{ $o->OrderDate }}</td>
                                        <td>{{ $o->product->Name .' ('.$o->product->Frequency.')' }}</td>
                                        <td>{{ getStocks($o->Stocks) }}</td>
                                        <td>${{ $o->TotalPrice }}</td>
                                        <td>{{ $o->ExpiryDate }}</td>
                                        <td>{{ $o->Status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if($o->Status == 'Pending')
                            <div class="flex-center position-ref full-height">
                                <div class="content">
                                    <a href="{{ route('payment', [$o->id]) }}" class="btn">
                                    <img src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/checkout-logo-large.png" alt="Check out with PayPal" />
                                    </a>
                                    <a href="{{ route('secure-payment', [$o->id]) }}" class="btn">
                                    <img src="{{ asset('images/pngguru.com.png') }}" width="200" alt="Check out with Credit / Debit Card" />
                                    </a>
                                </div>

                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
