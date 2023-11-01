



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@foreach($notif as $not)
<li><a class="dropdown-item" href="#">{{$not->message}}</a></li>

@endforeach