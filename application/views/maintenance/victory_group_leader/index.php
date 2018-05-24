<div class="row">
  <div class="col-lg-12">
    <h3 class="page-header"><?php echo $title; ?></h3>
    <?php if ($this->session->flashdata('message')): ?>
      <div class="alert alert-success"><?php echo $this->session->flashdata('message'); ?></div>
    <?php endif; ?>
    <a href="<?php echo site_url('maintenance/victory-group-leader/add'); ?>" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span>&nbspAdd Victory Group Leader</a>
    <?php if ($result): ?>
      <table class="table table-hover">
        <thead>
        <th>#</th>
        <th>Name</th>
        <th>Date Added</th>
        <th></th>
        </thead>
        <tbody>
        <?php foreach ($result as $key => $value): ?>
          <tr>
            <td><?php echo $key + 1; ?></td>
            <td><?php echo $value['victory_group_leader_lastname'] . ', ' . $value['victory_group_leader_firstname']; ?></td>
            <td><?php echo $value['date_created']; ?></td>
            <td><a href="
            <?php echo site_url('maintenance/victory-group-leader/update/' . $value['victory_group_leader_id']); ?>">Edit</a>
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody>

      </table>

    <?php endif; ?>
  </div>
</div>