<div class="row">
  <div class="col-lg-12">

    <h3 class="page-header"><?php echo $title; ?></h3>
    <?php echo form_open('registration/update/' . $result['registration_id']); ?>
    <div class="row">
      <div class="col-lg-4">
        <div class="form-group">
          <label for="firstname">Firstname</label>
          <input type="text" class="form-control" name="firstname" id="firstname"
                 value="<?php echo $result['firstname']; ?>">
          <small class="help-block error-message"><?php echo form_error('firstname'); ?></small>
        </div>

        <div class="form-group">
          <label for="school_id">School / Campus</label>
          <select class="form-control" name="school_id" id="school_id">
            <option value="">--</option>
            <?php $selected = NULL; ?>
            <?php foreach ($school

                           as $key => $value): ?>
              <?php if ($value['school_id'] == $result['school_id']): ?>
                <?php $selected = 'selected=selected'; ?>
              <?php else: ?>
                <?php $selected = ''; ?>
              <?php endif; ?>
              <option
                value="<?php echo $value['school_id']; ?>" <?php echo $selected; ?>><?php echo $value['school_name']; ?></option>


            <?php endforeach; ?>
          </select>
          <small class="help-block error-message"><?php echo form_error('school_id'); ?></small>
        </div>


        <div class="form-group">
          <label for="contact_no">Contact Number</label>
          <input type="text" class="form-control" name="contact_no" id="contact_no"  value="<?php echo $result['contact_no']; ?>">
          <small class="help-block error-message"><?php echo form_error('contact_no'); ?></small>
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" id="email"  value="<?php echo $result['email']; ?>">
          <small class="help-block error-message"><?php echo form_error('email'); ?></small>
        </div>


        <div class="form-group">
          <label for="street">Street</label>
          <input type="text" class="form-control" name="street" id="street" value="<?php echo $result['street']; ?>">
          <small class="help-block error-message"><?php echo form_error('street'); ?></small>
        </div>

        <div class="form-group">
          <label for="barangay">Barangay</label>
          <input type="text" class="form-control" name="barangay" id="barangay" value="<?php echo $result['barangay']; ?>">
          <small class="help-block error-message"><?php echo form_error('barangay'); ?></small>
        </div>

        <div class="form-group">
          <label for="city">City</label>
          <input type="text" class="form-control" name="city" id="city" value="<?php echo $result['city']; ?>">
          <small class="help-block error-message"><?php echo form_error('city'); ?></small>
        </div>

        <div class="form-group">
          <label for="province">Province</label>
          <input type="text" class="form-control" name="province" id="province" value="<?php echo $result['province']; ?>">
          <small class="help-block error-message"><?php echo form_error('province'); ?></small>
        </div>

        <div class="form-group">
          <label for="birthday">Birthday</label>
          <input type="text" class="form-control" name="birthday" id="birthday"
                 value="<?php echo $result['birthday']; ?>">
          <small class="help-block error-message"><?php echo form_error('birthday'); ?></small>
        </div>
      </div>
      <div class="col-lg-4">

        <div class="form-group">
          <label for="lastname">Lastname</label>
          <input type="text" class="form-control" name="lastname" id="lastname"
                 value="<?php echo $result['lastname']; ?>">
          <small class="help-block error-message"><?php echo form_error('lastname'); ?></small>
        </div>



        <div class="form-group">
          <label for="victory_group_leader_id">Victory Group Leader</label>
          <select class="form-control" name="victory_group_leader_id" id="victory_group_leader_id">
            <option value="">--</option>
            <?php $selected = NULL; ?>
            <?php foreach ($victory_group_leader

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
          <small class="help-block error-message"><?php echo form_error('victory_group_leader_id'); ?></small>
        </div>


        <div class="form-group">
          <label for="member_type_id">Member Type</label>
          <select class="form-control" name="member_type_id" id="member_type_id">
            <option value="">--</option>
            <?php $selected = NULL; ?>
            <?php foreach ($member_type

                           as $key => $value): ?>
              <?php if ($value['member_type_id'] == $result['member_type_id']): ?>
                <?php $selected = 'selected=selected'; ?>
              <?php else: ?>
                <?php $selected = ''; ?>
              <?php endif; ?>
              <option
                value="<?php echo $value['member_type_id']; ?>"<?php echo $selected; ?>><?php echo $value['member_type_name']; ?></option>

            <?php endforeach; ?>
          </select>
          <small class="help-block error-message"><?php echo form_error('member_type_id'); ?></small>
        </div>

        <div class="form-group">
          <label for="status_id">Status</label>
          <select class="form-control" name="status_id" id="status_id">
            <option value="">--</option>
            <?php $selected = NULL; ?>
            <?php foreach ($status

                           as $key => $value): ?>
              <?php if ($value['status_id'] == $result['status_id']): ?>
                <?php $selected = 'selected=selected'; ?>
              <?php else: ?>
                <?php $selected = ''; ?>
              <?php endif; ?>
              <option
                value="<?php echo $value['status_id']; ?>"<?php echo $selected; ?>><?php echo $value['status_name']; ?></option>

            <?php endforeach; ?>
          </select>
          <small class="help-block error-message"><?php echo form_error('status_id'); ?></small>
        </div>
      </div>
    </div>



  </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <h3 class="page-header">Classes</h3>
    <?php if ($class): ?>
      <table class="table table-hover">
        <thead>
        <th>#</th>
        <th>Class</th>
        <th>Victory Group Leader</th>
        </thead>
        <tbody>
        <?php foreach ($class as $key => $value): ?>
          <tr>
            <td><?php echo $key + 1; ?></td>
            <td><?php echo $value['class_name']; ?></td>
            <td><?php echo $value['victory_group_leader_firstname'] . ', ' . $value['victory_group_leader_lastname'];; ?></td>
          </tr>
        <?php endforeach; ?>
        </tbody>

      </table>
    <?php else: ?>
    <?php endif; ?>
  </div>
</div>
<input type="submit" value="Save" class="btn btn-primary">
<?php echo form_close(); ?>