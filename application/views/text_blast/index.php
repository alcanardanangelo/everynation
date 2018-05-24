<div class="row">
  <div class="col-lg-12">
    <h3 class="page-header"><?php echo $title; ?></h3>
    <?php if ($this->session->flashdata('message')): ?>
      <div class="alert alert-success"><?php echo $this->session->flashdata('message'); ?></div>
    <?php endif; ?>
    <?php echo form_open('text-blast'); ?>
    <div class="row">
      <div class="col-lg-4">
        <div class="well">
          <?php if ($result): ?>
            <?php foreach ($result as $key => $value): ?>
              <input type="checkbox" name="contact_no[]"
                     value="<?php echo $value['contact_no']; ?>"> <?php echo $value['lastname'] . ', ' . $value['firstname']; ?>
              <br>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
        <small class="help-block error-message"><?php echo form_error('contact_no[]'); ?></small>

        <div class="form-group">
          <label for="text_message">Message</label>
          <textarea class="form-control" rows="3" name="text_message" id="text_message"></textarea>
          <small class="help-block error-message"><?php echo form_error('text_message'); ?></small>
        </div>

        <input type="submit" value="Send" class="btn btn-primary">
      </div>
    </div>

    <?php echo form_close(); ?>
  </div>
</div>