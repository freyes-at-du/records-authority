<?php
/**
 * Copyright 2011 University of Denver--Penrose Library--University Records Management Program
 * Author evan.blount@du.edu and fernando.reyes@du.edu
 * 
 * This file is part of Records Authority.
 * 
 * Records Authority is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * Records Authority is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with Records Authority.  If not, see <http://www.gnu.org/licenses/>.
 **/
?>

<?php 
$data['title'] = 'Dashboard - Records Authority';
$popUpParams = array(
    'width' => '800',
    'height' => '800',
    'scrollbars' => 'yes',
    'status'     => 'yes',
    'resizable'  => 'yes',
    'screenx'    => '0',
    'screeny'    => '0'
);
$searchPopUpParams = array(
    'width' => '1300',
    'height' => '1000',
    'scrollbars' => 'yes',
    'status'     => 'yes',
    'resizable'  => 'yes',
    'screenx'    => '0',
    'screeny'    => '0'
);		
$mediumPopUpParams = array(
    'width' => '700',
    'height' => '270',
    'scrollbars' => 'yes',
    'status'     => 'yes',
    'resizable'  => 'yes',
    'screenx'    => '0',
    'screeny'    => '0'
);
$shadowboxPopUpParams = array(
    'rel' => 'shadowbox;player=iframe;width=1200;height=800'
);
$shadowboxMediumPopUpParams = array(
    'rel' => 'shadowbox;player=iframe;width=700;height=270'
);
$retentionSchedulePopUp = array(
    'width' => '800',
    'height' => '800',
    'scrollbars' => 'yes',
    'status'     => 'yes',
    'resizable'  => 'yes',
    'screenx'    => '0',
    'screeny'    => '0'
);
$imagePath = base_url() . "/images";
$imagePlus = array(
    'src'=>"$imagePath/ffd40f_11x11_icon_plus.gif",
    'border'=>0,
);
$imageDoc = array(
    'src'=>"$imagePath/ffd40f_11x11_icon_doc.gif",
    'border'=>0,
);
$imageFolder = array(
    'src'=>"$imagePath/ffd40f_11x11_icon_folder_open.gif",
    'border'=>0,
);
$imageClose = array(
    'src'=>"$imagePath/ffd40f_11x11_icon_close.gif",
    'border'=>0,
);
?>
<div id="dashboard">
    <section>
        <h3>Data Entry</h3>
        <ul>
            <li><?php echo anchor_popup('/search/searchSurveys', 'Browse Submitted Surveys', $searchPopUpParams); ?></li>
            <li><?php echo anchor_popup('/recordType/view/', 'Create Record Inventory', $popUpParams) ?></li>
            <li><?php echo anchor_popup('/retentionSchedule/view/', 'Create Record Series', $retentionSchedulePopUp); ?></li>
        </ul>
    </section>
    <section>
        <h3>Search</h3>
        <ul>
            <li><?php echo anchor_popup('/search/recordTypeGlobalSearch', 'Search Record Inventory', $searchPopUpParams); ?></li>
            <li><?php echo anchor_popup('/search/retentionScheduleGlobalSearch', 'Search Record Series ', $searchPopUpParams); ?></li>
            <li><?php echo anchor_popup('/search/searchRecordTypes', 'Browse Record Inventory', $searchPopUpParams); ?></li>
            <li><?php echo anchor_popup('/search/searchRetentionSchedules', 'Browse Record Series', $searchPopUpParams); ?></li>
        </ul>
    </section>
    <section>
        <h3>Database</h3>
        <ul>
            <li><?php echo anchor_popup('/dashboard/listSurveys', 'Survey Editor', $popUpParams); ?></li>
        </ul>
        <ul>
            <li><?php echo anchor_popup('/upkeep/recordCategoryForm', 'Create Functional Category', $mediumPopUpParams); ?></li>
            <li><?php echo anchor_popup('/upkeep/editRecordCategoryForm', 'Edit Functional Category', $mediumPopUpParams); ?></li>
        </ul>
        <ul>
            <li><?php echo anchor_popup('/upkeep/divisionForm', 'Create Divisions', $mediumPopUpParams); ?></li>
            <li><?php echo anchor_popup('/upkeep/editDivisionForm', 'Edit Divisions', $mediumPopUpParams); ?></li>
        </ul>
        <ul>
            <li><?php echo anchor_popup('/upkeep/departmentForm', 'Create Departments', $mediumPopUpParams); ?></li>
            <li><?php echo anchor_popup('/upkeep/editDepartmentForm', 'Edit Departments', $mediumPopUpParams); ?></li>
        </ul>
        <ul>
            <li><?php echo anchor('/du/retentionSchedules', 'Public Search'); ?></li>
            <li><?php echo anchor('/', 'Public Survey'); ?></li>
        </ul>
    </section>

    <section>
        <h3>Administrative</h3>
        <ul>
            <li><?php echo anchor_popup('/upload', 'Upload Files', $searchPopUpParams);?></li>
            <li><?php echo anchor_popup('/import', 'Import Retention Schedules', $searchPopUpParams); ?></li>
        </ul>
        <ul>
            <li><?php echo anchor_popup('/search/searchRecordTypesDeleted', 'Browse Deleted Record Inventory', $searchPopUpParams);?></li>
            <li><?php echo anchor_popup('/search/searchRetentionSchedulesDeleted', 'Browse Deleted Record Series', $searchPopUpParams); ?></li>
        </ul>
        <ul>
            <li><?php echo anchor_popup('/upkeep/solrTruncateForm', 'Delete Public Search Index', $mediumPopUpParams); ?></li>
            <li><?php echo anchor_popup('/retentionSchedule/indexRetentionSchedules', 'Run Database Index', $mediumPopUpParams);?></li>
            <li><?php echo anchor_popup('../solr/solrIndexer.php', 'Refresh Public Search Index', $mediumPopUpParams);?></li>
        </ul>
        <ul>
            <li><?php echo anchor_popup('/search/globalAuditSearch', 'Text Search - Audit', $searchPopUpParams);?></li>
        </ul>
        <?php if($admin == TRUE): ?>
        <ul>
            <li><?php echo anchor_popup('/upkeep/userForm', 'Create User', $popUpParams);?></li>
            <li><?php echo anchor_popup('/upkeep/editUserForm', 'Edit User', $popUpParams); ?></li>
        </ul>
        <?php endif; ?>
        <ul>
            <li><?php echo anchor_popup('/upkeep/editPasswordForm', 'Change Password', $popUpParams); ?></li>
        </ul>
    </section>
</div>
