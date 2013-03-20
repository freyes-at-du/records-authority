<?php
/*
$departmentID
$divisionName
$departmentName
$sortBy
$surveys
$divDeptArray
 */ 
$sd = 0; // 0 = submitDate	
$fn = 1; // 1 = firstName
$ln = 2; // 2 = lastName
$jt = 3; // 3 = jobTitle
$ea = 4; // 4 = emailAddress

$attributes = array(
    'width'      => '700',
    'height'     => '700',
    'scrollbars' => 'yes',
    'status'     => 'yes',
    'resizable'  => 'yes',
    'screenx'    => '0',
    'screeny'    => '0'
);
?>

<script src="<?php echo base_url('js/search/getSurveys.js'); ?>"></script>
<script src="<?php echo base_url('js/searchResults.js'); ?>"></script>

<?php if ($surveys === false): ?>
    <p><?php echo $this->lang->line('no_results'); ?></p>
<?php else : ?> 
    <?php if ($departmentID != 999999): ?>
        <h2><?php echo trim(strip_tags($divisionName)); ?></h2>
        <h2><?php echo trim(strip_tags($departmentName)); ?></h2>
    <?php else: ?>
        <h2>Display All</h2>
    <?php endif; ?>

    <a href="">New Search</a>
    <table id="searchResultsTable">
        <tr> 
            <th><strong>Division</strong></th>
            <th><strong>Department</strong></th>
            <th><strong><a href="#" onClick="sortBy(<?php echo $departmentID; ?>, <?php echo $divisionID; ?>, <?php echo $sortBy; ?>, <?php echo $fn; ?>);">First Name</a></strong></th>
            <th><strong><a href="#" onClick="sortBy(<?php echo $departmentID; ?>, <?php echo $divisionID; ?>, <?php echo $sortBy; ?>, <?php echo $ln; ?>);">Last Name</a></strong></th>
            <th><strong><a href="#" onClick="sortBy(<?php echo $departmentID; ?>, <?php echo $divisionID; ?>, <?php echo $sortBy; ?>, <?php echo $jt; ?>);">Job Title</a></strong></th>
            <th><strong>Phone Number</strong></th>
            <th><strong><a href="#" onClick="sortBy(<?php echo $departmentID; ?>, <?php echo $divisionID; ?>, <?php echo $sortBy; ?>, <?php echo $ea; ?>);">Email Address</a></strong></th>
            <th><strong><a href="#" onClick="sortBy(<?php echo $departmentID; ?>, <?php echo $divisionID; ?>, <?php echo $sortBy; ?>, <?php echo $sd; ?>);">Submit Date</a></strong></th>
        </tr>

    <?php foreach ($surveys as $survey): ?>
        <tr>
            <td><?php echo trim(strip_tags($survey->divisionName)); ?></td>
            <td>
            <?php if (!empty($survey->departmentName)): ?>
                <?php echo anchor_popup('dashboard/surveyNotesForm/' . $survey->departmentID, trim(strip_tags($survey->departmentName)), $attributes) ?>
            <?php else: ?>
                <?php echo anchor_popup('dashboard/surveyNotesForm/' . $survey->departmentID, trim(strip_tags($survey->departmentID)), $attributes) ?>
            <?php endif; ?>
            </td>
            <td><?php echo trim(strip_tags($survey->firstName)); ?></td>
            <td><?php echo trim(strip_tags($survey->lastName)); ?></td>
            <td><?php echo trim(strip_tags($survey->jobTitle)); ?></td>
            <td><?php echo trim(strip_tags($survey->phoneNumber)); ?></td>    
            <td><?php echo trim(strip_tags($survey->emailAddress)); ?></td>
            <td><?php echo trim(strip_tags($survey->submitDate)); ?></td>
        </tr>
    <?php endforeach; ?>
    </table>
<?php endif; ?>
