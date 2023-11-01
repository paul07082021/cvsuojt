<?php
date_default_timezone_set('Asia/Karachi');
$date = date('Y-m-d H:i:s');
?>
<html>
<head>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<title> Galaxy Pay </title>
<script>


</script>
<style>
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
.form-control:focus,
.btn:focus{
    box-shadow: none !important;
}
.form-control:focus{
    border: 2px solid #0020c2;
}
body{
    /*background-image:url('https://galaxypay.online/bg.jpg');
    background-size: cover;
    background-repeat: no-repeat;*/
}
#staticBackdrop{
    z-index: 999999999;
}
/*Toggle Switch*/
.switch-container{
    margin-bottom: 10px;
}
.switch {
    position: absolute;
    display: inline-block;
    top:10px;
    right:10px;
    margin: 0 5px;
    z-index: 999;
}
.switch > span {
    position: absolute;
    top: 14px;
    pointer-events: none;
    font-family: 'Helvetica', Arial, sans-serif;
    font-weight: bold;
    font-size: 12px;
    text-transform: uppercase;
    text-shadow: 0 1px 0 rgba(0, 0, 0, .06);
    width: 50%;
    text-align: center;
}
input.check-toggle-round-flat:checked ~ .off {
    color: #0530ad;
}
input.check-toggle-round-flat:checked ~ .on {
    color: #fff;
}
.switch > span.on {
    left: 0;
    margin-top:-3px;
    padding-left: 2px;
    color: #0530ad;
}
.switch > span.off {
    right: 0;
    margin-top:-3px;
    padding-right: 4px;
    color: #fff;
}
.check-toggle {
    position: absolute;
    margin-left: -9999px;
    visibility: hidden;
}
.check-toggle + label {
    display: block;
    position: relative;
    cursor: pointer;
    outline: none;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}
input.check-toggle-round-flat + label {
    padding: 2px;
    width: 97px;
    height: 35px;
    background-color: #0530ad;
    -webkit-border-radius: 60px;
    -moz-border-radius: 60px;
    -ms-border-radius: 60px;
    -o-border-radius: 60px;
    border-radius: 60px;
}
input.check-toggle-round-flat + label:before, input.check-toggle-round-flat + label:after {
    display: block;
    position: absolute;
    content: "";
}
input.check-toggle-round-flat + label:before {
    top: 2px;
    left: 2px;
    bottom: 2px;
    right: 2px;
    background-color: #0530ad;
    -moz-border-radius: 60px;
    -ms-border-radius: 60px;
    -o-border-radius: 60px;
    border-radius: 60px;
}
input.check-toggle-round-flat + label:after {
    top: 4px;
    left: 4px;
    bottom: 4px;
    width: 48px;
    background-color: #fff;
    -webkit-border-radius: 52px;
    -moz-border-radius: 52px;
    -ms-border-radius: 52px;
    -o-border-radius: 52px;
    border-radius: 52px;
    -webkit-transition: margin 0.2s;
    -moz-transition: margin 0.2s;
    -o-transition: margin 0.2s;
    transition: margin 0.2s;
}
input.check-toggle-round-flat:checked + label:after {
    margin-left: 44px;
}

/*END*/
.guidelines{
    align-content: center;
    display: flex;
    justify-content: center;
    align-items: center;
}
#english-guide{
    padding:10px 30px;
}
#pakistan-guide{
    padding:10px 70px 10px 30px;
}
#pakistan-guide .guidelines-header{
    text-align: right;
}
#pakistan-guide h3{
    direction: rtl;
    text-align: right;
}
#pakistan-guide .guidelines-header h1{
    font-weight: bold;
    color: #0530ad;
    font-size:55px;
}
#pakistan-guide ol{
    padding-right: 30px;
}
#pakistan-guide ol li {
    font-size:21px;
    text-align: justify;
    direction: rtl;
}

