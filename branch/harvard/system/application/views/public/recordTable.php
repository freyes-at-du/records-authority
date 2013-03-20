<?php
//TODO: Move this to a controller.  A bunch are using this view, so I don't 
//feel like finding them all right now.
if ($this->ion_auth->logged_in()) { 
    $this->load->model('SearchModel');
    $schedule_ids = $this->SearchModel->getUsersScheduleIds();
}
?>
<h3><?php echo $this->lang->line('page_title_search_results'); ?></h3>
<?php if ($records == false || count($records) === 0): ?>
    <div id="recordCount">No Results Found</div>
    <?php if (!empty($suggestion)): ?>
        <?php $this->load->view('public/search_suggestion', array('suggestion' => $suggestion)); ?>
    <?php endif; ?>
<?php else: ?>
    <div id="recordCount">
        <?php if (isset($keyword)): ?>
            <?php echo str_replace(array('$count', '$keyword'), array(count($records), $keyword) , $this->lang->line('search_result_count_with_keyword')); ?>
        <?php else: ?>
            <?php echo str_replace('$count', count($records) , $this->lang->line('search_result_count')); ?>
        <?php endif; ?>
    </div>
    <?php if (!empty($suggestion)): ?>
        <?php $this->load->view('public/search_suggestion', array('suggestion' => $suggestion)); ?>
    <?php endif; ?>
    <?php if (!empty($records)): ?>
    <table id="searchResultsTable" width="100%">
        <thead>
        <tr>
            <th>Record Code</th>
            <th>Category</th>
            <th>Title</th>
            <th>Description</th>
            <th>Retention Plan</th>
            <th>See also </th>
            <th>Additional Information</th>
            <?php if ($this->ion_auth->logged_in()): ?>
            <th>My Schedule</th>
            <?php endif; ?>
        </tr>
        </thead>
        <tbody>
        <?php foreach($records as $record): ?> 
        <tr>
            <td><?php echo trim(strip_tags($record['code'])); ?></td>
            <td><?php echo trim(strip_tags($record['category'])); ?></td>
            <td>
                <a href="<?php echo site_url('/du/getRetentionSchedule/' . $record['retention_schedule_id'] . '?height=435&width=450'); ?>" class="thickbox" title="Click to view details"><?php echo $record['name']; ?></a>
            </td>
            <td><?php echo $record['description']; ?></td>
            <td><?php echo $record['search_terms']; ?></td>
            <td><?php echo $record['retention_period']; ?></td>
            <td><?php echo trim(strip_tags($record['disposition'])); ?></td>
            <?php if ($this->ion_auth->logged_in()): ?>
            <td><input type="checkbox" class="my_schedule_input" value="<?php echo $record['retention_schedule_id']; ?>" <?php if (in_array($record['retention_schedule_id'], $schedule_ids)) { ?>checked="checked"<?php } ?> name="my_schedules[]" /></td>
            <?php endif; ?>
        </tr>	
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif; ?>
<?php endif; ?>
<script src="<?php echo base_url('/js/recordTable.js'); ?>"></script>
