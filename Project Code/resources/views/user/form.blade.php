@extends('layouts.master')
@section('title')
	{{ isset($user) ? 'تعديل مستخدم' : 'إضافة مستخدم' }}
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="left-content">
						<div>
						  <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">{{isset($user) ? 'تعديل مستخدم' : ' إضافة مستخدم'}}</h2>
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
						<form method="POST" action="{{isset($user) ? route('users.update', $user->id) : route('users.store') }}">
							{{ csrf_field() }}
							<div class="">
								<div class="form-group">
									<label for="name">إسم المستخدم</label>
									<input type="text" class="form-control" name="name" id="name" value="{{isset($user) ? $user->name : old('name')}}" required placeholder="إسم المستخدم">
									@if ($errors->has('name'))
									<div class="invalid-feedback">{{ $errors->first('name') }}</div>
									@endif
								</div>

								<div class="form-group">
									<label for="department">القسم</label>
									<input type="text" class="form-control" name="department" id="department" value="{{isset($user) ? $user->department : old('department')}}" required placeholder="القسم">
									@if ($errors->has('department'))
									<div class="invalid-feedback">{{ $errors->first('department') }}</div>
									@endif
								</div>

								<div class="form-group">
									<label for="country">الدولة</label>
									<input type="text" class="form-control" name="country" id="country" value="{{isset($user) ? $user->country : old('country')}}" required placeholder="الدولة">
									@if ($errors->has('country'))
									<div class="invalid-feedback">{{ $errors->first('country') }}</div>
									@endif
								</div>

								<div class="form-group">
									<label for="univeristy">الجامعة</label>
									<input type="text" class="form-control" name="univeristy" id="univeristy" value="{{isset($user) ? $user->univeristy : old('univeristy')}}" required placeholder="الجامعة">
									@if ($errors->has('univeristy'))
									<div class="invalid-feedback">{{ $errors->first('univeristy') }}</div>
									@endif
								</div>

								<div class="form-group">
									<label for="email">الإيميل</label>
									<input type="email" class="form-control" name="email" id="email" value="{{isset($user) ? $user->email : old('email')}}" required placeholder="الإيميل">
									@if ($errors->has('email'))
									<div class="invalid-feedback">{{ $errors->first('email') }}</div>
									@endif
								</div>
								
								@if (!isset($user))
								<div class="form-group">
									<label for="password">كلمة المرور</label>
									<input type="password" class="form-control" name="password" id="password" value="{{isset($user) ? $user->password : old('password')}}" required placeholder="كلمة المرور">
									@if ($errors->has('password'))
									<div class="invalid-feedback">{{ $errors->first('password') }}</div>
									@endif
								</div>
								@endif
								
																
							</div>
							<button type="submit" class="btn btn-primary mt-3 mb-0">{{isset($user) ? 'تعديل' : 'إضافة'}}</button>
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