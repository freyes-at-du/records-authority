<script src="<?php echo base_url('js/departmentWidget.js'); ?>"></script>
<select id='divisions' name='divisionID' size='1' class='required'> 
    <option value='' selected='selected'>Select your division</option>
    <option value=''>--------------------</option>
    <?php if (count($divisions) > 0): ?>
    <?php foreach ($divisions as $division): ?>
    <option value="<?php echo $division['id']; ?>"><?php echo $division['name']; ?></option>
    <?php endforeach; ?>
    <?php endif; ?>
</select>
<select id='departments' name='departmentID' size='1' class='required'>
    <option value=''>Select your department</option>
</select>
