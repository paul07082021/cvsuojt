<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Yazzea Register</title>
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" >
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="{{ asset('public/assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href=" {{ asset('public/assets/css/Login-Form-Basic-icons.css') }}">
    <style>
        .is-invalid {
    border-color: #dc3545 !important; /* Red border color */
    background-color: #f8d7da !important; /* Light red background color */
    color: #721c24 !important; /* Dark red text color */
    }
    </style>
</head>
<script>
function reg() {
    event.preventDefault();
    var formData = new FormData(document.querySelector("form"));
    $.ajax({
        type: 'POST',
        url: '{{ route('register') }}', 
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            console.log(response.message);
             $("#email").removeClass("is-invalid");
            $("#username").removeClass("is-invalid");
            $("#contact").removeClass("is-invalid");
              
              if (response.message === 'success') {
                $("form")[0].reset();
                $("#successModal").modal("toggle");
              }
            else{
                 if (response.message === 'emailexist') {
                $("#email").addClass("is-invalid");
            }
            if (response.message === 'userexist') {
                $("#username").addClass("is-invalid");
            }
            if (response.message === 'contactexist') {
                $("#contact").addClass("is-invalid");
            }
               

                 
              }
             
            
        },
        error: function(error) {
            alert(error);
           // $("#exampleModal").modal("toggle");
            console.error(error);
          
        }
    });
}

</script>



<body>
    <section class="py-4 py-xl-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2>Registration</h2>
                    <p>Please fill up all information</p>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-5">
                        <div class="card-body d-flex flex-column align-items-center">
                            <div class="bs-icon-xl bs-icon-circle bs-icon-primary bs-icon my-4">
                                <picture style="color: rgba(255,255,255,0);"><img src="public/assets/img/Vector%20Smart%20Object.png" width="89" height="103"></picture>
                            </div>
                        <form class="text-center form-yazzea" method="post" >
                            @csrf 
                            <div class="mb-3 field-div-yazzea">
                                <input class="form-control field-input-yazzea" type="text" placeholder="First Name" name="firstname" required>
                                <input class="form-control field-input-yazzea" type="text" placeholder="Last Name" name="lastname"  required>
                            </div>
                            <div class="mb-3 field-div-yazzea">
                                <input class="form-control field-input-yazzea" type="email" name="email" placeholder="Email" id="email" required>
                            </div>
                          
                            <div class="mb-3 field-div-yazzea">
                                <input class="form-control field-input-yazzea" type="password" name="password" placeholder="Password" required>
                            </div>
                            <div class="mb-3 field-div-yazzea">
                                <input class="form-control field-input-yazzea" type="text" placeholder="Contact Number" name="contactnumber" id="contact" required>
                            </div>
                            <div class="mb-3 field-div-yazzea">
                                <input class="form-control field-input-yazzea" type="text" placeholder="Address" name="address" required>
                            </div>
                           <div class="mb-3 field-div-yazzea">
                                <input class="form-control field-input-yazzea" type="text" placeholder="Referal Code" name="referal" required>
                            </div>
                           
                            <div class="mb-3 field-div-yazzea">
                                <button class="btn btn-primary d-block w-100 field-input-yazzea" onclick="reg();">Register</button>
                            </div>
                            <div class="mb-3">
                                <p class="text-muted field-input-yazzea">Already Registered?<a href="https://yazzea.com/public/admin/login" style="margin-left: 5px;">Login here</a></p>
                            </div>
                        </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   
  


    <script src="public/assets/bootstrap/js/bootstrap.min.js"></script>
    
</body>
<!-- Modal for failed -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
           
            <div class="modal-body">
                <center>
                    <h1>Error Occured</h1>
                <i class="fa-solid fa-circle-exclamation" style="font-size:10em; color:red;"></i><br><br>
                   <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                  OKAY
                </button>
                </center>
            </div>
          
        </div>
    </div>
</div>
<!-- Modal for success -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
           
            <div class="modal-body">
                <center>
                    <h1>Registration Success</h1>
                <i class="fa-solid fa-circle-check" style="font-size:10em; color:green;"></i><br><br>
                   <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                  OKAY
                </button>
                </center>
            </div>
          
        </div>
    </div>
</div>
</html>