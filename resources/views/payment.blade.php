
@extends('layouts.app')

@section('content')

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha256-YLGeXaapI0/5IgZopewRJcFXomhRMlYYjugPLSyNjTY=" crossorigin="anonymous" />
  
<!-- Styles -->
<style>
    
    .content {
        margin-top: 100px;
        text-align: center;
    }
</style>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="">Pending Order</h1>
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
                            @php
                                $months = array(1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr', 5 => 'May', 6 => 'Jun', 7 => 'Jul', 8 => 'Aug', 9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dec');
                            @endphp
                            <!-- Company Overview section START -->
                            <section class="container-fluid inner-Page" >
                                <div class="card-panel">
                                    <div class="media wow fadeInUp" data-wow-duration="1s"> 
                                        <div class="companyIcon">
                                        </div>
                                        <div class="media-body">
                                            
                                            <div class="container">
                                                @if(session('success_msg'))
                                                <div class="alert alert-success fade in alert-dismissible show">                
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true" style="font-size:20px">×</span>
                                                    </button>
                                                    {{ session('success_msg') }}
                                                </div>
                                                @endif
                                                @if(session('error_msg'))
                                                <div class="alert alert-danger fade in alert-dismissible show">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true" style="font-size:20px">×</span>
                                                    </button>    
                                                    {{ session('error_msg') }}
                                                </div>
                                                @endif
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h1>Payment</h1>
                                                    </div>                       
                                                </div>    
                                                <div class="row">                        
                                                    <div class="col-xs-12 col-md-6" style="border-radius: 5px; padding: 10px;">
                                                        <div class="panel panel-primary">                                       
                                                            <div class="creditCardForm">                                    
                                                                <div class="payment">
                                                                    <form id="payment-card" method="post" action="{{ url('charge') }}">
                                                                        @csrf
                                                                        <div class="row">
                                                                            <div class="form-group owner col-md-8">
                                                                                <label for="owner">Owner's Name / Email </label>
                                                                                <input type="text" class="form-control" id="owner" name="email" value="{{ old('email') }}" required>
                                                                                <span id="owner-error" class="">Please enter owner name</span>
                                                                            </div>
                                                                            <div class="form-group CVV col-md-4">
                                                                                <label for="cvv">CVV</label>
                                                                                <input type="number" class="form-control" id="cvv" name="cvv" value="{{ old('cvv') }}" required>
                                                                                <span id="cvv-error" class="">Please enter cvv</span>
                                                                            </div>
                                                                        </div>    
                                                                        <div class="row">
                                                                            <div class="form-group col-md-8" id="card-number-field">
                                                                                <label for="cardNumber">Card Number</label>
                                                                                <input type="text" class="form-control" id="cardNumber" name="cc_number" value="{{ old('cc_number') }}" required>
                                                                                <span id="card-error" class="">Please enter valid card number</span>
                                                                            </div>
                                                                            <div class="form-group col-md-4" >
                                                                                <label for="amount">Amount</label>
                                                                                <input type="number" class="form-control" id="amount" name="amount" min="1" value="{{ $o->TotalPrice }}" readonly>
                                                                                <span id="amount-error" class="">Please enter amount</span>
                                                                            </div>
                                                                        </div>    
                                                                        <div class="row">
                                                                            <div class="form-group col-md-6" id="expiration-date">
                                                                                <label>Expiration Date</label><br/>
                                                                                <select class="form-control" id="expiration-month" name="expiry_month" style="float: left; width: 100px; margin-right: 10px;">
                                                                                    @foreach($months as $k=>$v)
                                                                                        <option value="{{ $k }}" {{ old('expiry_month') == $k ? 'selected' : '' }}>{{ $v }}</option>                                                        
                                                                                    @endforeach
                                                                                </select>  
                                                                                <select class="form-control" id="expiration-year" name="expiry_year"  style="float: left; width: 100px;">
                                                                                    
                                                                                    @for($i = date('Y'); $i <= (date('Y') + 15); $i++)
                                                                                    <option value="{{ $i }}">{{ $i }}</option>            
                                                                                    @endfor
                                                                                </select>
                                                                            </div>                                                
                                                                            <div class="form-group col-md-6" id="credit_cards" style="margin-top: 22px;">
                                                                                <img src="{{ asset('images/visa.svg') }}" id="visa">
                                                                                <img src="{{ asset('images/mastercard.svg') }}" id="mastercard">
                                                                                <img src="{{ asset('images/amex.svg') }}" id="amex">
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <br/>
                                                                        <div class="form-group" id="pay-now">
                                                                            <button type="submit" class="btn btn-success themeButton" id="confirm-purchase">Confirm Payment</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>                                
                                                        </div>
                                                    </div>            
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div> 
                                <div class="clearfix"></div>
                            </section>
                                        
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
        
@endsection