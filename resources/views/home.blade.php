@extends('layouts.app')

@section('content')

<?php foreach ($result as $row): ?>

<?php echo $row->page_content; ?>

<?php endforeach; ?>


@endsection
