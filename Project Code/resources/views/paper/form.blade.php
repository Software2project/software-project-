@extends('layouts.master')
@section('title')
	{{ isset($paper) ? 'تعديل بحث' : 'إضافة بحث' }}
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="left-content">
						<div>
						  <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">{{isset($paper) ? 'تعديل بحث' : ' إضافة بحث'}}</h2>
						</div>
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
						<form method="POST" action="{{isset($paper) ? route('papers.update', $paper->id) : route('papers.store') }}" enctype="multipart/form-data">
							{{ csrf_field() }}
							<div class="">

								<div class="form-group">
									<label for="area">عنوان البحث</label>
									<input type="text" class="form-control" name="title" id="title" value="{{isset($paper) ? $paper->title : old('title')}}" required placeholder="عنوان البحث">
									@if ($errors->has('title'))
									<div class="invalid-feedback">{{ $errors->first('title') }}</div>
									@endif
								</div>

								<div class="form-group">
									<label for="src">محتوي البحث</label>
									<input type="file" class="form-control" accept="application/pdf" name="src" id="src" value="{{isset($paper) ? $paper->src : old('src')}}" {{isset($paper) ? '' : 'required'}}>
									@if ($errors->has('src'))
									<div class="invalid-feedback">{{ $errors->first('src') }}</div>
									@endif
								</div>

							</div>
							<button type="submit" class="btn btn-primary mt-3 mb-0">{{isset($paper) ? 'تعديل' : 'إضافة'}}</button>
						</form>
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