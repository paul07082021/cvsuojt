

<!-- First you need to extend the CB layout -->
@extends('crudbooster::admin_template')
@section('content')



<iframe src="<?php echo url('/'); ?>/laravel-filemanager?type=images" width="100%" height="600px" title="filemanager"></iframe>

@endsection
<!-- ADD A PAGINATION -->
