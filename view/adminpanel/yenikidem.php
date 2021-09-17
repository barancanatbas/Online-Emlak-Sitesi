<form name="form2" action="<?php echo $basedir; ?>kidem/insert" method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="card-header">
            <strong>Yeni Kıdem Ekleme Formu</strong>
        </div>
        <div class="row form-group col-md-11 mt-5">
            <div class="col col-md-3">
                <label for="text-input" class=" form-control-label">Kıdem Adı</label>
            </div>
            <div class="col-12 col-md-9">
                <input type="text" id="text-input" name="kidemad" placeholder="Kidem Ad" class="form-control" required>
            </div>
        </div>
        <div>
            <input type="submit" style="margin-left: 10px;margin-bottom: 20px;" name="guncellegenel" class="btn btn-success btn-md" value="Ekle">
        </div>
    </form>