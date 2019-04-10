@extends('admin::layouts.master')

@section('content')
<div class="card">
	<div class="card-body">
		<div class="page-header">
			<nav aria-label="breadcrumb">
			    <ol class="breadcrumb">
			        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
			        <li class="breadcrumb-item"><a href="{{ route('admin.get.list.category') }}">Danh mục</a></li>
			        <li class="breadcrumb-item"><a>Thêm mới</a></li>
			    </ol>
			</nav>
		</div>
		<div class="row justify-content-between align-items-center">
			<h1>Thêm mới danh mục</h1>
		</div>

		<div class="row">
			<form class="col-md-6" method="POST">
				@csrf
				<div class="form-group">
			        <label for="">Tên danh mục</label>
			        <input type="text" class="form-control" placeholder="Tên danh mục" value="{{ old('name') }}" name="name">
			        @if ($errors->has('name'))
					    <p class="text-danger">{{ $errors->first('name') }}</p>
					@endif
			    </div>
				<div class="row align-items-center">
				    <div class="form-group col-md-8">
				        <label for="">Icon danh mục</label>
				        <input type="text" class="form-control" placeholder="fa fa-home" value="{{ old('icon') }}" name="icon">
				        @if ($errors->has('icon'))
						    <p class="text-danger">{{ $errors->first('icon') }}</p>
						@endif
				    </div>
				    <div class="form-check col-md-4">
					    <label class="form-check-label">
					        <input type="checkbox" class="form-check-input" name="hot"> Nổi bật
					        <i class="input-helper"></i>
					    </label>
					</div>
				</div>
				<div class="form-group">
					<label for="">Meta Title SEO</label>
					<input type="text" class="form-control" placeholder="Meta Title" value="{{ old('c_title_seo') }}" name="c_title_seo">
				</div>
				<div class="form-group">
					<label for="">Desription SEO</label>
					<input type="text" class="form-control" placeholder="Desription SEO" value="{{ old('c_description_seo') }}" name="c_description_seo">
				</div>
			    <button type="submit" class="btn btn-success mr-2">Lưu</button>
			    <button class="btn btn-light">Hủy</button>
			</form>
		</div>	
	</div>
</div>
@stop