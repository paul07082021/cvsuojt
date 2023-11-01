<?php
date_default_timezone_set('Asia/Karachi');
$date = date('Y-m-d H:i:s');
?>


<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title> Galaxy Pay </title>
	<style>
	#date,
	#mobilenum,
	#image,
	#transactionId,
	#amount,
	#up_referenceNum,
	#file{
	    text-align:center; 
	    font-family: verdana; 
	    font-size: 160%;
	}
	    @media(max-width:500px){
	        #container{
	            padding:20px 0px;
	        }
	        #date,
	        #mobilenum,
	        #image,
	        #transactionId,
	        #amount,
	        #up_referenceNum,
	        #file{
        	    font-size: 19px;
        	}
	    }
	</style>
</head>
<body style="background-image:url('https://galaxypay.online/bg.jpg');">
<section id = "container" class="vh-100 gradient-custom">
    <form method='post' action="{{ route('submitDeposit') }}" enctype='multipart/form-data'>
    @csrf
        <input name="data_mobilenum" value="{{ $data_mobilenum }}" hidden/>
        <input name="data_transactionId" value="{{ $data_transactionId }}" hidden />
        <input name="amount" value="{{ $data_amount }}"  hidden/>
        <input name="contact" value="{{ $randomContact->contact }}" hidden />
        <input name="agentname" value="{{ $username }}" hidden/>
        <input name="agentId" value="{{ $id }}" hidden/>


    <!-- <h1>Deposit Slip</h1>
    <p>Username: {{ $randomContact->username }}</p>
    <p>Contact: {{ $randomContact->contact }}</p> -->

        <div class="container pt-2 pb-2 py-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center" style="background-color:#1c4c54; border:2px solid black; border-radius: 15px;">

                            <div class="mb-md-5 mt-md-4 pb-5" style="background-color:#1c4c54;">
                            <h1 style="font-size: 25px;"> GALAXY PAY TO <img src="https://galaxypay.online/easy.png" height="50" width="50"style="margin-top:-15px;"></h1>
                            <div id="countdown" style="font-size: 24px; text-align: center;"></div>

                                <p class="text-white-50 mb-5"></p>

                                <div class="form-outline form-white mb-4">
                                    <input type="text" id="date" class="form-control form-control-lg"  value="<?php echo $date; ?>" readonly/>
                                    <label class="form-label">Date</label>
                                </div>

                                <div class="form-outline form-white mb-4">
                                <input type="text" name="contact" id="mobilenum" class="form-control form-control-lg" value="{{ $randomContact->contact }}" readonly/>
                                    <label class="form-label" disabled> Easypaisa Account Number</label>
                                </div>
                                <div class="form-outline form-white mb-4">
                                    <input type="text" name="data_transactionId" id="transactionId" class="form-control form-control-lg" value="{{ $data_transactionId }}" readonly/>
                                    <label class="form-label" disabled>Order ID</label>
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <input type="text" name="amount" id="amount" class="form-control form-control-lg" value="{{ $data_amount }}" readonly />
                                    <label class="form-label" disabled>Amount</label>
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <input type="text" name="up_referenceNum" id="up_referenceNum" placeholder="Enter Transaction number"  class="form-control form-control-lg" required/>
                                    <label class="form-label">Transaction Number</label>
                                </div>
                                <button name="submit" id="button1" class="btn btn-outline-light btn-lg px-5">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
    <!-- pop up modal -->
	<div class="modal fade" id="errorImage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="height: 300px;"><br>
    <div class="thank-you" style="text-align:center;">
    <h4 class="thank-you-word">
    {{ session('errorimage') }}</h4><br>
		
    <i class="fas fa-circle-exclamation" style="font-size: 9em; color: red;"></i><br><br>
    <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close" style="width:100px; margin-bottom:-40px;">OKAY</button></button>
    <br><br>
	
	</div>
    </div>
    </div>
    </div>
		<!-- end pop up modal -->

    <!-- pop up modal -->
	<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="height: 300px;"><br>
    <div class="thank-you" style="text-align:center;">
    <h4 class="thank-you-word">
    {{ session('error') }}</h4><br>
		
    <i class="fas fa-circle-exclamation" style="font-size: 9em; color: red;"></i><br><br>
    <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close" style="width:100px; margin-bottom:-40px;">OKAY</button></button>
    <br><br>
	
	</div>
    </div>
    </div>
    </div>
		<!-- end pop up modal -->



        <!-- pop up modal -->
	<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="height: 350px;"><br>
    <div class="thank-you" style="text-align:center;">
    <h4 class="thank-you-word">{{ session('success') }}</h4><br>
    <i class="fa-sharp fa-solid fa-circle-check" style="font-size: 9em; color: blue;"></i><br><br>
    <a href="https://www.fun24k.com"><button type="button" class="btn btn-primary" style="width:100px; margin-bottom:-40px;">OKAY</button></button></a>
    <br><br>
	</div>
    </div>
    </div>
    </div>
		<!-- end pop up modal -->

</body>
<script>
    // Function to update the countdown timer
    function updateCountdown(minutes, seconds) {
        const countdownElement = document.getElementById('countdown');
        countdownElement.textContent = `${minutes}:${seconds.toString().padStart(2, '0')}`;
    }

    // Function to close the window
    function closeWindow() {
        window.close();
    }

    // Function to start the countdown
    function startCountdown() {
        let timeRemaining = 600; // 10 minutes in seconds
        updateCountdown(Math.floor(timeRemaining / 60), timeRemaining % 60);

        const countdownInterval = setInterval(() => {
            timeRemaining -= 1;
            if (timeRemaining < 0) {
                clearInterval(countdownInterval);
                closeWindow();
            } else {
                updateCountdown(Math.floor(timeRemaining / 60), timeRemaining % 60);
            }
        }, 1000);
    }

    // Call the startCountdown function when the document is ready
    document.addEventListener('DOMContentLoaded', startCountdown);
</script>

@if (session('errorimage'))
<script>
    $(document).ready(function() {
        $('#errorImage').modal('show');
});
</script>
@endif 


@if (session('error'))
<script>
    $(document).ready(function() {
        $('#errorModal').modal('show');
});
</script>
@endif 

@if (session('success'))
<script>
    $(document).ready(function() {
        $('#successModal').modal('show');
});
</script>
@endif 
</html>
