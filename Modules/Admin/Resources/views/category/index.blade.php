<?php  
	use Request;
?>
@extends('admin::layouts.master')

@section('content')
<div class="card">
	<div class="card-body">
		<div class="page-header">
			<nav aria-label="breadcrumb">
			    <ol class="breadcrumb">
			        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
			        <li class="breadcrumb-item"><a>Danh mục</a></li>
			    </ol>
			</nav>
		</div>
		<div class="row justify-content-between align-items-center">
			<h1>Quản lý danh mục</h1>
			<a href="{{ route('admin.get.create.category') }}" class="">Thêm mới</a>
		</div>
	</div>
</div>
@stop