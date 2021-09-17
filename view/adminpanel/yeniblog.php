<div class="col-md-12">
	<div class="card mt-5">
		<div class="card-header">
			<strong>Yeni blog</strong>
		</div>
		<div class="card-body card-block">
			<form action="<?php echo $basedir; ?>blog/insert" name="form1" method="post" enctype="multipart/form-data" class="form-horizontal">

				<div class="row form-group mt-2">
					<div class="col col-md-2">
						<label for="text-input" class=" form-control-label">Başlık</label>
					</div>
					<div class="col-12 col-md-10">
						<input type="text" id="text-input" name="baslik" placeholder="Başlık" class="form-control" required>
						
					</div>
				</div>

				<div class="row form-group">
					<div class="col col-md-2">
						<label for="text-input" class=" form-control-label">Blog</label>
					</div>
					<div class="col-12 col-md-10">
						<textarea name="yazi" id='editor' required></textarea>
					</div>
				</div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="file-multiple-input" class=" form-control-label">Resimler</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="file" id="file-multiple-input" name="resim[]" multiple class="form-control-file" required>
                    </div>
                </div>

				<div class="row form-group">
					<button type="submit" class="btn btn-primary btn-md ml-2">Ekle</button>
				</div>
			</form>
		</div>
		
	</div>
</div>