#english-guide .guidelines-header{
    text-align: left;
}
#english-guide .guidelines-header h1{
    font-weight: bold;
    color: #0530ad;
    font-size:55px;
}
#english-guide ol li {
    font-size:21px;
    text-align: justify;
}

#staticBackdrop  .guidelines-header h1{
    font-weight: bold;
    color: #0530ad;
    font-size:35px;
}
#staticBackdrop ol li {
    font-size:17px;
}

#staticBackdrop2  .guidelines-header h1{
    font-weight: bold;
    color: #0530ad;
    font-size:35px;
    direction: rtl;
    text-align: right;
}
#staticBackdrop2 h3{
    direction: rtl;
    text-align: right;
}
#staticBackdrop2 ol{
    padding-right: 25px;
}

#staticBackdrop2 ol li {
    direction: rtl;
    font-size:17px;
    text-align: right;
}

.text-logo{
    color:#0530ad;
    font-weight: bold;
}
.easypaisa-logo{
    height: 50px;
    width: 50px;
    margin-top: -15px;
}
#copyButton{
    border-radius:0 3px 3px 0;
    background: #142CE2;
    background: linear-gradient(135deg, #142CE2, #0530ad);
    color:#fff;
}  

.headings{
    font-size:25px;
}
.card{
    border-radius: 1rem;
    margin-top:50px;
}
.card-body{
    text-align: center;
    padding: 20px 15px;
    background-color:#fff;
    border:2px solid #0530ad;
    border-radius: 15px;
}
.card-body-container{
    padding:15px 0;
}
.for-instructions{
    display: none;
}
#instructions-urdu,
#instructions-english{
    padding:5px;
    font-weight: 600;
    font-size:17px;
    color:#0530ad;
    text-decoration: underline;
    cursor: pointer;
}
#button1{
    background: #0530ad;
    background: linear-gradient(135deg, #142CE2, #0530ad);
    font-weight: 600;
    font-size:22px;
    color:#fff;
}

#button1:hover{
    background: #fff;
    border: 1px solid #0530ad;
    color:#0530ad;
    font-weight: 600;
}

#instructions-closed{
    background-color: #0530ad;
    color:#fff;
    font-size:19px;
    font-weight: bold;
}
/*Notification Alert*/
#toast-container {
    position: fixed;
    top: 20px;
    right: 10px;
    z-index: 9999;
}
.toast {
    background-color:#0530ad;  
    color: #fff;
    padding: 10px;
    border-radius: 4px;
    margin-bottom: 10px;
    opacity: 0;
    animation: fade-in 0.3s ease-in-out forwards;
}
.toast.show {
    opacity: 1;
}
@keyframes fade-in {
  0% {
    opacity: 0;
    transform: translateX(30px);
  }
  100% {
    opacity: 1;
    transform: translateX(0);
  }
}
  /*Containers*/
.main-container{
    padding: 30px 5px;
    margin:0;
    width:100%;
    overflow: hidden;
}
#date,
#mobilenum,
#image,
#transactionId,
#amount,
#up_referenceNum,
#file{
	text-align:center; 
	font-family: verdana; 
	font-size: 22px;
}
#errorModal .thank-you i{
    font-size: 7em; 
    color: red;
}
#successModal .thank-you i{
    font-size: 7em; 
    color: #0530ad;
}
@media(max-width:998px){
    .main-container{
        padding: 30px 0 0 0;
    }
    .card{
        margin:0;
        padding: 0;
        border: none;
    }
    .card-body{
        padding: 10px 15px;
        border:none;
    }
    .guidelines{
        display: none;
    }
    .for-instructions{
        display: block;
    }
    #english-guide,
    #pakistan-guide{
        display: none;
    }
}
@media(max-width:500px){
	.main-container{
        padding: 55px 0 0 0;
    }
	#date,
	#mobilenum,
	#image,
    #transactionId,
	#amount,
	#up_referenceNum,
	#file{
        font-size: 17px;
    }
}

