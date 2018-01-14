<?php foreach ($modal as $m); ?>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">NIP<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" name="nip" id="nip" value="<?php echo $m->nip ?>" class="form-control col-md-7 col-xs-12">
        </div>
</div>