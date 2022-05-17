@extends('layouts.master2')
@section('css')
<!-- Sidemenu-respoansive-tabs css -->
<link href="{{URL::asset('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">
@endsection
@section('content')
		<div class="container-fluid">
			<div class="row no-gutter">
				<!-- The image half -->
				<div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
					<div class="row wd-100p mx-auto text-center">
						<div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
							<img src="{{URL::asset('assets/img/media/login.jpg')}}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
						</div>
					</div>
				</div>
				<!-- The content half -->
				<div class="col-md-6 col-lg-6 col-xl-5 bg-white">
					<div class="login d-flex align-items-center py-2">
						<!-- Demo content-->
						<div class="container p-0">
							<div class="row">
								<div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
									<div class="card-sigin">
										<div class="main-signup-header">
											<h2 class="text-primary">إبدأ الأن</h2>
											<h5 class="font-weight-normal mb-4">التسجيل مجاني ولا يستغرق سوى دقيقة واحدة.</h5>
											<form method="POST" action="{{ route('register') }}">
												@csrf
												<div class="form-group">
													<label>الإسم</label>
													<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

													@error('name')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
													@enderror
												</div>
												<div class="form-group">
													<label>الإيميل</label> 
													<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

													@error('email')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
													@enderror
												</div>
												<div class="form-group">
													<label>كلمة المرور</label> 
													<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

													@error('password')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
													@enderror
												</div>

												<div class="form-group">
													<label>تأكيد كلمة المرور</label>
													<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
												</div>

												<div class="form-group">
													<label>القسم</label> 
													<input type="text" class="form-control" name="department" id="department" required placeholder="القسم">
												</div>

												<div class="form-group">
													<label>الدولة</label> 
													<input type="text" class="form-control" name="country" id="country" required placeholder="الدولة">
												</div>

												<div class="form-group">
													<label for="univeristy">الجامعة</label>
													<input type="text" class="form-control" name="univeristy" id="univeristy" required placeholder="الجامعة">
												</div>
										

												</div><button class="btn btn-main-primary btn-block">إنشاء حساب</button>
											</form>
											<div class="main-signup-footer mt-5">
												<p>هل لديك حساب بالفعل؟ <a href="{{ url('/' . $page='login') }}">تسجيل الدخول</a></p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div><!-- End -->
					</div>
				</div><!-- End -->
			</div>
		</div>
@endsection
@section('js')
@endsection