<div class="row">
  <div class="col-lg-12">
    <h3 class="page-header"><?php echo $title; ?></h3>
    <?php echo form_open('maintenance/journey/update/' . $result['journey_id']); ?>
    <div class="row">
      <div class="col-lg-4">
        <div class="form-group">
          <label for="journey_name">Journey Name</label>
          <input type="text" class="form-control" name="journey_name" id="journey_name"
                 value="<?php echo $result['journey_name']; ?>">
          <small class="help-block error-message"><?php echo form_error('journey_name'); ?></small>
        </div>

        <div class="form-group">
          <label for="journey_description">Journey Description</label>
          <textarea class="form-control" rows="3" name="journey_description"
                    id="journey_description"><?php echo $result['journey_description']; ?></textarea>
          <small class="help-block error-message"><?php echo form_error('journey_description'); ?></small>
        </div>

        <div class="form-group">
          <label for="prerequisite">Prerequisite</label>
          <select class="form-control" name="prerequisite" id="prerequisite">
            <option value="">--</option>
            <?php $selected = NULL; ?>
            <?php foreach ($prerequisite as $key => $value): ?>
              <?php if ($value['journey_id'] == $result['prerequisite']): ?>
                <?php $selected = 'selected=selected'; ?>
              <?php else: ?>
                <?php $selected = ''; ?>
              <?php endif; ?>
              <option
                value="<?php echo $value['journey_id']; ?>" <?php echo $selected; ?>><?php echo $value['journey_name']; ?></option>
            <?php endforeach; ?>
          </select>
          <small class="help-block error-message"><?php echo form_error('prerequisite'); ?></small>
        </div>

        <div class="form-group">
          <label for="weight">Weight</label>
          <input type="text" class="form-control" name="weight" id="weight" value="<?php echo $result['weight']; ?>">
          <small class="help-block error-message"><?php echo form_error('weight'); ?></small>
        </div>

        <input type="submit" value="Save" class="btn btn-primary">
      </div>
    </div>

    <?php echo form_close(); ?>
  </div>
</div>