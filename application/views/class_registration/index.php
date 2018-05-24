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
          <label for="school_id">Class</label>
          <select class="form-control" name="class_id" id="class_id">
            <option value="">--</option>
            <?php foreach ($class as $class_key => $class_value): ?>
              <option
                      value="<?php echo $class_value['class_id']; ?>"><?php echo $class_value['class_name']; ?></option>
            <?php endforeach; ?>
          </select>
        </div>

      </div>

      <div class="col-lg-2">
        <label for="victory_group_leader_id">Victory Group Leader</label>
        <select class="form-control" name="victory_group_leader_id" id="victory_group_leader_id">
          <option value="">--</option>
          <?php foreach ($victory_group_leader as $victory_group_leader_key => $victory_group_leader_value): ?>
            <option
                    value="<?php echo $victory_group_leader_value['registration_id']; ?>"><?php echo $victory_group_leader_value['lastname'] . ', ', $victory_group_leader_value['firstname']; ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="col-lg-2 search-button">
        <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Search" name="search_class_registration">
        </div>
      </div>
    </div>


    <?php echo form_close(); ?>

    <hr>
    <a href="<?php echo site_url('class-registration/add'); ?>" class="btn btn-primary">Add Class Registration</a>

  </div>
</div>

<?php if (isset($result)): ?>
  <div class="row">
    <div class="col-lg-12">
      <table class="table table-hover">
        <thead>
        <th>#</th>
        <th>Name</th>
        <th>Class</th>
        <th>Date of Class</th>
        <th>Victory Group Leader</th>
        <th>Payment</th>
        <th>Balance</th>
        </thead>
        <tbody>
        <?php foreach ($result as $key => $value): ?>
          <tr>
            <td><?php echo $key + 1; ?></td>
            <td><?php echo $value['lastname'] . ', ' . $value['firstname']; ?></td>
            <td><?php echo $value['class_name']; ?></td>

            <td><?php echo $value['date_class']; ?></td>
            <td><?php echo $value['victory_group_leader_lastname'] . ', ' . $value['victory_group_leader_firstname']; ?></td>
            <td><?php echo $value['payment']; ?></td>
            <td><?php echo $value['balance']; ?></td>
            <td><a href="
            <?php echo site_url('class-registration/update/' . $value['class_registration_id']); ?>">Edit</a>
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody>

      </table>
      <a href="<?php echo site_url('class-registration/print'); ?>" class="btn btn-primary" target="_blank">Print</a>
    </div>
  </div>


<?php endif; ?>