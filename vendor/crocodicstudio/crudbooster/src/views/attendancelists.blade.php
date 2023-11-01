@extends('crudbooster::admin_template')
@section('content')
<?php
echo  CRUDBooster::myid();
        ?>
<!-- Your custom  HTML goes here -->
<div class="col-md-3">
          <!-- Application buttons -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Attendance</h3>
            </div>
            <div class="box-body">
              <p>Attendance</p>
              
              <a class="btn btn-app btn_checkin">
                  
                <i class="fa fa-sign-in btn_checkin"></i> Check-In  
              </a>
             
               
              <a class="btn btn-app">
                <i class="fa fa-sign-out"></i> Check-Out
              </a>
          
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          
          <!-- /.box -->
        </div>

@endsection

