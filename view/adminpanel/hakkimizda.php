<div class="col-md-12">
    <div class="card mt-5">
        <div class="card-header">
            <strong>Hakkızda Güncelle</strong>
        </div>
        <div class="card-body card-block">
            <form name="form1" action="<?php echo $basedir; ?>hakkinda/update"  method="POST" class="form-horizontal">
                <div class="row form-group">
                    <div class="col col-md-2">
                        <label for="text-input" class="form-control-label">Blog</label>
                    </div>
                    <div class="col-12 col-md-10">
                        <textarea name="yazi" id='editor' required><?php echo $values['yazi']; ?></textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <button type="submit" class="btn btn-success btn-md ml-2">
                        Güncelle
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
