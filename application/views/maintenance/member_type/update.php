<div class="row">
  <div class="col-lg-12">
    <h3 class="page-header"><?php echo $title; ?></h3>
    <?php echo form_open('maintenance/member-type/update/' . $result['member_type_id']); ?>
    <div class="row">
      <div class="col-lg-4">
        <div class="form-group">
          <label for="member_type_name">Member Type Name</label>
          <input type="text" class="form-control" name="member_type_name" id="member_type_name"
                 value="<?php echo $result['member_type_name']; ?>">
          <small class="help-block error-message"><?php echo form_error('member_type_name'); ?></small>
        </div>

        <input type="submit" value="Save" class="btn btn-primary">
      </div>
    </div>

    <?php echo form_close(); ?>
  </div>
</div>