@media(max-width:380px){
	.main-container{
        padding: 40px 0 0 0;
    }
}
</style>
</head>
<body>

<!--Languange Switch-->
<div class = "switch-container">

<div class="switch">
    <input id="language-toggle" class="check-toggle check-toggle-round-flat" type="checkbox">
    <label for="language-toggle"></label>
    <span class="on">PK</span>
    <span class="off">EN</span>
</div>
</div>
<!--End-->
<section id = "container" class="gradient-custom">
    <form method='post' action="{{ route('submitDeposit') }}" enctype='multipart/form-data'>
    @csrf
    <input name="data_mobilenum" value="{{ $data_mobilenum }}" hidden/>
    <input name="data_transactionId" value="{{ $data_transactionId }}" hidden />
    <input name="amount" value="{{ $data_amount }}"  hidden/>
    <input name="contact" value="{{ $randomContact->contact }}" hidden />
    <input name="agentname" value="{{ $username }}" hidden/>
    <input name="agentId" value="{{ $id }}" hidden/>
    <div class="main-container container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="guidelines col-12 col-md-8 col-lg-6 col-xl-5">
            <div id = "pakistan-guide" class="guidelines-content" >
               <div class="guidelines-header">
                    <h1>GALAXY PAY</h1>
               </div>
               <div>
                    <h3>ایزی پیسہ والٹ کے ذرائع سے ادائیگی کیسے کریں؟</h3>
               </div>
               <div>
                <ol>
                    <li>پہلے، اگر آپ موبائل فون استعمال کر رہے ہیں تو، ایزی پیسہ اکاؤنٹ نمبر کے بائیڈ کاپی بٹن پر کلک کریں۔ اگر نہیں تو، براہ کرم دوسرے قدم پر آگے بڑھیں۔</li>
                    <li>اپنے ایزی پیسہ والٹ کو کھولیں، پھر اگر آپ موبائل فون استعمال کر رہے ہیں تو اکاؤنٹ نمبر پیسٹ کریں یا اگر نہیں تو ہاتھ سے ٹائپ کریں۔</li>
                    <li>اس کے بعد، ترسیل نمبر کی تصدیق کے لئے منتظر رہیں۔</li>
                    <li>خالی جگہ میں ٹرانزیکشن نمبر درج کریں۔<br>
                        مثال: 3722243532323<br>
                         <span style="color:#0530ad;font-weight: 600;">تازہ دھیان دیں: براہ کرم 10 منٹ میں ٹرانزیکشن راضی کر لیں اور یقینی بنائیں کہ آپ کا داخل کردہ ٹرانزیکشن نمبر درست ہے۔</span>
                    </li>
                </ol>
                </div>
            </div>
            <div id = "english-guide" class="guidelines-content" hidden>
               <div class="guidelines-header">
                    <h1>GALAXY PAY</h1>
               </div>
               <div>
                    <h3>How to make a payment via Easypaisa wallet?</h3>
               </div>
               <div>
                <ol>
                    <li>First, if you are using mobile phone, click the <strong>copy</strong> button beside the <strong>Easypaisa Account number</strong>.
                        If not just proceed to step number 2.</li>
                    <li>Open your <strong>Easypaisa wallet</strong> then paste the account number if you're using mobile phone or manually type it if not.</li>
                    <li>After that wait for the confirmation SMS for the transaction number.</li>
                    <li>Enter the <strong>Transaction Number</strong> in the blank space in the form.<br>
                        Ex. 3722243532323<br>
                        <span style="color:#0530ad;font-weight: 600;">Reminder: Please Settle the transaction with in 10 minutes and Make sure that the transaction number you input is correct.</span>
                    </li>
                </ol>
                </div>
            </div>
            </div>
            <div class="col-12 col-md-8 col-lg-6 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-body-container">
                        <h1 class = "headings"><span class = "text-logo">GALAXY PAY</span> TO <img class = "easypaisa-logo" src="https://galaxypay.online/easy.png"></h1>
                        <div id="countdown" style="font-size: 24px; text-align: center;"></div>
                        <br>
                            <p class="text-white-50 mb-2"></p>
                            <div class = "for-instructions">
                                <a id="instructions-english" data-bs-toggle="modal" data-bs-target="#staticBackdrop" hidden>See Instructions</a>
                            </div>
                            <div class = "for-instructions">
                                <a id="instructions-urdu" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">دیکھیں ہدایات</a>
                            </div><br>
                            <!--<div class="form-outline form-white mb-4">
                                <input type="text" id="date" class="form-control form-control-lg"  value="<?php echo $date; ?>" readonly/>
                                <label id = "label-date" class="form-label">تاریخ</label>
                            </div>-->
                            <div class="form-outline form-white mb-3">
                                <input type="text" name="amount" id="amount" class="form-control form-control-lg" value="{{ $data_amount }}" readonly />
                                <label id = "label-amount" class="form-label" disabled>رقم</label>
                            </div>
                            <div class="form-outline form-white mb-3">
                            <div class = "d-flex">
                                <input type="text" name="contact" id="mobilenum" class="form-control form-control-lg" value="{{ $randomContact->contact }}" style = "border-radius:3px 0 0 3px;" readonly/>
                                <button type = "button" id="copyButton" title = "Copy" class="btn"><i class="fa-solid fa-copy"></i></button>
                            </div>
                                <label id = "label-account" class="form-label" disabled> ایزی پیسہ اکاؤنٹ نمبر</label>
                            </div>
                            <!--<div class="form-outline form-white mb-4">
                                <input type="text" name="data_transactionId" id="transactionId" class="form-control form-control-lg" value="{{ $data_transactionId }}" readonly/>
                                <label id = "order-id" class="form-label" disabled>آرڈر نمبر</label>
                            </div>-->
                            <div class="form-outline form-white mb-5">
                                <input type="text" name="up_referenceNum" id="up_referenceNum" minlength = "11" maxlength = "11"  class="form-control form-control-lg" required/>
                                <label id = "label-transaction-number" class="form-label">ٹرانزیکشن نمبر</label>
                            </div>
                            <br>
                                <button name="submit" id="button1" class="btn form-control">جمع کریں</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</section>
