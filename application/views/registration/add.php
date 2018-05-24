<div class="row">
  <div class="col-lg-12">
    <h3 class="page-header"><?php echo $title; ?></h3>
    <?php echo form_open('registration/add'); ?>
    <div class="row">
      <div class="col-lg-4">
        <div class="form-group">
          <label for="firstname">Firstname</label>
          <input type="text" class="form-control" name="firstname" id="firstname">
          <small class="help-block error-message"><?php echo form_error('firstname'); ?></small>
        </div>

        <div class="form-group">
          <label for="school_id">School / Campus</label>
          <select class="form-control" name="school_id" id="school_id">
            <option value="">--</option>
            <?php foreach ($school

                           as $key => $value): ?>
              <option value="<?php echo $value['school_id']; ?>"><?php echo $value['school_name']; ?></option>

            <?php endforeach; ?>
          </select>
          <small class="help-block error-message"><?php echo form_error('school_id'); ?></small>
        </div>

        <div class="form-group">
          <label for="contact_no">Contact Number</label>
          <input type="number" class="form-control" name="contact_no" id="contact_no">
          <small class="help-block error-message"><?php echo form_error('contact_no'); ?></small>
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" id="email">
          <small class="help-block error-message"><?php echo form_error('email'); ?></small>
        </div>


        <div class="form-group">
          <label for="street">Street</label>
          <input type="text" class="form-control" name="street" id="street">
          <small class="help-block error-message"><?php echo form_error('street'); ?></small>
        </div>

        <div class="form-group">
          <label for="barangay">Barangay</label>
          <input type="text" class="form-control" name="barangay" id="barangay">
          <small class="help-block error-message"><?php echo form_error('barangay'); ?></small>
        </div>

        <div class="form-group">
          <label for="city">City</label>
          <input type="text" class="form-control" name="city" id="city">
          <small class="help-block error-message"><?php echo form_error('city'); ?></small>
        </div>

        <div class="form-group">
          <label for="province">Province</label>
          <input type="text" class="form-control" name="province" id="province">
          <small class="help-block error-message"><?php echo form_error('province'); ?></small>
        </div>

        <div class="form-group">
          <label for="birthday">Birthday</label>
          <input type="text" class="form-control" name="birthday" id="birthday">
          <small class="help-block error-message"><?php echo form_error('birthday'); ?></small>
        </div>
      </div>
      <div class="col-lg-4">

        <div class="form-group">
          <label for="lastname">Lastname</label>
          <input type="text" class="form-control" name="lastname" id="lastname">
          <small class="help-block error-message"><?php echo form_error('lastname'); ?></small>
        </div>




        <div class="form-group">
          <label for="victory_group_leader_id">Victory Group Leader</label>
          <select class="form-control" name="victory_group_leader_id" id="victory_group_leader_id">
            <option value="">--</option>
            <?php foreach ($victory_group_leader

                           as $key => $value): ?>
              <option
                value="<?php echo $value['registration_id']; ?>"><?php echo $value['lastname'] . ', ' . $value['firstname']; ?></option>

            <?php endforeach; ?>
          </select>
          <small class="help-block error-message"><?php echo form_error('victory_group_leader_id'); ?></small>
        </div>


        <div class="form-group">
          <label for="member_type_id">Member Type</label>
          <select class="form-control" name="member_type_id" id="member_type_id">
            <option value="">--</option>
            <?php foreach ($member_type

                           as $key => $value): ?>
              <option value="<?php echo $value['member_type_id']; ?>"><?php echo $value['member_type_name']; ?></option>

            <?php endforeach; ?>
          </select>
          <small class="help-block error-message"><?php echo form_error('member_type_id'); ?></small>
        </div>

        <div class="form-group">
          <label for="status_id">Status</label>
          <select class="form-control" name="status_id" id="status_id">
            <option value="">--</option>
            <?php foreach ($status

                           as $key => $value): ?>
              <option value="<?php echo $value['status_id']; ?>"><?php echo $value['status_name']; ?></option>

            <?php endforeach; ?>
          </select>
          <small class="help-block error-message"><?php echo form_error('status_id'); ?></small>
        </div>
      </div>
    </div>
    <input type="submit" value="Save" class="btn btn-primary">

    <?php echo form_close(); ?>
  </div>
</div>