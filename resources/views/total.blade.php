<!-- resources/views/total.blade.php -->
<?php
use Carbon\Carbon;
$yesterday = Carbon::yesterday()->format('Y-m-d');
$date = date('Y-m-d');
$time = date('H:i:s');

?>


<!DOCTYPE html>
<html>
<head>
    <title>Total Amounts</title>
</head>
<body>
    <h1>List of Total Deposit Amount for the previous days</h1><br>
    <h1>Run time/date : <?php echo $time . "/" .  $date ?> </h1>

    @if ($totals->isEmpty())
        <p>No totals available.</p>
    @else
    <table>
    <thead>
        <tr>
            <th>Date</th>
            <th>Agent Number</th>
            <th>Agent Name</th>
            <th>Total Amount</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($totals as $total)
            <tr>
                <td>{{ $total->date_deposited }}</td>
                <td>{{ $total->contact }}</td>
                <td>{{ $total->username }}</td>
                <td>{{ $total->total_amount }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
    @endif

    <form action="{{ route('submitDeposit') }}" method="POST">
        @csrf
        <button type="submit" name="insertButton">Click to Save</button>
    </form>
</body>
</html>