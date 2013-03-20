<?php
/*
 *
 *
 */
$attributes = array(
    'width'      => '700',
    'height'     => '700',
    'scrollbars' => 'yes',
    'status'     => 'yes',
    'resizable'  => 'yes',
    'screenx'    => '0',
    'screeny'    => '0'
);

$rc = 0; // 0 = recordCategory
$rn = 1; // 1 = recordName
?>
<script src="<?php echo base_url('js/getRecordTypes.js'); ?>"></script>
<script src="<?php echo base_url('js/searchResults.js'); ?>"></script>

<?php if ($departmentID != 999999): ?>
    <h2><?php echo trim(strip_tags($divisionName)); ?></h2>
    <h2><?php echo trim(strip_tags($departmentName)); ?></h2>
<?php else: ?>
    <h2>Display All</h2>
<?php endif; ?>

<a href="<?php echo site_url('export/transformRecordType/' . $departmentID . '/excel'); ?>">
<img src="<?php echo base_url('images/page_excel.png'); ?>" alt="Export to Excel" border="0" />
</a>&nbsp;&nbsp;

<a href="<?php echo site_url('export/transformRecordType/' . $departmentID . '/csv'); ?>">
<img src="<?php echo base_url('images/page_csv.png'); ?>" alt="Export to CSV" border="0" />
</a>&nbsp;&nbsp;

<a href="<?php echo site_url('export/transformRecordType/' . $departmentID . '/html'); ?>">
<img src="<?php echo base_url('images/page_html.png'); ?>" alt="Export to HTML" border="0" />
</a>&nbsp;&nbsp;
</br>

<a href="">New Search</a>
<table id="searchResultsTable">
    <tr> 
        <th><strong>Division</strong></th>
        <th><strong>Department</strong></th>
        <th><strong><a href="#" onClick="sortBy(<?php echo $departmentID; ?>, <?php echo $divisionID; ?>, <?php echo $sortBy; ?>, <?php echo $rc; ?>);">Functional Category</a></strong></th>
        <th><strong><a href="#" onClick="sortBy(<?php echo $departmentID; ?>, <?php echo $divisionID; ?>, <?php echo $sortBy; ?>, <?php echo $rn; ?>);">Record Name</a></strong></th>
        <th><strong>Description</strong></th>
    </tr>

<?php foreach ($recordTypes as $recordType): ?>
    <tr>
        <td><?php echo trim(strip_tags($recordType->divisionName)); ?></td>
        <td><?php echo trim(strip_tags($recordType->departmentName)); ?></td>
        <td><?php echo trim(strip_tags($recordType->recordCategory)); ?></td>
        <td><?php echo anchor_popup('recordType/edit/' . $recordType->recordInformationID, trim(strip_tags($recordType->recordName)), $attributes); ?></td>
        <td><?php echo trim(strip_tags($recordType->recordDescription)); ?></td>
    </tr>
<?php endforeach; ?>
</table>
