<div class="row">
  <div class="col-lg-12">
    <h3 class="page-header"><?php echo $title; ?></h3>
    <?php if ($this->session->flashdata('message')): ?>
      <div class="alert alert-success"><?php echo $this->session->flashdata('message'); ?></div>
    <?php endif; ?>
    <a href="<?php echo site_url('maintenance/member-type/add'); ?>" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span>&nbspAdd Member Type</a>
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
            <td><?php echo $value['member_type_name']; ?></td>
            <td><?php echo $value['date_created']; ?></td>
            <td><a href="<?php echo site_url('maintenance/member-type/update/' . $value['member_type_id']); ?>">Edit</a>
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody>

      </table>

    <?php endif; ?>
  </div>
</div>