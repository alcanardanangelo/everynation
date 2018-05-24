<div class="row">
  <div class="col-lg-12">
    <h3 class="page-header"><?php echo $title; ?></h3>
    <?php echo form_open('maintenance/status/update/' . $result['status_id']); ?>
    <div class="row">
      <div class="col-lg-4">
        <div class="form-group">
          <label for="member_type_name">status Name</label>
          <input type="text" class="form-control" name="status_name" id="status_name"
                 value="<?php echo $result['status_name']; ?>">
          <small class="help-block error-message"><?php echo form_error('status_name'); ?></small>
        </div>

        <input type="submit" value="Save" class="btn btn-primary">
      </div>
    </div>

    <?php echo form_close(); ?>
  </div>
</div>