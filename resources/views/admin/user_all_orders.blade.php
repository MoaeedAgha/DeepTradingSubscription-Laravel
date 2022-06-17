@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1><span>User Orders</span></h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow h-100 py-2 bg-dark">
                <div class="card-body table-responsive bg-dark">
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
                                    <th>Payment Type</th>
                                    <th>Refund Payment</th>
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
                                        <td>{{ $o->TotalPrice }}</td>
                                        <td>{{ $o->ExpiryDate }}</td>
                                        <td>{{ $o->Status }}</td>
                                        @if($o->Status == 'Active')
                                            <td>{{ $o->payment->payment_method }}</td>
                                        @else
                                            <td> </td>
                                        @endif
                                        <td>
                                        @if($o->Status == 'Active')
                                            @if($o->payment->payment_method == 'Authorize')
                                                <a class="btn btn-primary" href="{{ route('refund_authorize', [$o->payment->transaction_id]) }}">Refund from Authorize.net</a>
                                            @else
                                                <a class="btn btn-primary" href="{{ route('refund', [$o->payment->transaction_id]) }}">Refund from Paypal</a>
                                            @endif
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

@section('script')
    <script type="text/javascript">
    $('body').on('click', '.setActiveStatus', function () {
        var id = $(this).attr('id');
        swal({
                title: "Are you sure?",
                text: "You want to change account status for this user?",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes",
                cancelButtonText: "No",
                closeOnConfirm: true,
                closeOnCancel: true
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: 'post',
                        data: {
                            '_token': '{{csrf_token()}}',
                            userId: id
                        },
                        url: '{{ route('admin.set-active-status') }}',
                        success: function (response) {
                            if (response.status == 200) {
                                window.location.reload();
                            } else {
                                swal('Error', response.message, 'error');
                            }
                        }
                    });
                } else {
                }
            });
    })
    </script>
@endsection
