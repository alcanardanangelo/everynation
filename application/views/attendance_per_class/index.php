<div class="row">
  <div class="col-lg-12">
    <h3 class="page-header"><?php echo $title; ?></h3>
    <?php if ($this->session->flashdata('message')): ?>
      <div class="alert alert-success"><?php echo $this->session->flashdata('message'); ?></div>
    <?php endif; ?>
    <?php echo form_open('', ['class' => 'inline']); ?>
    <div class="row">

      <div class="col-lg-4">
        <div class="form-group">
          <label for="monthly_topic_id">Monthly Topic</label>
          <select class="form-control" name="monthly_topic_id" id="monthly_topic_id">
            <option value="">--</option>
            <?php foreach ($monthly_topic as $key => $value): ?>
              <option value="<?php echo $value['monthly_topic_id']; ?>"><?php echo $value['monthly_topic_name']; ?></option>
            <?php endforeach; ?>
          </select>
          <small class="help-block error-message"><?php echo form_error('monthly_topic_id'); ?></small>
          <input type="submit" class="btn btn-primary" value="Search" name="search_attendance_per_class">

        </div>


      </div>

    </div>


    <?php echo form_close(); ?>

    <hr>
    <a href="<?php echo site_url('attendance-per-class/add'); ?>" class="btn btn-primary">Add Attendance</a>
  </div>
</div>

<?php if (isset($result)): ?>
  <div class="row">
    <div class="col-lg-12">
      <table class="table table-hover">
        <thead>
        <th>#</th>
        <th>Monthly Topic</th>
        <th>Date</th>
        <th>Member</th>
        </thead>
        <tbody>
        <?php foreach ($result

                       as $key => $value): ?>
          <?php $value_total = $value['total']; ?>
          <tr>
            <td><?php echo $key + 1; ?></td>
            <td><?php echo $value['monthly_topic_name']; ?></td>
            <td><?php echo $value['date']; ?></td>
            <td><?php echo $value['lastname'] . ', ' . $value['firstname']; ?></td>
          </tr>
        <?php endforeach; ?>
        <?php if (isset($value_total)): ?>
          <tr>
            <td colspan="5" class="text-right"><strong>Total Attendees: <?php echo $value_total; ?></strong></td>
          </tr>
        <?php endif; ?>

        </tbody>

      </table>
      <a href="<?php echo site_url('attendance-per-class/print'); ?>" class="btn btn-primary" target="_blank">Print</a>
    </div>
  </div>
<?php endif; ?>
