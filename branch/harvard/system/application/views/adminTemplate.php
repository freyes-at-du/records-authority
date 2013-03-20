<?php $this->load->view('includes/header'); ?>
<div id="mainContent" role="main" class="oneColumn">
    <div id="messages">
        <?php echo $this->session->flashdata('message'); ?>
    </div>
    <h3 class="superTitle"><?php echo $this->lang->line('super_title_admin'); ?></h3>
    <?php echo $contents; ?>
</div>
<?php $this->load->view('includes/footer'); ?>
