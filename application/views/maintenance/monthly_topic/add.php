<div class="row">
  <div class="col-lg-12">
    <h3 class="page-header"><?php echo $title; ?></h3>
    <?php echo form_open('maintenance/monthly-topic/add'); ?>
    <div class="row">
      <div class="col-lg-4">
        <div class="form-group">
          <label for="monthly_topic_name">Topic Title</label>
          <input type="text" class="form-control" name="monthly_topic_name" id="monthly_topic_name">
          <small class="help-block error-message"><?php echo form_error('monthly_topic_name'); ?></small>
        </div>

        <div class="form-group">
          <label for="monthly_topic_description">Topic Description</label>
          <textarea class="form-control" rows="3" name="monthly_topic_description" id="monthly_topic_description"></textarea>
          <small class="help-block error-message"><?php echo form_error('monthly_topic_description'); ?></small>
        </div>

        <input type="submit" value="Save" class="btn btn-primary">
      </div>
    </div>

    <?php echo form_close(); ?>
  </div>
</div>