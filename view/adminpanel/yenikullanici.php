<div class="col-md-12">
	<div class="card mt-5">
		<div class="card-header">
			<strong>Yeni Kullanıcı</strong>
		</div>
		<div class="card-body card-block">
			<form action="<?php echo $basedir; ?>kullanicilar/saveUser" name="form1" method="post" onsubmit="return kontrol();" enctype="multipart/form-data" class="form-horizontal">

				<div class="row form-group mt-2">
					<div class="col col-md-3">
						<label for="text-input" class=" form-control-label">Ad</label>
					</div>
					<div class="col-12 col-md-9">
						<input type="text" id="text-input" name="ad" placeholder="Ad" class="form-control" required>

					</div>
				</div>
				<div class="row form-group">
					<div class="col col-md-3">
						<label for="text-input" class=" form-control-label">Soyad</label>
					</div>
					<div class="col-12 col-md-9">
						<input type="text" id="text-input" name="soyad" placeholder="Soyad" class="form-control" required>

					</div>
				</div>
				<div class="row form-group">
					<div class="col col-md-3">
						<label for="text-input" class=" form-control-label">Kullanıcı Adı</label>
					</div>
					<div class="col-12 col-md-9">
						<input type="text" id="text-input" name="kuladi" placeholder="Kullanıcı Adı" class="form-control" required>

					</div>
				</div>
				<div class="row form-group">
					<div class="col col-md-3">
						<label for="email-input" class=" form-control-label">Email Adresi</label>
					</div>
					<div class="col-12 col-md-9">
						<input type="email" id="email-input" name="mail" placeholder="Email Adresi" class="form-control" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col col-md-3">
						<label for="password-input" class=" form-control-label">Şifre</label>
					</div>
					<div class="col-12 col-md-9">
						<input type="password" id="password-input" name="sifre1" placeholder="Şifre" class="form-control" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col col-md-3">
						<label for="password-input" class=" form-control-label">Şifreyi Tekrar Girin</label>
					</div>
					<div class="col-12 col-md-9">
						<input type="password" id="password-input" name="sifre2" placeholder="Şifre" class="form-control" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col col-md-3">
						<label for="text-input" class="control-label">Telefon</label>
					</div>
					<div class="col-12 col-md-9">
						<input  name="telefon" type="text" class="form-control" placeholder="Telefon" required>
					</div>
				</div>

				<div class="row form-group">
					<div class="col col-md-3">
						<label for="select" class=" form-control-label">Kıdem</label>
					</div>
					<div class="col-12 col-md-9">
						<select name="kidem" id="select" class="form-control">
							<?php foreach ($values as $value) { ?>
								<option value="<?php echo $value['id'] ?>"><?php echo $value["kidem"]; ?></option>
							<?php } ?>

						</select>
					</div>
				</div>
				<div class="row form-group">
					<div class="col col-md-3">
						<label class=" form-control-label">Cinsiyet</label>
					</div>
					<div class="col col-md-9">
						<div class="form-check-inline form-check">
							<label for="inline-radio1" class="form-check-label mr-2">
								<input type="radio" id="inline-radio1" name="cinsiyet" value="erkek" class="form-check-input">erkek
							</label>
							<label for="inline-radio2" class="form-check-label ">
								<input type="radio" id="inline-radio2" name="cinsiyet" value="kadin" class="form-check-input">kadın
							</label>
						</div>
					</div>
				</div>
				<div class="row form-group">
					<div class="col col-md-3">
						<label for="file-input" class=" form-control-label">Profile Resmi</label>
					</div>
					<div class="col-12 col-md-9">
						<input type="file" id="file-input" name="resim" class="form-control-file" required>
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
<script>
	function kontrol()
	{
		var form = document.forms["form1"];
		var sifre1 = form["sifre1"].value.trim();
		var sifre2 = form["sifre2"].value.trim();
		if (sifre1 != sifre2)
		{
			alert("şifreler farklı");
			return false;
		}
		else{
			return true;
		}

	}
</script>