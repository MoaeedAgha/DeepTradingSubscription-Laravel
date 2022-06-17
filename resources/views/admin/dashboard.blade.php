@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1><span>Users</span></h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow h-100 py-2 bg-dark">
                <div class="card-body table-responsive bg-dark">
                    <table class="table table-responsive-lg table-bordered table-dark table-hover  table-striped">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>User Id</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Subscribe To Mailing List</th>
                                <th>Account Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(sizeof($users))
                                @foreach($users as $index => $u)
                                    @if($u->MailingList == 1)
                                        @php
                                            $MailingList = 'Yes';
                                        @endphp
                                    @else
                                        @php
                                            $MailingList = 'No';
                                        @endphp
                                    @endif
                                    <tr>
                                        <td>{{ ++$index }}</td>
                                        <td>{{ $u->UserId }}</td>
                                        <td>{{ $u->FirstName }}</td>
                                        <td>{{ $u->LastName }}</td>
                                        <td>{{ $u->email }}</td>
                                        <td>{{ $MailingList }}</td>
                                        <td>{{ $u->AccountStatus }}</td>
                                        <td>
                                            <a class="btn btn-primary" href="{{ route('admin.view-details', [$u->id]) }}">View</a>
                                            /
                                            <a href="javascript:;" class="setActiveStatus" id="{{ $u->id }}">
                                                @if($u->AccountStatus == 'In-active')
                                                    <label class="badge badge-success">Enable</label>
                                                @else
                                                    <label class="badge badge-danger">Disable</label>
                                                @endif
                                            </a>
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
