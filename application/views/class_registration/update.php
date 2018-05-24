<div class="row">
  <div class="col-lg-12">
    <h3 class="page-header"><?php echo $title; ?></h3>
    <?php echo form_open('class-registration/update/' . $result['class_registration_id']); ?>
    <div class="row">
      <div class="col-lg-4">
        <div class="form-group">
          <label for="class_id">Class Title</label>
          <select class="form-control" name="class_id" id="class_id">
            <option value="">--</option>
            <?php $selected = NULL; ?>
            <?php foreach ($class

                           as $key => $value): ?>
              <?php if ($value['class_id'] == $result['class_id']): ?>
                <?php $selected = 'selected=selected'; ?>
              <?php else: ?>
                <?php $selected = ''; ?>
              <?php endif; ?>
              <option
                      value="<?php echo $value['class_id']; ?>"<?php echo $selected; ?>><?php echo $value['class_name']; ?></option>

            <?php endforeach; ?>
          </select>
          <small class="help-block error-message"><?php echo form_error('class_id'); ?></small>
        </div>

        <div class="form-group">
          <label for="registration_id">Name</label>
          <select class="form-control" name="registration_id" id="registration_id">
            <option value="">--</option>
            <?php $selected = NULL; ?>
            <?php foreach ($registration

                           as $key => $value): ?>
              <?php if ($value['registration_id'] == $result['registration_id']): ?>
                <?php $selected = 'selected=selected'; ?>
              <?php else: ?>
                <?php $selected = ''; ?>
              <?php endif; ?>
              <option
                      value="<?php echo $value['registration_id']; ?>"<?php echo $selected; ?>><?php echo $value['lastname'] . ', ' . $value['firstname']; ?></option>

            <?php endforeach; ?>
          </select>
          <small class="help-block error-message"><?php echo form_error('registration_id'); ?></small>
        </div>

        <div class="form-group">
          <label for="victory_group_leader_id">Victory Group Leader</label>
          <select class="form-control" name="victory_group_leader_id" id="victory_group_leader_id">
            <option value="">--</option>
            <?php $selected = NULL; ?>

            <?php foreach ($victory_group_leader

                           as $key => $value): ?>
              <?php if ($value['registration_id'] == $result['victory_group_leader_id']): ?>
                <?php $selected = 'selected=selected'; ?>
              <?php else: ?>
                <?php $selected = ''; ?>
              <?php endif; ?>
              <option
                      value="<?php echo $value['registration_id']; ?>"<?php echo $selected; ?>><?php echo $value['lastname'] . ', ' . $value['firstname']; ?></option>

            <?php endforeach; ?>
          </select>
          <small class="help-block error-message"><?php echo form_error('victory_group_leader_id'); ?></small>
        </div>

        <div class="form-group">
          <label for="date_class">Date of Class</label>
          <input type="text" class="form-control" name="date_class" id="date_class"
                 value="<?php echo $result['date_class']; ?>">
          <small class="help-block error-message"><?php echo form_error('date_class'); ?></small>
        </div>

        <div class="form-group">
          <label for="payment">Payment</label>
          <input type="text" class="form-control" name="payment" id="payment"
                 value="<?php echo $result['payment']; ?>">
          <small class="help-block error-message"><?php echo form_error('payment'); ?></small>
        </div>

        <input type="submit" value="Save" class="btn btn-primary">
      </div>
    </div>
    <?php echo form_close(); ?>
  </div>
</div>