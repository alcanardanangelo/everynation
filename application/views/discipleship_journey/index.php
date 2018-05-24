<div class="row">
  <div class="col-lg-12">
    <h3 class="page-header"><?php echo $title; ?> (<?php if (isset($member)) echo $member; ?>)</h3>
    <?php if ($this->session->flashdata('message')): ?>
      <div class="alert alert-success"><?php echo $this->session->flashdata('message'); ?></div>
    <?php endif; ?>
    <?php echo form_open('discipleship-journey'); ?>
    <div class="row">
      <div class="col-lg-4">
        <?php if (isset($registration_id)): ?>
          <input type="hidden" value="<?php echo $registration_id; ?>" id="registration_id" name="registration_id">
        <?php endif; ?>
        <div class="form-group">
          <label for="registration_id">Member Name</label>
          <select class="form-control" name="registration_id" id="registration_id">
            <option value="">--</option>
            <?php foreach ($registration as $key => $value): ?>
              <option
                value="<?php echo $value['registration_id']; ?>"><?php echo $value['lastname'] . ', ' . $value['firstname']; ?></option>
            <?php endforeach; ?>
          </select>
          <small class="help-block error-message"><?php echo form_error('registration_id'); ?></small>
        </div>
        <input type="submit" value="Search" class="btn btn-primary">
        <?php if (isset($result)): ?>
          <a href="#" class="btn btn-info" data-toggle="modal" data-target="#myModal">Add Journey</a>
        <?php endif; ?>
      </div>
      <?php echo form_close(); ?>
    </div>
    <?php if (isset($result)): ?>
      <div class="row">
        <div class="col-lg-12">
          <table class="table table-hover">
            <thead>
            <th>Journey</th>
            <th>Status</th>
            <th>Date Started</th>
            <th>Date Completed</th>
            <th>Victory Group Leader</th>
            <th></th>
            </thead>

            <tbody>
            <?php foreach ($result

                           as $key => $value): ?>
              <tr>
                <td><?php echo $value['journey_name']; ?></td>
                <td>
                  <?php if ($value['status'] == 1): ?>
                    <p>Completed</p>
                  <?php else: ?>
                    <select class="form-control status_update" name="status_update" id="status_update">
                      <option value="">--</option>
                      <option value="0" <?php if ($value['status'] == 0) echo 'selected=selected' ?>>Ongoing</option>
                      <option value="1" <?php if ($value['status'] == 1) echo 'selected=selected' ?>>Completed</option>
                    </select>
                  <?php endif; ?>

                </td>
                <td>
                  <p><?php echo $value['date_journey_start']; ?></p>
                </td>

                <td>
                  <p><?php echo $value['date_journey_end']; ?></p>
                </td>

                <td>
                  <p><?php echo $value['lastname'] . ', ' . $value['firstname']; ?></p>
                </td>
              </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
          <a href="<?php echo site_url('discipleship-journey/print'); ?>" class="btn btn-primary" target="_blank">Print</a>
        </div>
      </div>
    <?php endif; ?>

  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        <table class="table table-hover" id="test">
          <thead>
          <th>Journey</th>
          <th>Victory Group Leader</th>
          </thead>

          <tbody>
          <tr>
            <td>
              <select class="form-control" name="journey_id" id="journey_id">
                <option value="">--</option>
                <?php if (empty($available_journey)): ?>
                  <option value="1">One2One</option>
                <?php else: ?>
                  <?php foreach ($available_journey

                                 as $key => $value): ?>
                    <option value="<?php echo $value['journey_id']; ?>"><?php echo $value['journey_name']; ?></option>
                  <?php endforeach; ?>
                <?php endif; ?>
              </select>
            </td>

            <td>
              <select class="form-control" name="victory_group_leader_id" id="victory_group_leader_id">
                <option value="">--</option>
                <?php foreach ($victory_group_leader
                               as $key => $value): ?>
                  <option
                    value="<?php echo $value['registration_id']; ?>"><?php echo $value['firstname'] . ', ' . $value['lastname']; ?></option>
                <?php endforeach; ?>

              </select>
            </td>
          </tr>
          </tbody>

        </table>

      </div>
      <div class="modal-footer">
        <a href="" class="btn btn-primary" id="discipleship_journey_save">Save changes</a>
      </div>
    </div>
  </div>
</div>