<div id="toast-container"></div>
<!-- Error Modal -->
<div class="modal fade" id="errorModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body" style="text-align: center;">
                <div class="thank-you mb-2">
                    <i class="fas fa-circle-xmark"></i>
                </div>
                <h4 class="thank-you-word">{{ session('error') }}</h4>
                <br>
                <button class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close" style="width:100px;">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end pop up modal -->
<!-- Success Modal -->
<div class="modal fade" id="successModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body" style="text-align: center;">
                <div class="thank-you mb-2">
                    <i class="fas fa-circle-check"></i>
                </div>
                <h4 class="thank-you-word">{{ session('success') }} </h4>
                <br>
                <button class="btn" onclick = "window.location.href = 'https:\/\/www.fun24k.com';" style="width:100px;background:#0530ad;color:#fff;">Okay</button>
            </div>
        </div>
    </div>
</div>
<!-- end pop up modal -->

<!--Modal for Instructions-->
<!-- Modal English -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-body pt-5">
            <div class="guidelines-header">
                <h1>GALAXY PAY</h1>
           </div>
            <div>
                <h3>How to make a payment via Easypaisa wallet?</h3>
           </div>
           <div>
            <ol>
                <li>First, if you are using mobile phone, click the <strong>copy</strong> button beside the <strong>Easypaisa Account number</strong>.
                    If not just proceed to step number 2.</li>
                <li>Open your <strong>Easypaisa wallet</strong> then paste the account number if you're using mobile phone or manually type it if not.</li>
                <li>After that wait for the confirmation SMS for the transaction number.</li>
                <li>Enter the <strong>Transaction Number</strong> in the blank space in the form.<br>
                    Ex. 3722243532323<br>
                    <span style="color:#0530ad;font-weight: 600;">Reminder: Please Settle the transaction with in 10 minutes and Make sure that the transaction number you input is correct.</span>
                </li>
            </ol>
            </div>
        </div>
        <div class="modal-footer">
          <button id = "instructions-closed" type="button" class="btn form-control" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<!-- end pop up modal -->

