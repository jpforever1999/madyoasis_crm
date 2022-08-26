<!DOCTYPE html>
<html>

<head>
    <!-- -------------- Meta and Title -------------- -->
    <meta charset="utf-8">
	<title>Log In | Madyoasis</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	
    <meta name="keywords" content="HTML5, Bootstrap 3, Admin Template, UI Theme"/>
    <meta name="description" content="Alliance - A Responsive HTML5 Admin UI Framework">
    <meta name="author" content="ThemeREX">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- -------------- Favicon -------------- -->
    <link rel="shortcut icon" href="/assets/img/favicon.ico">
	
	
	<!-- App css -->
    <link href="/assets/skin/default_skin/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />
    <!-- icons -->
    <link href="/assets/skin/default_skin/css/icons.min.css" rel="stylesheet" type="text/css" />

    <!-- -------------- IE8 HTML5 support  -------------- -->
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="loading auth-fluid-pages pb-0">

    <div class="auth-fluid">
        <!--Auth fluid left content -->
        <div class="auth-fluid-form-box">
            <div class="align-items-center d-flex h-100">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="auth-brand text-center text-lg-start">
                        <div class="auth-logo">
                            <a href="index.html" class="logo logo-dark text-center">
                                <span class="logo-lg">
                                        <img src="/assets/img/logo.png" class="img-fluid" alt="" height="22">
                                    </span>
                            </a>

                            <a href="index.html" class="logo logo-light text-center">
                                <span class="logo-lg">
                                        <img src="/assets/img/logo.png" class="img-fluid" alt="" height="22">
                                    </span>
                            </a>
                        </div>
                    </div>

                    <!-- title-->
                    <h4 class="mt-0">Sign In</h4>
                    <p class="text-muted mb-4">Enter your email address and password to access account.</p>

                    <!-- form -->
                    {!! Form::open() !!}
                   <!-- <form action="index.html" method="post" enctype="multipart/form-data">-->
                        <div class="mb-3">
                                @if (session('message'))
                                <div class="alert {{session('class')}}">
                                    {{ session('message') }}
                                </div>
                            @endif
                        </div>


                        <div class="mb-3">
                            <label for="admin_email_address" class="form-label">Email address <strong style="color: red;">*</strong></label>
                            <input type="text" name="email" id="email" class="form-control gui-input" placeholder="Email">
                        </div>
                        <div class="mb-3">
                            <a href="" class="text-muted float-end"><small>Forgot your password?</small></a>
                            <label for="admin_password" class="form-label">Password <strong style="color: red;">*</strong></label>
                            <div class="input-group input-group-merge">
                            <input type="password" name="password" id="password" class="form-control gui-input" placeholder="Password">
                                <div class="input-group-text" id="admin_password" data-password="false">
                                    <span class="password-eye"></span>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="checkbox_signin" name="checkbox_signin" value="1">
                                <label class="form-check-label" for="checkbox_signin">Remember me</label>
                            </div>
                        </div>

                        <div class="text-center d-grid">
                       
                            <button class="btn btn-primary" type="submit">Log In </button>

                        <div class="pull-left pt5">
                            <a href="/reset-password">Reset Password</a>
                        </div>


                        </div>
                         

                    <!--</form>-->
                    {!! Form::close() !!}
                    <!-- end form-->



                </div>
                <!-- end .card-body -->
            </div>
            <!-- end .align-items-center.d-flex.h-100-->
        </div>
        <!-- end auth-fluid-form-box-->

        <!-- Auth fluid right content -->
        <div class="auth-fluid-right text-center">
            <div class="auth-user-testimonial">
                <h2 class="mb-3 text-white">Madyoasis Employee CRM!</h2>
                <p class="lead"> Lorem Ipsum is simply dummy text of the printing and typesetting industry.
				Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a 
				galley of type and scrambled it to make a type specimen book.
                </p>

            </div>
            <!-- end auth-user-testimonial-->
        </div>
        <!-- end Auth fluid right content -->
    </div>
    <!-- end auth-fluid-->
 
</body>

<!-- -------------- Scripts -------------- -->

<!-- -------------- new Theme Scripts -------------- -->
<script src="/assets/js/vendor.min.js"></script>
<!-- App js -->
<script src="/assets/js/app.min.js"></script>
	

<!-- -------------- /Scripts -------------- -->

</body>

</html>