<div class="row">
  <div class="col-lg-12">
    <h3 class="page-header"><?php echo $title; ?></h3>
    <?php echo form_open('maintenance/status/add'); ?>
    <div class="row">
      <div class="col-lg-4">
        <div class="form-group">
          <label for="status_name">Status Name</label>
          <input type="text" class="form-control" name="status_name" id="status_name">
          <small class="help-block error-message"><?php echo form_error('status_name'); ?></small>
        </div>

        <input type="submit" value="Save" class="btn btn-primary">
      </div>
    </div>

    <?php echo form_close(); ?>
  </div>
</div>