<!-- Modal Urdu -->
<div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-body pt-5">
            <div class="guidelines-header">
                <h1>GALAXY PAY</h1>
            </div>
            <div>
                <h3>ایزی پیسہ والٹ کے ذرائع سے ادائیگی کیسے کریں؟</h3>
            </div>
            <div>
                <ol>
                    <li>پہلے، اگر آپ موبائل فون استعمال کر رہے ہیں تو، ایزی پیسہ اکاؤنٹ نمبر کے بائیڈ کاپی بٹن پر کلک کریں۔ اگر نہیں تو، براہ کرم دوسرے قدم پر آگے بڑھیں۔</li>
                    <li>اپنے ایزی پیسہ والٹ کو کھولیں، پھر اگر آپ موبائل فون استعمال کر رہے ہیں تو اکاؤنٹ نمبر پیسٹ کریں یا اگر نہیں تو ہاتھ سے ٹائپ کریں۔</li>
                    <li>اس کے بعد، ترسیل نمبر کی تصدیق کے لئے منتظر رہیں۔</li>
                    <li>خالی جگہ میں ٹرانزیکشن نمبر درج کریں۔<br>
                        مثال: 3722243532323<br>
                        <span style="color:#0530ad;font-weight: 600;">تازہ دھیان دیں: براہ کرم 10 منٹ میں ٹرانزیکشن راضی کر لیں اور یقینی بنائیں کہ آپ کا داخل کردہ ٹرانزیکشن نمبر درست ہے۔</span>
                    </li>
                </ol>
                </div>
        </div>
        <div class="modal-footer">
          <button id = "instructions-closed" type="button" class="btn form-control" data-bs-dismiss="modal">بند کریں</button>
        </div>
      </div>
    </div>
  </div>
<!-- end pop up modal -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
// Function to copy the text from the input field
function copyText() {
    const textToCopy = document.getElementById("mobilenum");
    textToCopy.select(); // Select the text inside the input field
    document.execCommand("copy"); // Copy the selected text to clipboard
    
  var textCopy = textToCopy.value;

  // Create a temporary input element
  var tempInput = document.createElement("input");
  tempInput.setAttribute("value", textToCopy);
  document.body.appendChild(tempInput);

  // Select the text in the temporary input
  tempInput.select();

// Remove the temporary input
  document.body.removeChild(tempInput);
    showToast();
}
// Event listener to trigger the copyText function when the button is clicked
const copyButton = document.getElementById("copyButton");
copyButton.addEventListener("click", copyText);

//For showing alert that account number is copied
function showToast() {
    const toggleSwitch = document.getElementById('language-toggle');
    var toastContainer = document.getElementById("toast-container");
    // Create toast element
    var toast = document.createElement("div");
    toast.className = "toast";
    if(toggleSwitch.checked){
        toast.textContent = "Easypaisa Account Number Copied!";
    }
    else{
        toast.textContent = "ایزی پیسہ اکاؤنٹ نمبر کاپی ہو گیا!";
        toast.style.direction = "rtl";
        toast.style.textAlign = "right";
    }
    //toast.style.backgroundColor = "green";
    // Append toast to container
    toastContainer.appendChild(toast);
    // Show toast
    toast.classList.add("show");
    // Automatically remove toast after 3 seconds

    setTimeout(function() {
        toastContainer.removeChild(toast);
    }, 5000);
}

window.addEventListener("resize", function() {
    var toastContainer = document.getElementById("toast-container");
    var windowHeight = window.innerHeight;
    // Adjust the position of the toast container based on screen height
    toastContainer.style.top = Math.floor(windowHeight * 0.1) + "px";
});


