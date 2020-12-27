@extends('backend.layouts.master')
@section('title', 'Ana Sayfa')
@section('head')
    <link rel="stylesheet" media="all" type="text/css" href="/backend/vendor/upload/css/fileinput.min.css">
    <link rel="stylesheet" type="text/css" media="all" href="/backend/vendor/upload/themes/explorer-fas/theme.min.css">
    <script src="/backend/vendor/upload/js/fileinput.js" type="text/javascript" charset="utf-8"></script>
    <script src="/backend/vendor/upload/themes/fas/theme.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/backend/vendor/upload/themes/explorer-fas/theme.minn.js" type="text/javascript" charset="utf-8"></script>

    <script src="/backend/vendor/jquery/jquery.js" type="text/javascript" charset="utf-8"></script>
    <script src="/backend/vendor/jquery/jquery.min.js" type="text/javascript" charset="utf-8"></script>

@endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h5 class="m-0 font-weight-bold text-primary">Sipariş Düzenleme İşlemi </h5>
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
							<div class="form-row">
								<div class="col-md-6">
									<div class="file-loading">
										<input type="file" class="form-control" id="sipdosya" name="sip_dosya" >
									</div>
									<div class="custom-control custom-checkbox small mt-2">
										<input type="checkbox" class="custom-control-input" value="sil" id="dosya_sil" name="dosya_sil">
										<label class="custom-control-label" for="dosya_sil">Dosyaları Sil</label>
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
    <!-- End of Main Content -->
    <script src="/backend/vendor/ckeditor/ckeditor.js"></script>
    <script>
    CKEDITOR.replace( 'editor' );
    </script>
    <!--İşlem sonucu açılan bildirim popupunu otomatik kapatma giriş-->
    <script type="text/javascript">
    $('#islemsonucu').modal('show');
    setTimeout(function() {
        $('#islemsonucu').modal('hide');
    }, 3000);
    </script>
    <!--İşlem sonucu açılan bildirim popupunu otomatik kapatma çıkış-->
    <script>
    $(document).ready(function () {
        $("#sip_dosya").fileinput({
        'theme': 'explorer-fas',
        'showUpload': false,
        'showCaption': true,
        showDownload: true,
        allowedFileExtensions: ["jpg", "png", "jpeg","mp4","zip","rar"],
        });
    });
    </script>
@endsection