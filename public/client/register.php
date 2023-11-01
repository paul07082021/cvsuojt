<!DOCTYPE html>
<?php
include 'header.php';
?>
<div>
    <div class="header-dark" style="height:100%;background-image:url(&quot;none&quot;);background-color:rgba(255,255,255,0);">
        <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search">
            <div class="container"><a class="navbar-brand" href="#">Barangay Milagrosa</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse"
                     id="navcol-1">
                    <ul class="nav navbar-nav">
                        <li class="nav-item" role="presentation"><a class="nav-link" href="#">Schedules</a></li>
                    </ul>
                    <form class="form-inline mr-auto" target="_self">
                        <div class="form-group"><label for="search-field"><i class="fa fa-search"></i></label></div>
                    </form><span class="navbar-text"><a href="#" class="login">Log In</a></span><a class="btn btn-light action-button" role="button" href="#">Sign Up</a></div>
            </div>
        </nav>
        <div class="container hero">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <h1 class="text-center">Register</h1>
                    <div class="row">
                        <div class="col-lg-4">
                            <p style="color:rgb(255,255,255);font-size:20px;">Full Name:</p>
                        </div>
                        <div class="col"><input type="text"></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <p style="color:rgb(255,255,255);font-size:20px;">Address:</p>
                        </div>
                        <div class="col"><input type="text"></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <p style="color:rgb(255,255,255);font-size:20px;">Username:</p>
                        </div>
                        <div class="col"><input type="text"></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <p style="color:rgb(255,255,255);font-size:20px;">Password:</p>
                        </div>
                        <div class="col"><input type="password"></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <p style="color:rgb(255,255,255);font-size:20px;">ID image:</p>
                        </div>
                        <div class="col"><input type="file" style="color:rgb(255,255,255);"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include 'footer.php';
?>