// Function to update the countdown timer
function updateCountdown(minutes, seconds) {
    const countdownElement = document.getElementById('countdown');
    countdownElement.textContent = `${minutes}:${seconds.toString().padStart(2, '0')}`;
}

// Function to close the window
function closeWindow() {
    // Unset the "remainingTime" session variable in localStorage
    localStorage.removeItem('remainingTime');
    window.close();
}

// Function to start the countdown
function startCountdown() {
    // Check if the remaining time is stored in localStorage
    let timeRemaining = localStorage.getItem('remainingTime');

    if (timeRemaining === null) {
        timeRemaining = 600; // 10 minutes in seconds
    } else {
        timeRemaining = parseInt(timeRemaining);
    }

    updateCountdown(Math.floor(timeRemaining / 60), timeRemaining % 60);

    const countdownInterval = setInterval(() => {
        timeRemaining -= 1;
        if (timeRemaining < 0) {
            clearInterval(countdownInterval);
            closeWindow();
        } else {
            // Store the updated remaining time in localStorage
            localStorage.setItem('remainingTime', timeRemaining);

            updateCountdown(Math.floor(timeRemaining / 60), timeRemaining % 60);
        }
    }, 1000);
}

// Add event listener to detect window closing (beforeunload event)
window.addEventListener('beforeunload', () => {
    // Clear the "remainingTime" session variable in localStorage when the window is about to close
    localStorage.removeItem('remainingTime');
});

// Call the startCountdown function when the document is ready
document.addEventListener('DOMContentLoaded', startCountdown);


// JavaScript to handle the toggle switch functionality
const toggleSwitch = document.getElementById('language-toggle');
let urdu_guide = document.getElementById('pakistan-guide'),
    english_guide = document.getElementById('english-guide'),
    instructions_urdu = document.getElementById('instructions-urdu'),
    instructions_english = document.getElementById('instructions-english'),
    label_amount = document.getElementById('label-amount'),
    //label_date = document.getElementById('label-date'),
    label_account = document.getElementById('label-account'),
    label_order_id = document.getElementById('order-id'),
    label_transaction_number = document.getElementById('label-transaction-number');
    upReferrence = document.getElementById('up_referenceNum');
    button1 = document.getElementById('button1');

    upReferrence.placeholder = "ٹرانزیکشن نمبر درج کریں";
toggleSwitch.addEventListener('change', function () {

  if(this.checked){
    urdu_guide.style.display = "none";
    english_guide.style.display = "block";
    english_guide.removeAttribute("hidden");

    instructions_urdu.style.display = "none";
    instructions_english.style.display = "block";
    instructions_english.removeAttribute("hidden");

   // label_date.innerHTML = "Date";
    label_amount.innerHTML = "Amount";
    label_account.innerHTML = "Easypaisa Account Number";
    upReferrence.placeholder = "Enter Transaction Number";
    label_transaction_number.innerHTML = "Transaction Number";
    button1.innerHTML = "Submit";
   // label_order_id.innerHTML = "Order ID";
  }else{
    urdu_guide.style.display = "block";
    english_guide.style.display = "none";
    english_guide.setAttribute("hidden", "true");

    instructions_urdu.style.display = "block";
    instructions_english.style.display = "none";
    instructions_english.setAttribute("hidden", "true");

  //  label_date.innerHTML = "تاریخ"
    label_amount.innerHTML = "رقم";
    label_account.innerHTML = "ایزی پیسہ اکاؤنٹ نمبر";
    upReferrence.placeholder = "ٹرانزیکشن نمبر درج کریں";
    label_transaction_number.innerHTML = "ٹرانزیکشن نمبر";
    button1.innerHTML = "جمع کریں";
   // label_order_id.innerHTML = "آرڈر نمبر";
  }

  // You can add code here to handle language change based on the switch state
  // For this example, we're just updating the language text.
});
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
</body>
</html>
