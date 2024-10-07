@extends('layouts.admin')
@section('page-title','')
@section('breadcrumb')
    @include('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>'Dashboard',
            '#'=>isset($pageTitle)?$pageTitle:''
        ]])
@endsection

@section('content')
<div class="card">

<div class="card-body">


<form method="post" action="{{ adminUrl(array('controller'=>'account','action'=>'email')) }}">
@csrf
<div class="form-group">
<label for="email">NIP/NRP atau email</label>
<input class="form-control" type="text" name="email" required="required"/>

</div>
	<div class="form-footer">
								<button type="submit" class="btn btn-primary">{{ __lang('submit') }}</button>
							</div>

</form>


</div>

</div>



@endsection
