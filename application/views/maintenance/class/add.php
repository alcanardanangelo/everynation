<div class="row">
  <div class="col-lg-12">
    <h3 class="page-header"><?php echo $title; ?></h3>
    <?php echo form_open('maintenance/class/add'); ?>
    <div class="row">
      <div class="col-lg-4">
        <div class="form-group">
          <label for="school_name">Class Name</label>
          <input type="text" class="form-control" name="class_name" id="class_name">
          <small class="help-block error-message"><?php echo form_error('class_name'); ?></small>
        </div>

        <div class="form-group">
          <label for="class_description">Class Description</label>
          <textarea class="form-control" rows="3" name="class_description" id="class_description"></textarea>
          <small class="help-block error-message"><?php echo form_error('class_description'); ?></small>
        </div>

        <div class="form-group">
          <label for="price">Price</label>
          <input type="number" class="form-control" name="price" id="price">
          <small class="help-block error-message"><?php echo form_error('price'); ?></small>
        </div>


        <input type="submit" value="Save" class="btn btn-primary">
      </div>
    </div>

    <?php echo form_close(); ?>
  </div>
</div>