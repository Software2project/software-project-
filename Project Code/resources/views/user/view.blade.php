@extends('layouts.master')
@section('title')
	بيانات المستخدم
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="left-content">
						<div>
						  <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">بيانات المستخدم</h2>
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
						<div class="">
                            <div class="form-group">
                                <label for="name">إسم المستخدم</label>
                                <input disabled type="text" class="form-control" name="name" id="name" value="{{isset($user) ? $user->name : old('name')}}" required placeholder="إسم المستخدم">
                               
                            </div>

                            <div class="form-group">
                                <label for="department">القسم</label>
                                <input disabled type="text" class="form-control" name="department" id="department" value="{{isset($user) ? $user->department : old('department')}}" required placeholder="القسم">
                               
                            </div>

                            <div class="form-group">
                                <label for="country">الدولة</label>
                                <input disabled type="text" class="form-control" name="country" id="country" value="{{isset($user) ? $user->country : old('country')}}" required placeholder="الدولة">
                               
                            </div>

                            <div class="form-group">
                                <label for="univeristy">الجامعة</label>
                                <input disabled type="text" class="form-control" name="univeristy" id="univeristy" value="{{isset($user) ? $user->univeristy : old('univeristy')}}" required placeholder="الجامعة">
                                
                            </div>
                                                            
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