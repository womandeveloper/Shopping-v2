@extends('backend.layouts.master')
@section('title', 'Ürün')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h5 class="m-0 font-weight-bold text-primary">Ürün {{ $data->id>0 ? 'Düzenleme' : 'Ekleme' }} İşlemi </h5>
				</div>
					<div class="card-body">
						@include('errors.errors')
						@include('errors.alert')
						<form action="{{ route('admin.product.save', $data->id) }}" method="POST">
							{{ csrf_field() }}
							<div class="form-row d-flex justify-content-center mb-3">
								<div class="form-group col-md-6">
									<label>Adı</label>
									<input type="text" class="form-control" name="product_name" value="{{ old('product_name', $data->product_name) }}">
								</div>
							</div>
							<div class="form-row d-flex justify-content-center mb-3">
								<div class="form-group col-md-6">
									<label>Slug</label>
									<input type="hidden" name="original_slug" value="{{ old('slug', $data->slug) }}">
									<input type="text" class="form-control" name="slug" value="{{ old('slug', $data->slug) }}">
								</div>
							</div>
							<div class="form-row d-flex justify-content-center mb-3">
								<div class="form-group col-md-6">
									<label>Fiyatı</label>
									<input type="number" class="form-control" name="price" value="{{ old('price', $data->price) }}">
								</div>
							</div>
							<div class="form-row d-flex justify-content-center mb-3">
								<div class="form-group col-md-6">
									<label>Description</label>
									<textarea name="description" class="form-control" rows="10">{{ old('description', $data->description) }}</textarea>
								</div>
							</div>
							@if ($request != 'show')								
								<div class="form-row d-flex justify-content-center mb-3">
									<button type="submit" class="btn btn-primary justify-content-center mb-3">Kaydet</button>
								</div>
							@endif
						</form>
					</div>
			</div>
		</div>
	</div>
</div>
@endsection