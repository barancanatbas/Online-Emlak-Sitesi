<div class="col-md-12">
	<div class="card mt-5">
		<div class="card-header">
			<strong>Yeni Ev</strong>
		</div>
		<div class="card-body card-block">
			<form action="<?php echo $basedir; ?>ev/insert" name="form1" method="post" enctype="multipart/form-data" class="form-horizontal">
				<div class="row form-group mt-2">
					<div class="col col-md-2">
						<label for="text-input" class=" form-control-label">Başlık</label>
					</div>
					<div class="col-12 col-md-10">
						<input type="text" id="text-input" name="baslik" placeholder="Başlık" class="form-control" required>
						
					</div>
				</div>
				<div class="row form-group mt-2">
					<div class="col col-md-2">
						<label for="text-input" class=" form-control-label">Durum</label>
					</div>
					<div class="col-12 col-md-10">
						<input type="text" id="text-input" name="durum" placeholder="Durum" class="form-control" required>
						
					</div>
				</div>
				<div class="row form-group">
					<div class="col col-md-2">
						<label for="text-input" class=" form-control-label">Özellikler</label>
					</div>
					<div class="col-12 col-md-10">
						<textarea name="ozellikler" id='editor' required></textarea>
					</div>
				</div>
				<div class="row form-group">
					<div class="col col-md-2">
						<label for="text-input" class=" form-control-label">Açıklama</label>
					</div>
					<div class="col-12 col-md-10">
						<textarea name="aciklama" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
					</div>
				</div>
				<div class="row form-group">
					<div class="col col-md-2">
						<label for="text-input" class=" form-control-label">Adres</label>
					</div>
					<div class="col-12 col-md-10">
						<textarea name="adres" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
					</div>
				</div>
				<div class="row form-group mt-2">
					<div class="col col-md-2">
						<label for="text-input" class=" form-control-label">Fiyat</label>
					</div>
					<div class="col-12 col-md-10">
						<input type="number" id="text-input" name="fiyat" placeholder="Durum" class="form-control" required>
						
					</div>
				</div>
				<div class="row form-group">
					<div class="col col-md-3">
						<label for="file-multiple-input" class=" form-control-label">Resimler</label>
					</div>
					<div class="col-12 col-md-9">
						<input type="file" id="file-multiple-input" name="resim[]" multiple="" class="form-control-file" required>
					</div>
				</div>
				<div class="row form-group">
					<button type="submit" class="btn btn-primary btn-md ml-2">
						Ekle
					</button>
				</div>
			</form>
		</div>
		
	</div>
</div>
