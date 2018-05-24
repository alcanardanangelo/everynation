<div class="row">
  <div class="col-lg-12">
    <h3 class="page-header"><?php echo $title; ?></h3>
    <?php echo form_open('attendance-per-class/add'); ?>
    <div class="row">
      <div class="col-lg-4">

        <div class="form-group">
          <label for="monthly_topic_id">Monthly Topic</label>
          <select class="form-control" name="monthly_topic_id" id="monthly_topic_id">
            <option value="">--</option>
            <?php foreach($monthly_topic as $key => $value): ?>
              <option value="<?php echo $value['monthly_topic_id']; ?>"><?php echo $value['monthly_topic_name']; ?></option>
            <?php endforeach; ?>
          </select>
          <small class="help-block error-message"><?php echo form_error('monthly_topic_id'); ?></small>
        </div>
        <div class="form-group">
          <label for="date_of_service">Date</label>
          <input type="text" class="form-control" name="date_of_service" id="date_of_service">
          <small class="help-block error-message"><?php echo form_error('date_of_service'); ?></small>
        </div>
        <div class="well">
          <?php if ($registration): ?>
            <?php foreach ($registration as $key => $value): ?>
              <input type="checkbox" name="member[]"
                     value="<?php echo $value['registration_id']; ?>"> <?php echo $value['lastname'] . ', ' . $value['firstname']; ?>
              <br>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>

        <input type="submit" value="Save" class="btn btn-primary">
      </div>
    </div>

    <?php echo form_close(); ?>
  </div>
</div>