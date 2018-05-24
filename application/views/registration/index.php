<div class="row">
  <div class="col-lg-12">
    <h3 class="page-header"><?php echo $title; ?></h3>
    <?php if ($this->session->flashdata('message')): ?>
      <div class="alert alert-success"><?php echo $this->session->flashdata('message'); ?></div>
    <?php endif; ?>
    <?php echo form_open('', ['class' => 'inline']); ?>
    <div class="row">
      <div class="col-lg-2">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" name="name" id="name">
          <small class="help-block error-message"><?php echo form_error('name'); ?></small>
        </div>
      </div>

      <div class="col-lg-2">
        <div class="form-group">
          <label for="school_id">School / Campus</label>
          <select class="form-control" name="school_id" id="school_id">
            <option value="">--</option>
            <?php foreach ($school as $school_key => $school_value): ?>
              <option value="<?php echo $school_value['school_id']; ?>"><?php echo $school_value['school_name']; ?></option>
            <?php endforeach; ?>
          </select>
        </div>

      </div>

      <div class="col-lg-2">
        <label for="member_type_id">Member Type</label>
        <select class="form-control" name="member_type_id" id="member_type_id">
          <option value="">--</option>
          <?php foreach ($member_type as $member_type_key => $member_type_value): ?>
            <option value="<?php echo $member_type_value['member_type_id']; ?>"><?php echo $member_type_value['member_type_name']; ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="col-lg-2">
        <label for="status_id">Status</label>
        <select class="form-control" name="status_id" id="status_id">
          <option value="">--</option>
          <?php foreach ($status as $status_key => $status_value): ?>
            <option value="<?php echo $status_value['status_id']; ?>"><?php echo $status_value['status_name']; ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="col-lg-2 search-button">
        <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Search" name="search_registration">
        </div>
      </div>
    </div>


    <?php echo form_close(); ?>

    <hr>
    <a href="<?php echo site_url('registration/add'); ?>" class="btn btn-primary">
      Add Registration</a>

  </div>

</div>

<?php if (isset($result)): ?>
  <div class="row">
    <div class="col-lg-12">
      <table class="table table-hover">
        <thead>
        <th>#</th>
        <th>Name</th>
        <th>Contact No</th>
        <th>Email</th>
        <th>School</th>
        <th>Victory Group Leader</th>
        <th>Member Type</th>
        <th>Status</th>
        <th></th>
        </thead>
        <tbody>
        <?php foreach ($result as $key => $value): ?>
          <tr>
            <td><?php echo $key + 1; ?></td>
            <td><?php echo $value['reg_lastname'] . ', ' . $value['reg_firstname']; ?></td>
            <td><?php echo $value['mobile']; ?></td>
            <td><?php echo $value['email_add']; ?></td>
            <td><?php echo $value['school_name']; ?></td>

              <td><?php echo $value['vgl_lastname'] . ', ' . $value['vgl_firstname']; ?></td>

            <td><?php echo $value['member_type_name']; ?></td>
            <td><?php echo $value['status_name']; ?></td>

            <td><a href="
            <?php echo site_url('registration/update/' . $value['registration_id']); ?>">Edit</a>
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody>

      </table>
      <a href="<?php echo site_url('registration/print'); ?>" class="btn btn-primary" target="_blank">Print</a>
    </div>
  </div>
<?php endif; ?>