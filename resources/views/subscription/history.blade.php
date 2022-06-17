@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <!-- <h1 class="h3 mb-0 text-gray-800">History</h1> -->
            <h1> <span> History </span></h1>
        </div>
        <div class="row table-dark">
            <div class="col-md-12">
                <div class=" table-dark">
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
                                @if(sizeof($orders))
                                    @foreach($orders as $index => $o)
                                        <tr>
                                            <td>{{ ++$index }}</td>
                                            <td>{{ $o->OrderDate }}</td>
                                            <td>{{ $o->product->Name .' ('.$o->product->Frequency.')' }}</td>
                                            <td>{{ getStocks($o->Stocks) }}</td>
                                            <td>${{ $o->TotalPrice }}</td>
                                            <td>{{ $o->ExpiryDate }}</td>
                                            <td>{{ $o->Status }}
                                            @if($o->Status == 'Active')
                                                    - <a href="{{ route('subscribe_by_order', [$o->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                                                @endif
                                            @if($o->Status == 'Pending')
                                                    - <a href="{{ route('pending_orders', [$o->id]) }}" class="btn btn-primary btn-sm">Proceed Payment</a>
                                            @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
