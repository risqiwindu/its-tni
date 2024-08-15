@extends('layouts.admin')
@section('page-title','')
@section('breadcrumb')
    @include('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>'Dashboard',
            '#'=>__lang('students')
        ]])
@endsection

{{-- @section('search-form')
    <form class="form-inline mr-auto" method="get" action="{{ route('admin.student.index') }}">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
        </ul>
        <div class="search-element">
            <input value="{{ request()->get('filter') }}"   name="filter" class="form-control" type="search" placeholder="{{ __lang('filter-name-email') }}" aria-label="{{ __lang('search') }}" data-width="250">


            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
        </div>
    </form>
@endsection --}}

@section('content')
<div >
			<div >
				<div class="card">
					<div class="card-body">

                        <div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Id</th>
                                    <th>course_id</th>
                                    <th>lecture_id</th>
                                    <th>Percentage</th>
								</tr>
							</thead>
							<tbody>
                                @foreach ($emosi as $item)
                                <tr>
                                    <td>{{ $item['id'] }}</td>
                                    <td>{{  $item['course_id'] }}</td>
                                    <td>{{ $item['lecture_id'] }}</td>
                                    <td>{{ htmlspecialchars($item['emotion']) }}</td>
                                </tr>
                                @endforeach
							</tbody>
						</table>
                        </div>
                        @php
//  // add at the end of the file after the table
//  echo paginationControl(
//      // the paginator object
//      $paginator,
//      // the scrolling style
//      'sliding',
//      // the partial to use to render the control
//      null,
//      // the route to link to when a user clicks a control link
//      array(
//          'route' => 'admin/default',
// 		 'controller'=>'student',
// 		 'action'=>'index',
//          'filter'=>$filter
//      )
//  );
 @endphp
					</div><!--end .box-body -->
				</div><!--end .box -->
			</div><!--end .col-lg-12 -->
		</div>


@endsection

@section('footer')
    <div class="modal fade" id="simpleModal"  tabindex="-1" role="dialog" id="exampleModal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __lang('student-details') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="info">
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(function(){
            $('.viewbutton').click(function(){
                $('#info').text('Loading...');
                var id = $(this).attr('data-id');
                $('#info').load('{{ adminUrl(array('controller'=>'student','action'=>'view'))}}'+'/'+id);
            });
        });
    </script>
@endsection

