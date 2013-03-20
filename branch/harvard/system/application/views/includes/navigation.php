<?php
$searchPopUp = array(
    'width' => '1300',
    'height' => '1000',
    'scrollbars' => 'yes',
    'status'     => 'yes',
    'resizable'  => 'yes',
    'screenx'    => '0',
    'screeny'    => '0'
);		
?>
<a href="#mainContent" id="skipLink">Skip to main content</a>
<?php if ($this->ion_auth->logged_in()): ?>
<section>
    <?php echo anchor('du/mySchedules', 'My Retention Schedules', array('class' => 'my_schedules_link')); ?>
</section>
<?php endif; ?>
<section>
    <?php $this->load->view('public/forms/retentionScheduleFTSearchForm'); ?>
</section>
<section>
    <h3><?php echo $this->lang->line('nav_browse_title'); ?></h3>
    <ul>
        <li><a href="<?php echo site_url();?>/du/retentionSchedules/recordCategory">Browse by Category</a></li>
        <!-- <li><a href="<?php echo site_url();?>/du/retentionSchedules/browseByDepartment">Browse by Department</a></li> -->
    </ul>
</section>
<section>
    <h3><?php echo $this->lang->line('nav_access_title'); ?></h3>
    <?php
        $attributes = array('id' => 'searchAllRetentionSchedules');
        $inputData = array(	'name' 	=> 'searchAllRetentionSchedules', 
            'class' => 'buttonLink',
        );
        echo form_open('/du/fullTextSearch', $attributes);
        echo form_submit($inputData, 'Full Schedule');
        echo form_hidden('keyword', '*');
        echo form_close();
    ?>
    <!-- <a href="<?php echo site_url('/export/transform/999999/public'); ?>">Print Full Schedule</a> -->
</section>
<section>
    <ul>
        <li>
            <?php echo anchor_popup('http://www.du.edu/bfa/records/retention_sched.html', $this->lang->line('nav_faq'), $searchPopUp); ?>
        </li>
    </ul>
</section>
<section>
    <?php echo anchor_popup('http://hul.harvard.edu/rmo/contact.shtml', $this->lang->line('nav_contact'), $searchPopUp); ?>
</section>
<!-- 
<section>
    <ul>
        <li><a href="<?php echo site_url('/login'); ?>"><?php echo $this->lang->line('nav_survey'); ?></a></li>
    </ul>
</section>
-->
