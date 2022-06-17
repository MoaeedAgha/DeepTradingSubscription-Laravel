<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset = "utf-8">
        <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
        <meta name = "viewport" content = "width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name = "description" content = "">
        <meta name = "author" content = "">

        <title>{{ config('app.name', 'Deep Trading AI') }} - Reset Password</title>

        <!-- Custom fonts for this template-->
        <link href = "vendor/fontawesome-free/css/all.min.css" rel = "stylesheet" type = "text/css">
        <link href = "https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel = "stylesheet">

        <!-- Custom styles for this template-->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <style>
             .login-image {
                background: #333333 url("{{ asset('images/poster.jpg') }}");
                background-size: cover;
                opacity: 0.8;
            }
            .login-image::before {
                content: '';
                background: #000000;
                position: fixed;
                left: 0;
                right: 0;
                top: 0;
                bottom: 0;
                width: 100%;
                height: 100%;
            }
            .btn-dark {
                color: #fff;
                background-color: orange;
                border-color: #343a40;
            }
            .fa {
                
                font-size: -webkit-xxx-large !important;
                
            }
        </style>
    </head>

    <body class = "login-image">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="" required>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



        <!-- Bootstrap core JavaScript-->
        <script src = "{{ asset('vendor/jquery/jquery.min.js') }}"></script>
        <script src = "{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <!-- Core plugin JavaScript-->
        <script src = "{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

        <!-- Custom scripts for all pages-->
        <script src = "{{ asset('js/sb-admin-2.min.js') }}"></script>
        <script src="{{ asset('css/js/main.js') }}"></script>
        <script type="text/javascript">
            $(document).ready(function(){

                    $('.field input, .field textarea, .field select').blur(function()
                    {
                        if($(this).val() != ''){
                        $(this).closest('.field').find('fieldset').addClass('active');
                    } else {
                    
                        $(this).closest('.field').find('fieldset').removeClass('active');
                    }
                    
                });
                $('.field input, .field textarea, .field select').focusin(function()
                    {
                        $(this).closest('.field').find('fieldset').addClass('active');
                });

            });
        </script>

    </body>

</html>
