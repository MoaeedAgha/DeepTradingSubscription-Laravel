@include('layouts.front_header')
    <style>
            .fa {
                
                font-size: -webkit-xxx-large !important;
                
            }
            .btn-block {
            display: block;
            width: 88%;
            background-color: orange;
        }
        </style>
        <div class = "container">

            <!-- Outer Row -->
            <div class = "row justify-content-center">

                <div class = "col-lg-5">

                    <div class = "card o-hidden border-0 shadow-lg" style="margin-top: 15%; background: none" >
                        <div class = "card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class = "row">
                                <div class = "col-lg-12">
                                    <div class = "p-5">
                                    @if ($error = Session::get('error'))
                                        <div class="alert alert-danger">
                                            {{ $error }}
                                        </div>
                                        @endif
                                        <div class = "text-center">
                                            <i class="fa fa-user-circle fa-6x" style="color: #858796"></i>
                                            <h1 class = "h4 text-gray-900 mt-2 mb-4">
                                                Log In</h1>
                                        </div>
                                        <div class="contactForm">
                                        <form method = "POST" action = "{{ route('login') }}" class="user AnimationForm">
                                            @csrf
                                            <div class = "form-group row">
                                                <div class = "col-md-12">
                                                    <div class="field" data-aos="fade-up">
                                                        <input id = "Email" type = "email"
                                                            class = "@error('Email') is-invalid @enderror"
                                                            name = "Email" value = "{{ old('Email') }}" required
                                                            >
                                                        @error('Email')
                                                        <span class = "invalid-feedback" role = "alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <fieldset>Enter your email address <span>*</span></fieldset>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class = "form-group row">
                                                <div class = "col-md-12">
                                                    <div class="field" data-aos="fade-up" data-aos-delay="200">
                                                        <input id = "Password" type = "password"
                                                            class = "@error('Password') is-invalid @enderror"
                                                            name = "Password" required autocomplete = "current-password"
                                                        >
                                                        @error('Password')
                                                        <span class = "invalid-feedback" role = "alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <fieldset>Password <span>*</span></fieldset>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class = "form-group row mb-0">
                                                <div class = "col-md-12 text-center">
                                                    <button type = "submit" class = "btn btn-dark btn-block">
                                                        {{ __('Login') }}
                                                    </button>
                                                    <hr>
                                                    @if (Route::has('password.request'))
                                                        <a class = "lg"
                                                           href = "{{ route('password.request') }}">
                                                            {{ __('Forgot Your Password?') }}
                                                        </a>
                                                    @endif
                                                    @if (Route::has('register'))
                                                        <br>
                                                        <a class = ""
                                                           href = "{{ route('register') }}">
                                                            {{ __('Create a new account') }}
                                                        </a>
                                                    @endif
                                                </div>
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
