@extends('crudbooster::admin_template')
@section('content')
<?php
//echo session('admin_id');
//echo $users->attendance_status;
        ?>
<!-- Your custom  HTML goes here -->
<div class="col-md-3">
    @foreach ($users as $user)
          <!-- Application buttons -->
          <div class="box">
             
            <div class="box-header">
              <h3 class="box-title">Attendance</h3>
            </div>
            <div class="box-body">
<!--              <p>Attendance </p>-->
               <form action = "checkin" method = "post">
          
                   @csrf
                    @if ($user->attendance_status == 0)
                    <input type = 'submit' value = "Check-In" class="btn btn-success"/>
                    
                    @endif
              </form>
              
              <form action = "checkout" method = "post">
                  @csrf
                    @if ($user->attendance_status == 1)
                    <input type = 'submit' value = "Check-Out" class="btn btn-warning"/>
                     @endif
              </form>
      


                
          
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          
          <!-- /.box -->
          @endforeach
        </div>

@endsection

