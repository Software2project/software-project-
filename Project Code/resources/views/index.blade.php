@extends('layouts.master')
@section('css')
<!--  Owl-carousel css-->
<link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />
<!-- Maps css -->
<link href="{{URL::asset('assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="left-content">
						<div>
						  <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">مرحبا : {{auth()->user()->name}}</h2>
						  <p class="mg-b-0">لوحة التحكم الخاصة بالمؤلفين.</p>
						</div>
					</div>
					<div class="main-dashboard-header-right">
						
					</div>
				</div>
				<!-- /breadcrumb -->
@endsection
@section('content')
<div class="row row-sm">

	<div class="col-lg-6 col-xl-6 col-md-6 col-12">
		<div class="card bg-primary-gradient text-white">
			<div class="card-body">
				<div class="row">
					<div class="col-6">
						<div class="icon1 mt-2 text-center">
							<i class="fe fe-file-text tx-40"></i>
						</div>
					</div>
					<div class="col-6">
						<div class="mt-0 text-center">
							<span class="text-white">الابحاث</span>
							<h2 class="text-white mb-0">{{count($papers)}}</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-6 col-xl-6 col-md-6 col-12">
		<div class="card bg-danger-gradient text-white">
			<div class="card-body">
				<div class="row">
					<div class="col-6">
						<div class="icon1 mt-2 text-center">
							<i class="fe fe-users tx-40"></i>
						</div>
					</div>
					<div class="col-6">
						<div class="mt-0 text-center">
							<span class="text-white">المؤلفين</span>
							<h2 class="text-white mb-0">{{count($users)}}</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>

<div class="row">

	
	<div class="col-sm-12 col-lg-6 col-xl-6">
		<div class="card card-img-holder">
			<div class="card-body list-icons">
				<div class="clearfix">
					<div class="float-right  mt-2">
						<span class="text-primary">
							<i class="si si-chart tx-30"></i>
						</span>
					</div>
					<div class="float-left">
						<p class="card-text text-muted mb-1">(أبحاث جديدة)</p>
						<h3>{{count($lastMonthPapers)}}</h3>
					</div>
				</div>
				<div class="card-footer p-0">
					<p class="text-muted mb-0 pt-4"><i class="si si-exclamation text-info mr-2"></i>الشهر الجاري</p>
				</div>
			</div>
		</div>
	</div>

	<div class="col-sm-12 col-lg-6 col-xl-6">
		<div class="card card-img-holder">
			<div class="card-body list-icons">
				<div class="clearfix">
					<div class="float-right  mt-2">
						<span class="text-primary">
							<i class="si si-chart tx-30"></i>
						</span>
					</div>
					<div class="float-left">
						<p class="card-text text-muted mb-1">(مؤلفين جدد)</p>
						<h3>{{count($lastMonthUsers)}}</h3>
					</div>
				</div>
				<div class="card-footer p-0">
					<p class="text-muted mb-0 pt-4"><i class="si si-exclamation text-info mr-2"></i>الشهر الجاري</p>
				</div>
			</div>
		</div>
	</div>

	<div class="col-sm-12 my-2">
		<h3>أحدث المؤلفين</h3>
	</div>
	
	@foreach ($latestUsers as $user)
	<div class="col-sm-12 col-xl-4 col-lg-12">
		<div class="card user-wideget user-wideget-widget widget-user">
			<div class="widget-user-header bg-primary">
				<h3 class="widget-user-username">{{$user->name}}</h3>
				<h5 class="widget-user-desc">مؤلف</h5>
			</div>
			<div class="widget-user-image">
				<img src="{{URL::asset('assets/img/faces/user.png')}}" class="brround" alt="User Avatar">
			</div>
			<div class="user-wideget-footer">
				<div class="row">
					<div class="col-sm-4 border-left">
						<div class="description-block">
							<h5 class="description-header">{{$user->department}}</h5>
							<span class="description-text">القسم</span>
						</div>
					</div>
					<div class="col-sm-4 border-left">
						<div class="description-block">
							<h5 class="description-header">{{$user->country}}</h5>
							<span class="description-text">البلد</span>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="description-block">
							<h5 class="description-header">{{$user->univeristy}}</h5>
							<span class="description-text">الجامعة</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endforeach
	
</div>
@endsection
@section('js')
<!--Internal  Chart.bundle js -->
<script src="{{URL::asset('assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>
<!-- Moment js -->
<script src="{{URL::asset('assets/plugins/raphael/raphael.min.js')}}"></script>
<!--Internal  Flot js-->
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.pie.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.categories.js')}}"></script>
<script src="{{URL::asset('assets/js/dashboard.sampledata.js')}}"></script>
<script src="{{URL::asset('assets/js/chart.flot.sampledata.js')}}"></script>
<!--Internal Apexchart js-->
<script src="{{URL::asset('assets/js/apexcharts.js')}}"></script>
<!-- Internal Map -->
<script src="{{URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<script src="{{URL::asset('assets/js/modal-popup.js')}}"></script>
<!--Internal  index js -->
<script src="{{URL::asset('assets/js/index.js')}}"></script>
<script src="{{URL::asset('assets/js/jquery.vmap.sampledata.js')}}"></script>	
@endsection