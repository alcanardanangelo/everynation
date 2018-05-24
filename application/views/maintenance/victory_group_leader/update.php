<div class="row">
  <div class="col-lg-12">
    <h3 class="page-header"><?php echo $title; ?></h3>
    <?php echo form_open('maintenance/victory-group-leader/update/' . $result['victory_group_leader_id']); ?>
    <div class="row">
      <div class="col-lg-4">
        <div class="form-group">
          <label for="victory_group_leader_firstname">Firstname</label>
          <input type="text" class="form-control" name="victory_group_leader_firstname"
                 id="victory_group_leader_firstname" value="<?php echo $result['victory_group_leader_firstname']; ?>">
          <small class="help-block error-message"><?php echo form_error('victory_group_leader_firstname'); ?></small>
        </div>

        <div class="form-group">
          <label for="victory_group_leader_lastname">Lastname</label>
          <input type="text" class="form-control" name="victory_group_leader_lastname"
                 id="victory_group_leader_lastname" value="<?php echo $result['victory_group_leader_lastname']; ?>">
          <small class="help-block error-message"><?php echo form_error('victory_group_leader_lastname'); ?></small>
        </div>

        <input type="submit" value="Save" class="btn btn-primary">
      </div>
    </div>

    <?php echo form_close(); ?>
  </div>
</div>