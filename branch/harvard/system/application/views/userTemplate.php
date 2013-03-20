<?php echo $this->load->view('includes/header'); ?>
<div id="mainContent" role="main" class="twoColumn">
    <nav>
        <?php $this->load->view('includes/navigation'); ?>
    </nav>
    <div id="rightContent">
        <h3 class="superTitle"><?php echo $this->lang->line('super_title_user'); ?></h3>
        <div id="flashes">
            <?php if ($this->session->flashdata('error')): ?>
            <div id="errors"><?php echo $this->session->flashdata('error'); ?></div>
            <?php elseif ($this->session->flashdata('message')): ?>
            <div id="messages"><?php echo $this->session->flashdata('message'); ?></div>
            <?php endif; ?>
        </div>
        <?php echo $contents; ?>
    </div>
</div>
<?php $this->load->view('includes/footer'); ?>
