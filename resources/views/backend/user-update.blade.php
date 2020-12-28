@extends('backend.layouts.master')
@section('title', 'Ana Sayfa')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h5 class="m-0 font-weight-bold text-primary">Kullanıcı Düzenleme İşlemi </h5>
				</div>
					<div class="card-body">
						<form action="{{ route('admin.user-save', $data->id) }}" method="POST">
							{{ csrf_field() }}
							<div class="form-row d-flex justify-content-center mb-3">
								<div class="form-group col-md-6">
									<label>İsim Soyisim</label>
									<input type="text" class="form-control" required name="fullname" value="{{ $data->fullname }}">
								</div>
							</div>
							<div class="form-row d-flex justify-content-center mb-3">
								<div class="form-group col-md-6">
									<label>Şifre</label>
									<input type="password" class="form-control" name="password" placeholder="Şifre Giriniz">
								</div>
							</div>
							<div class="form-row d-flex justify-content-center mb-3">
								<div class="form-group col-md-6">
									<label>E-Posta</label>
									<input type="email" class="form-control"  name="email" value="{{ $data->email }}">
								</div>	
							</div>
							<div class="form-row d-flex justify-content-center mb-3">
								<div class="form-group col-md-6">
									<label>Telefon</label>
									<input type="text" class="form-control telephone" required name="phone_number" value="{{ $data->detail->phone_number }}">
								</div>
							</div>
							<div class="form-row d-flex justify-content-center mb-3">
								<div class="form-group col-md-6">
									<label>Cep Telefonu</label>
									<input type="text" class="form-control telephone" required name="mobile_number" value="{{ $data->detail->mobile_number }}">
								</div>
							</div>
							<div class="form-row d-flex justify-content-center mb-3">
								<div class="form-group col-md-6">
									<input type="checkbox" name="is_active" value="1" {{ $data->is_active ? 'checked' : '' }}>Aktif Mi
								</div>
							</div>
							<div class="form-row d-flex justify-content-center mb-3">
								<div class="form-group col-md-6">
									<input type="checkbox" name="is_admin" value="1" {{ $data->is_admin ? 'checked' : '' }}>Yönetici Mi
								</div>
							</div>
							<div class="form-row d-flex justify-content-center mb-3">
								<div class="form-group col-md-6">
									<textarea style="width: 100%; height:100px;" name="address">{{ $data->detail->address }}</textarea>
								</div>
							</div>
							<div class="form-row d-flex justify-content-center mb-3">
								<button type="submit" class="btn btn-primary justify-content-center mb-3">Kaydet</button>
							</div>
						</form>
					</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('footer')    
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.js"></script>
    <script>
		$('.telephone').mask('(000) 000-00-00', { placeholder: "(___) ___-__-__" });
    </script>
@endsection