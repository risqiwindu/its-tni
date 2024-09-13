@extends('layouts.admin')
@section('page-title','')
@section('breadcrumb')
    @include('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>__('default.dashboard'),
            route('admin.student.index')=>__lang('students'),
            '#'=>isset($pageTitle)?$pageTitle:''
        ]])
@endsection

@section('content')
<div  >
			<div >
				<div class="card">
					<div class="card-header">
                        <strong> {{ __lang('student') }}  {{ __lang('details') }}</strong>
					</div>
					<div class="card-body">

                                           <form enctype="multipart/form-data" action="{{ adminUrl(array('controller'=>'student','action'=>$action,'id'=>$id)) }}" method="post">
                                        @csrf
                                                <div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<div >
											<label for="password1" class="control-label">{{ formLabel($form->get('name')) }}</label>
										</div>
										<div >
										 {{ formElement($form->get('name')) }}   <p class="help-block">{{ formElementErrors($form->get('name')) }}</p>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<div >
											<label for="password1" class="control-label">Nama Belakang</label>
										</div>
										<div >
										 {{ formElement($form->get('last_name')) }}   <p class="help-block">{{ formElementErrors($form->get('last_name')) }}</p>
										</div>
									</div>
								</div>
							</div>




							<div class="row">

								<div class="col-sm-6">
									<div class="form-group">
										<div >
											<label for="password1" class="control-label">NRP / NIP</label>
										</div>
										<div >
										 {{ formElement($form->get('email')) }}   <p class="help-block">{{ formElementErrors($form->get('email')) }}</p>
										</div>
									</div>
								</div>
								
								{{-- <div class="col-sm-6">
									<div class="form-group">
										<div >
											<label for="nim" class="control-label">NIM</label>
										</div>
										<div >
											{{ formElement($form->get('nim')) }}   <p class="help-block">{{ formElementErrors($form->get('nim')) }}</p>
										</div>
									</div>
								</div> --}}











                                    <div class="col-sm-6">
                                        <div class="form-group">
											<div >
												<label for="department" class="control-label">Department</label>
											</div>
											<div >
												{{ formElement($form->get('department')) }}   <p class="help-block">{{ formElementErrors($form->get('department')) }}</p>
											</div>
										</div>
                                    </div>








                            </div>




                            <div class="row">
								
								<div class="col-sm-6">
									<div class="form-group">
										<div >
											<label for="password1" class="control-label">Jabatan</label>
										</div>
										<div >
										 {{ formElement($form->get('jabatan')) }}   <p class="help-block">{{ formElementErrors($form->get('jabatan')) }}</p>
										</div>
									</div>
								</div>








                            </div>



							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<div >
											<label for="password1" class="control-label">{{ formLabel($form->get('image')) }}</label>
											{{-- <label for="file" class="control-label">Gambar Train Data</label> --}}
										</div>
										<div >

											{{ formElement($form->get('image')) }} <p class="help-block">{{ formElementErrors($form->get('image')) }}</p>
											{{-- <input type="file" name="image[]" id="image" multiple> --}}
										</div>
									</div>
								</div>

								<div class="col-sm-6">
									<div class="form-group">
										<div >
											<label for="password1" class="control-label">{{ formLabel($form->get('picture')) }}</label>
										</div>
										<div >

											{{ formElement($form->get('picture')) }} <p class="help-block">{{ formElementErrors($form->get('picture')) }}</p>
										</div>
									</div>
								</div>
                            </div>




                          <div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<div >
											<label for="password1" class="control-label">{{ formLabel($form->get('mobile_number')) }}</label>
										</div>
										<div >
										 {{ formElement($form->get('mobile_number')) }}   <p class="help-block">{{ formElementErrors($form->get('mobile_number')) }}</p>
										</div>
									</div>
								</div>
												<div class="col-sm-6">
									<div class="form-group">
										<div >
											<label for="password1" class="control-label">{{ formLabel($form->get('status')) }}</label>
										</div>
										<div >
										 {{ formElement($form->get('status')) }}   <p class="help-block">{{ formElementErrors($form->get('status')) }}</p>
										</div>
									</div>
								</div>
							</div>

                                                    <div class="row">

                                                        @php foreach($fields as $row): @endphp

                                                        <div class="col-sm-6">
                                                            <div class="form-group">

                                                                @php if($row->type == 'checkbox'): @endphp

                                                                <div >
                                                                    {{ formElement($form->get('custom_'.$row->id)) }}
                                                                    <label for="password1" class="control-label">{{ formLabel($form->get('custom_'.$row->id)) }}</label>
                                                                    <p class="help-block">{{ formElementErrors($form->get('custom_'.$row->id)) }}</p>
                                                                </div>

                                                                @php elseif($row->type == 'radio'):  @endphp
                                                                    <div >
                                                                        <label for="password1" class="control-label">{{ formLabel($form->get('custom_'.$row->id)) }}</label>
                                                                    </div>
                                                                    <div >
                                                                        {{ formElement($form->get('custom_'.$row->id)) }}
                                                                          <p class="help-block">{{ formElementErrors($form->get('custom_'.$row->id)) }}</p>
                                                                    </div>
                                                                @php else:  @endphp

                                                                    <div >
                                                                        <label for="password1" class="control-label">{{ formLabel($form->get('custom_'.$row->id)) }}</label>
                                                                    </div>
                                                                    <div >
                                                                        {{ formElement($form->get('custom_'.$row->id)) }}   <p class="help-block">{{ formElementErrors($form->get('custom_'.$row->id)) }}</p>
                                                                    </div>

                                                                @php endif;  @endphp


                                                            </div>
                                                        </div>

                                                        @php endforeach;  @endphp

                                                    </div>










                                                    <div class="form-footer col-lg-offset-1 col-md-offset-2 col-sm-offset-3">
								<button type="submit" class="btn btn-lg btn-block btn-primary">Simpan</button>
							</div>
						</form>
					</div>

				</div><!--end .box -->
			</div><!--end .col-lg-12 -->
		</div>
@endsection
