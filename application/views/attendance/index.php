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
          <label for="date_from">Date From</label>
          <input type="text" class="form-control" name="date_from" id="date_from">
          <small class="help-block error-message"><?php echo form_error('date_from'); ?></small>
        </div>
      </div>

      <div class="col-lg-2">
        <div class="form-group">
          <label for="date_to">Date To</label>
          <input type="text" class="form-control" name="date_to" id="date_to">
          <small class="help-block error-message"><?php echo form_error('date_to'); ?></small>
        </div>
      </div>


      <div class="col-lg-2 search-button">
        <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Search" name="search_attendance">
        </div>
      </div>
    </div>


    <?php echo form_close(); ?>

    <hr>
    <a href="<?php echo site_url('attendance/add'); ?>" class="btn btn-primary">Add Attendance</a>
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
        <th>Time of Service</th>
        <th>Attendees</th>
        <th></th>
        </thead>
        <tbody>
        <?php foreach ($result

                       as $key => $value): ?>
          <?php $value_total = $value['total']; ?>
          <tr>
            <td><?php echo $key + 1; ?></td>
            <td><?php echo $value['monthly_topic_name']; ?></td>
            <td><?php echo $value['date_of_service']; ?></td>
            <td><?php echo $value['time_of_service']; ?></td>
            <td><?php echo $value['no_of_attendees']; ?></td>
          </tr>
        <?php endforeach; ?>
        <?php if (isset($value_total)): ?>
          <tr>
            <td colspan="5" class="text-right"><strong>Total Attendees: <?php echo $value_total; ?></strong></td>
          </tr>
        <?php endif; ?>

        </tbody>

      </table>
      <a href="<?php echo site_url('attendance/print'); ?>" class="btn btn-primary" target="_blank">Print</a>
    </div>
  </div>
<?php endif; ?>
