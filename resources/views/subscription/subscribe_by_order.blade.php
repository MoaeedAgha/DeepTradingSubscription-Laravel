@extends('layouts.app')

@section('content')
    @php
        $selected="";
    @endphp
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 ><span>Subscription</span></h1>
        </div>

        <!-- Content Row -->
        <div class="row form-group">
            <div class="col-md-4">
                <h2><span>Product</span></h2>
                <select name="product_id" onchange="getStocksData(this.value)" id="product_id" class="form-control bg-dark" required>
                    @foreach($product as $key => $value)
                      @if(isset($frequency))
                        @if($key==$frequency)
                        <option value="{{ $key }}" >{{ $value }}</option>
                        @endif
                      @endif  
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row table-dark">
            <div class="col-md-12">
                <div class=" table-dark">
                    <div class="card-body table-responsive table-dark">
                        <p class="info_text">Please select atleast 2 stocks. You will be charged <span class="color-red price_tag">$100</span> for each extra stock over 2.</p>
                        <table class="table table-responsive-lg table-bordered table-dark table-hover  table-striped">
                            <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Ticker</th>
                                <th>Name </th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody id="stocks_table">

                            </tbody>
                        </table>
                        <div class="form-group text-right">
                            <button type="button" id="subscribe" class="btn btn-primary" disabled="disabled">
                                Subscribe
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endsection

        @section('script')
            <script type="text/javascript">
              $('.info_text').hide()
              <?php if (isset($frequency)): ?>
              getStocksData("{{$frequency}}")
              <?php endif; ?>
              let current_selected_stock = [[]];

              function getStocksData(product_id) {
                if (product_id == "") {
                  $('.info_text').hide();
                  $('#stocks_table').empty();
                  return false;
                }

                if (product_id == "{{$frequency}}") {
                  if (product_id < 3) {
                    console.log(product_id);
                    $('.info_text').html('Please select atleast 2 stocks. You will be charged <span class="color-red price_tag">$199</span> for each extra stock over 2.');
                  } else {
                    $('.info_text').html('Please select atleast 2 stocks. You will be charged <span class="color-red price_tag">$299</span> for each extra stock over 2.');
                  }
                    $('.info_text').show();
                } else {
                  if (product_id < 3) {
                    $('.info_text').show()
                    $('.price_tag').html('$199')
                  } else {
                    $('.info_text').show()
                    $('.price_tag').html('$299')
                  }
                }

                let order_id = "{{$order->id}}";

                $.ajax({
                  type: 'post',
                  data: {
                    '_token': '{{csrf_token()}}',
                    product_id: product_id,
                    order_id: order_id
                  },
                  url: "{{ route('get_available_stock') }}",
                  success: function (response) {
                    if (response.status == 200) {
                      $('#stocks_table').empty();
                      $('#stocks_table').html(response.body);
                      $('.selectStock').on('change', function () {
                        if ($('.selectStock:checked').length >= 2) {
                          $('#subscribe').prop('disabled', false);
                        } else {
                          $('#subscribe').prop('disabled', true);
                        }
                      });
                    } else {
                      $('#stocks_table').empty();
                      swal('Error', response.message, 'error');
                    }
                  }
                });
              }

              $('#subscribe').on('click', function () {
                var product_id = $('#product_id').val();
                if (product_id != '') {

                  swal({
                        title: "Are you sure?",
                        text: "You want to proceed with the selected stocks?",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Yes",
                        cancelButtonText: "No",
                        closeOnConfirm: true,
                        closeOnCancel: true
                      },
                      function (isConfirm) {
                        if (isConfirm) {
                          $.ajax({
                            type: 'post',
                            data: {
                              '_token': '{{csrf_token()}}',
                              data: $('.selectStock:checked').serializeArray(),
                              product_id: product_id
                            },
                            url: '{{ route('subscribe-stock') }}',
                            success: function (response) {
                              if (response.status == 200) {
                                window.location.href = '/user/history';
                              } else {
                                swal('Error', response.message, 'error');
                              }
                            }
                          });
                        } else {
                        }
                      });
                } else {
                  swal('Warning', 'Please select product', 'warning')
                }
              });
            </script>
@endsection
