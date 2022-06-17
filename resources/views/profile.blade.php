@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Profile</h1>
        </div>
        <div class="row">
            <div class="col-md-8">
                @include('alerts')
                <form method="POST" action="{{ route('user.update-profile') }}" class="user">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <input id="FirstName" type="text"
                                   class="bg-dark form-control form-control-user @error('FirstName') is-invalid @enderror"
                                   name="FirstName" value="{{ isset($user->FirstName)?$user->FirstName:old('FirstName') }}"
                                   required
                                   placeholder="First Name"
                                   autocomplete="FirstName" autofocus>
                            @error('FirstName')
                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                            @enderror
                        </div>
                        <div class="col-md-4 form-group">
                            <input id="MiddleName" type="text"
                                   class="bg-dark form-control form-control-user @error('MiddleName') is-invalid @enderror"
                                   name="MiddleName" value="{{ isset($user->MiddleName)?$user->MiddleName:old('FirstName') }}"
                                   placeholder="Middle Name" autocomplete="MiddleName" autofocus>
                            @error('MiddleName')
                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                            @enderror
                        </div>
                        <div class="col-md-4 form-group">
                            <input id="LastName" type="text"
                                   class="bg-dark form-control form-control-user @error('LastName') is-invalid @enderror"
                                   name="LastName" value="{{ isset($user->LastName)?$user->LastName:old('LastName') }}" required
                                   placeholder="Last Name" autocomplete="LastName" autofocus>
                            @error('LastName')
                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input id="UserId" type="text"
                                   class="bg-dark form-control form-control-user @error('UserId') is-invalid @enderror"
                                   name="UserId" value="{{ isset($user->UserId)?$user->UserId:old('UserId') }}" required
                                   placeholder="UserId" autocomplete="UserId" disabled>
                            @error('UserId')
                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <input id="Title" type="text"
                                   class="bg-dark form-control form-control-user @error('Title') is-invalid @enderror"
                                   name="Title" value="{{ isset($user->Title)?$user->Title:old('Title') }}" required
                                   placeholder="Title" autocomplete="Title" autofocus>
                            @error('Title')
                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <input type="Email" class="bg-dark form-control form-control-user" id="exampleInputEmail"
                                   name="Email"
                                   value="{{ isset($user->email)?$user->email:old('email') }}"
                                   placeholder="Email Address">
                            @error('Email')
                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                            @enderror

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input id="Company" type="text"
                                   value="{{ isset($user->Company)?$user->Company:old('Company') }}"
                                   class="bg-dark form-control form-control-user @error('Company') is-invalid @enderror"
                                   name="Company" required autocomplete="Company"
                                   placeholder="Company"
                            >

                            @error('Company')
                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <input id="PhoneNumber" type="text"
                                   value="{{ isset($user->PhoneNumber)?$user->PhoneNumber:old('PhoneNumber') }}"
                                   class="bg-dark form-control form-control-user @error('PhoneNumber') is-invalid @enderror"
                                   name="PhoneNumber" required autocomplete="PhoneNumber"
                                   placeholder="Phone Number"
                            >

                            @error('PhoneNumber')
                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input id="StreetAddress1" type="text"
                                   value="{{ isset($user->StreetAddress1)?$user->StreetAddress1:old('StreetAddress1') }}"
                                   class="bg-dark form-control form-control-user @error('StreetAddress1') is-invalid @enderror"
                                   name="StreetAddress1" required autocomplete="StreetAddress1"
                                   placeholder="Street Address 1"
                            >

                            @error('StreetAddress1')
                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <input id="StreetAddress2" type="text"
                                   value="{{ isset($user->StreetAddress2)?$user->StreetAddress2:old('StreetAddress2') }}"
                                   class="bg-dark form-control form-control-user @error('StreetAddress2') is-invalid @enderror"
                                   name="StreetAddress2" autocomplete="StreetAddress2"
                                   placeholder="Street Address 2"
                            >

                            @error('StreetAddress2')
                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 form-group">
                            <input id="City" type="text"
                                   value="{{ isset($user->City)?$user->City:old('City') }}"
                                   class="bg-dark form-control form-control-user @error('City') is-invalid @enderror"
                                   name="City" required autocomplete="City"
                                   placeholder="City"
                            >

                            @error('City')
                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                            @enderror
                        </div>
                        <div class="col-md-3 form-group">
                            <input id="State" type="text"
                                   value="{{ isset($user->State)?$user->State:old('State') }}"
                                   class=" bg-dark form-control form-control-user @error('State') is-invalid @enderror"
                                   name="State" required autocomplete="State"
                                   placeholder="State"
                            >

                            @error('State')
                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                            @enderror
                        </div>
                        <div class="col-md-3 form-group">
                            <input id="ZipCode" type="text"
                                   value="{{ isset($user->ZipCode)?$user->ZipCode:old('ZipCode') }}"
                                   class="bg-dark form-control form-control-user @error('ZipCode') is-invalid @enderror"
                                   name="ZipCode" required autocomplete="Country"
                                   placeholder="ZipCode"
                            >

                            @error('ZipCode')
                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                            @enderror
                        </div>
                        <div class="col-md-3 form-group">
                            <input id="Country" type="text"
                                   value="{{ isset($user->Country)?$user->Country:old('Country') }}"
                                   class="bg-dark form-control form-control-user @error('Country') is-invalid @enderror"
                                   name="Country" required autocomplete="Country"
                                   placeholder="Country"
                            >

                            @error('Country')
                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <input id="Description" type="text"
                                   value="{{ isset($user->Description)?$user->Description:old('Description') }}"
                                   class="bg-dark form-control form-control-user @error('Description') is-invalid @enderror"
                                   name="Description" autocomplete="Description"
                                   placeholder="Description"
                            >

                            @error('Description')
                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-primary btn-user">
                                Update
                            </button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
@endsection
