<?php // $divisionId, $divisionName, $department, $uuid, $aus, $checkedArray ?>
<input name="divisionID" type="checkbox" id="selectAllDepartments" value="<?php echo $divisionID; ?>" onClick="checkAll(<?php echo $divisionID; ?>, ' <?php echo $uuid; ?> ')" />
&nbsp;<strong><?php echo $divisionName; ?></strong>&nbsp;(selects all departments)<br />
                        
<?php foreach ($aus->result() as $result): ?>
    
    <?php if ($department !== "All Departments"): ?> 
        <?php if (in_array($result->departmentID, $checkedArray)): ?>
        <input name="associatedUnits[]" type="checkbox" value="<?php echo $result->departmentID; ?>" onClick="uncheckDepartment(<?php echo $result->departmentID; ?>, ' <?php echo $uuid; ?> ')" class="assocUnits" checked />&nbsp;<?php echo $department; ?><br />
        <?php else: ?>
        <input name="associatedUnits[]" type="checkbox" value="<?php echo $result->departmentID; ?>" onClick="checkDepartment(<?php echo $result->departmentID; ?>)" class="assocUnits" />&nbsp;<?php echo $department; ?><br />
        <?php endif; ?>
    <?php endif; ?>
<?php endforeach; ?>
