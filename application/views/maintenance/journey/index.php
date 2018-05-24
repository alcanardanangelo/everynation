<div class="row">
  <div class="col-lg-12">
    <h3 class="page-header"><?php echo $title; ?></h3>
    <?php if ($this->session->flashdata('message')): ?>
      <div class="alert alert-success"><?php echo $this->session->flashdata('message'); ?></div>
    <?php endif; ?>
    <a href="<?php echo site_url('maintenance/journey/add'); ?>" class="btn btn-primary"><span
        class="glyphicon glyphicon-plus-sign"></span>&nbspAdd Journey</a>
    <?php if ($result): ?>
      <table class="table table-hover">
        <thead>
        <th>#</th>
        <th>Journey Name</th>
        <th>Journey Description</th>
        <th>Preqrequisite</th>
        <th>Date Created</th>
        <th></th>
        </thead>
        <tbody>
        <?php foreach ($result

                       as $key => $value): ?>
          <tr>
            <td><?php echo $key + 1; ?></td>
            <td><?php echo $value['journey_name']; ?></td>
            <td><?php echo substr($value['journey_description'], 0, 155); ?>...</td>
            <td><?php echo fetch_journey_name($value['prerequisite']); ?></td>
            <td><?php echo $value['date_created']; ?></td>
            <td><a href="
            <?php echo site_url('maintenance/journey/update/' . $value['journey_id']); ?>">Edit</a>
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody>

      </table>

    <?php endif; ?>  </div>
</div>