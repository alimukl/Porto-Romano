<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>OTP Verification Form</title>
        <!-- Bootstrap 5 CDN Link -->
        <link rel="icon" type="image/png" href="{{ asset('assets/img/porto-romano.png') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Custom CSS Link -->
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('assets/css/ionicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    </head>

    <style>
            /* Google Poppins Font CDN Link */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

        *{
            margin:0;
            padding:0;
            box-sizing: border-box;
        }

        /* Variables */
        :root{
            --primary-font-family: 'Poppins', sans-serif;
            --light-white:#f5f8fa;
            --gray:#5e6278;
            --gray-1:#e3e3e3;
        }
        body {
                font-family: var(--primary-font-family);
                font-size: 14px;
                background-image: url("{{ asset('assets/img/otp-bg.jpg') }}");
                background-size: cover; /* Ensure it covers the full screen */
                background-position: center;
                background-repeat: no-repeat;
            }

        /* Main CSS OTP Verification New Changing */ 
        .wrapper{
            padding:0 0 100px;
            margin-top:150px;
            background-position:bottom center;
            background-repeat: no-repeat;
            background-size: contain;
            background-attachment: fixed;
            min-height: 100%;
            /* height:100vh;
            display:flex;
            align-items:center;
            justify-content:center; */
        }
        .wrapper .logo img{
            max-width:75%;
        }
        .wrapper input{
            background-color:var(--light-white);
            border-color:var(--light-white);
            color:var(--gray);
        }
        .wrapper input:focus{
            box-shadow: none;
        }
        .wrapper .password-info{
            font-size:10px;
        }
        .wrapper .submit_btn{
            padding:10px 15px;
            font-weight:500;
        }
        .wrapper .login_with{
            padding:8px 15px;
            font-size:13px;
            font-weight: 500;
            transition:0.3s ease-in-out;
        }
        .wrapper .submit_btn:focus,
        .wrapper .login_with:focus{
            box-shadow: none;
        }
        .wrapper .login_with:hover{
            background-color:var(--gray-1);
            border-color:var(--gray-1);
        }
        .wrapper .login_with img{
            max-width:7%;
        } 

        /* OTP Verification CSS */
        .wrapper .otp_input input{
            width:14%;
            height:70px;
            text-align: center;
            font-size: 20px;
            font-weight: 600;
        }

        @media (max-width:1200px){
            .wrapper .otp_input input{ 
                height:50px; 
            }
        }
        @media (max-width:767px){
            .wrapper .otp_input input{ 
                height:40px; 
            }
        }
        
        img {
        margin: 0 auto;
        display: block;
        margin-top: 20%;
        }

        .otp-box {
                width: 40px;
                height: 50px;
                font-size: 20px;
                text-align: center;
                margin-right: 5px;
                box-shadow: 4px 4px 10px rgba(176, 176, 176, 0.5); /* Stronger shadow */
            }

    </style>

    <body> 
            <!-- Bootstrap 5 Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header ftco-degree-bg">
		        <button type="button" class="close d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true" class="ion-ios-close"></span>
		        </button>
		      </div>
		      <div class="modal-body pt-md-0 pb-md-5 text-center">
		      	<h2>You've Got Mail!</h2>
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<img src="{{ asset('assets/img/email.svg') }}" alt="" class="img-fluid">
		      	</div>
                <br>
		      	<h4 class="mb-2">We have send OTP number to your email:</h4>
		      	<h3>{{ $email }}</h3>
		      </div>
		    </div>
		  </div>
		</div>

        <section class="wrapper">
            <div class="container">
                <div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-6 offset-xl-3 text-center">
                    <div class="logo">
                        <img decoding="async" src="{{ asset('assets/img/logo-porto-romano-2.png') }}" class="img-fluid" alt="logo">
                    </div>
                    <form method="POST" action="{{ route('verify.mfa') }}" class="rounded bg-white shadow p-5">
                        @csrf
                        <h3 class="text-dark fw-bolder fs-4 mb-2">Two Step Verification</h3>
                        <div class="fw-normal text-muted mb-4">
                            Enter the verification code we sent to your email.
                        </div> 
                        <div class="fw-normal mb-4">
                        Type your 6-digit security code
                        </div>

                        @if ($errors->has('otp'))
                            <div class="alert alert-danger">
                                {{ $errors->first('otp') }}
                            </div>
                        @endif

                        <div class="otp_input text-start mb-2">
                            <div class="d-flex justify-content-between mt-2">
                                <input type="text" name="otp[]" class="otp-box form-control text-center" maxlength="1" required>
                                <input type="text" name="otp[]" class="otp-box form-control text-center" maxlength="1" required>
                                <input type="text" name="otp[]" class="otp-box form-control text-center" maxlength="1" required>
                                <input type="text" name="otp[]" class="otp-box form-control text-center" maxlength="1" required>
                                <input type="text" name="otp[]" class="otp-box form-control text-center" maxlength="1" required>
                                <input type="text" name="otp[]" class="otp-box form-control text-center" maxlength="1" required>
                            </div> 
                        </div>  

                        <input type="hidden" name="otp_combined" id="otp_combined"> 

                        <button type="submit" class="btn btn-danger submit_btn my-4">Verify</button>

                        <div class="fw-normal text-muted mb-2">
                        For security reasons, do not share this code with <a href="#" class="text-danger fw-bold text-decoration-none">anyone.</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const inputs = document.querySelectorAll(".otp-box");
                const hiddenInput = document.getElementById("otp_combined");

                inputs.forEach((input, index) => {
                    input.addEventListener("input", (e) => {
                        if (e.target.value.length === 1) {
                            if (index < inputs.length - 1) {
                                inputs[index + 1].focus();
                            }
                        }
                        updateHiddenInput();
                    });

                    input.addEventListener("keydown", (e) => {
                        if (e.key === "Backspace" && input.value.length === 0 && index > 0) {
                            inputs[index - 1].focus();
                        }
                    });
                });

                function updateHiddenInput() {
                    hiddenInput.value = Array.from(inputs).map(i => i.value).join("");
                }
            });
        </script>

    </body>
</html>

<script>
    
    // Ensure the modal appears when the page loads
    document.addEventListener("DOMContentLoaded", function() {
        var myModal = new bootstrap.Modal(document.getElementById('exampleModalCenter'));
        myModal.show();
    });
</script>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>