@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1><span>User Details</span></h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow h-100 py-2 bg-dark">
                <div class="card-body table-responsive bg-dark">
                    <div class="row">
                        <div class="col-md-3">
                            <label class="col-form-label">First Name</label>
                            <p>{{ $user->FirstName }}</p>
                        </div>
                        <div class="col-md-3">
                            <label class="col-form-label">Middle Name</label>
                            <p>{{ $user->MiddleName }}</p>
                        </div>
                        <div class="col-md-3">
                            <label class="col-form-label">Last Name</label>
                            <p>{{ $user->LastName }}</p>
                        </div>
                        <div class="col-md-3">
                            <label class="col-form-label">User Id</label>
                            <p>{{ $user->UserId }}</p>
                        </div>
                    </div>
                    <hr class="sidebar-divider my-0">
                    <div class="row">
                        <div class="col-md-3">
                            <label class="col-form-label">Email</label>
                            <p>{{ $user->email }}</p>
                        </div>
                        <div class="col-md-3">
                            <label class="col-form-label">Phone</label>
                            <p>{{ $user->PhoneNumber }}</p>
                        </div>
                        <div class="col-md-3">
                            <label class="col-form-label">Company</label>
                            <p>{{ $user->Company }}</p>
                        </div>
                        <div class="col-md-3">
                            <label class="col-form-label">Title</label>
                            <p>{{ $user->Title }}</p>
                        </div>
                    </div>
                    <hr class="sidebar-divider my-0">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="col-form-label">Street Address 1</label>
                            <p>{{ $user->StreetAddress1 }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="col-form-label">Street Address 2</label>
                            <p>{{ $user->StreetAddress2 }}</p>
                        </div>
                    </div>
                    <hr class="sidebar-divider my-0">
                    <div class="row">
                        <div class="col-md-3">
                            <label class="col-form-label">City</label>
                            <p>{{ $user->City }}</p>
                        </div>
                        <div class="col-md-3">
                            <label class="col-form-label">State</label>
                            <p>{{ $user->State }}</p>
                        </div>
                        <div class="col-md-3">
                            <label class="col-form-label">Zip Code</label>
                            <p>{{ $user->ZipCode }}</p>
                        </div>
                        <div class="col-md-3">
                            <label class="col-form-label">Country</label>
                            <p>{{ $user->Country }}</p>
                        </div>
                    </div>
                    <hr class="sidebar-divider my-0">
                    <div class="row">
                        <div class="col-md-9">
                            <label class="col-form-label">Description</label>
                            <p>{{ $user->Description }}</p>
                        </div>
                        <div class="col-md-3">
                            <label class="col-form-label">Account Status</label>
                            <p>{{ $user->AccountStatus }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
