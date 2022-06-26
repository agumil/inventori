<?php if ($this->session->flashdata('alert_fail')) {?>
    <div class="alert alert-danger">
        <strong>Oops !</strong>&nbsp;<?php echo $this->session->flashdata('alert_fail'); ?>
    </div>
<?php }?>

<?php if ($this->session->flashdata('alert_warning')) {?>
    <div class="alert alert-warning">
        <strong>Warning !</strong>&nbsp;<?php echo $this->session->flashdata('alert_warning'); ?>
    </div>
<?php }?>

<?php if ($this->session->flashdata('alert_success')) {?>
    <div class="alert alert-success">
        <strong>Success !</strong>&nbsp;<?php echo $this->session->flashdata('alert_success'); ?>
    </div>
<?php }?>