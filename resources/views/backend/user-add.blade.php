@extends('backend.layouts.master')
@section('title', 'Ana Sayfa')
@section('content')
<!-- Begin Page Content -->
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h5 class="m-0 font-weight-bold text-primary">Sipariş Ekleme İşlemi </h5>
				</div>
					<div class="card-body">
						<form action="islemler/islem.php" method="POST"  enctype="multipart/form-data"  data-parsley-validate>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label>İsim Soyisim</label>
									<input type="text" class="form-control" required name="musteri_isim" value="İsim">
								</div>
								<div class="form-group col-md-6">
									<label>E-Posta</label>
									<input type="email" class="form-control"  name="musteri_mail" value="Mail">
								</div>	
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label>Telefon Numarası</label>
									<input type="number" class="form-control" name="musteri_telefon" value="Telefon">
								</div>
								<div class="form-group col-md-6">
									<label>Sipariş Başlığı</label>
									<input type="text" class="form-control" required name="sip_baslik" value="Title">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label>Ücret (TL)</label>
									<input type="number" class="form-control" name="sip_ucret" value="Fiyat">
								</div>
								<div class="form-group col-md-6">
									<label>Aciliyet</label>
									<select id="inputState" name="sip_aciliyet" class="form-control">
										<option selected value="Acil">Acil</option>
										<option value="Normal">Normal</option>
										<option value="Acelesi Yok">Acelesi Yok</option>
									</select>
								</div>
							</div>
							
							<div class="form-row">	
								<div class="form-group col-md-6">
									<label>Teslim Tarihi</label>
									<input required type="date" class="form-control" name="sip_teslim_tarihi" value="date">
								</div>
								<div class="form-group col-md-6">
									<label>Sipariş Durumu</label>
									<select id="inputState" name="sip_durum" class="form-control">
										<option selected value="Yeni Başladı">Yeni Başladı</option>
										<option value="Devam Ediyor">Devam Ediyor</option>
										<option value="Bitti">Bitti</option>
									</select>
								</div>
							</div>			
                            <div class="form-row d-flex justify-content-center mb-3">
                                <div class="col-md-6">
                                  <div class="custom-file">
                                      <input type="file" class="custom-file-input" id="inputGroupFile01">
                                      <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                  </div>
                                </div>
                            </div>			
							<div class="form-row mt-2">
								<div class="form-group col-md-12">
									<textarea class="ckeditor" name="sip_detay" id="editor">Detaylar</textarea>
								</div>
							</div>
							<input type="hidden" class="form-control" name="sip_id" value="id">
							<button type="submit" name="siparisguncelle" class="btn btn-success">Kaydet</button>
						</form>
					</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('footer')    
    <script>
        CKEDITOR.replace( 'editor' );
    </script>
@endsection