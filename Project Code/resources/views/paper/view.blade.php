@extends('layouts.master')
@section('title')
بحث
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="left-content">
						<div>
						  {{-- <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">بيانات البحث</h2> --}}
						</div>
					</div>
					<div class="main-dashboard-header-right">
						
					</div>
				</div>
				<!-- /breadcrumb -->
@endsection
@section('content')
		<!-- row -->
		<div class="row row-sm">

			<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
				<div class="card  box-shadow-0 pt-3">
			
					<div class="card-body pt-0">
						<div class="form-group">
                            <label for="area">عنوان البحث</label>
                            <input disabled type="text" class="form-control" name="title" id="title" value="{{isset($paper) ? $paper->title : old('title')}}">
                        </div>

                        <div class="form-group">
                            <label for="src">محتوي البحث</label>
                            <iframe src="{{asset('/fileUploads/'.$paper->src)}}" width="100%" height="600px">
                            </iframe>
                        </div>

					</div>
				</div>
			</div>
		</div>
		<!-- row -->
	</div>
	<!-- Container closed -->
	</div>
	<!-- main-content closed -->
@endsection