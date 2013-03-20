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
 * 
 **/
?>

<script src="<?php echo base_url('js/departmentWidget.js');?>"></script>
<div id="searchContent">
    <h3 id="title">Search the Records Retention Schedule</h3>
    <div id="searchFullTextForm">
        <div class="searchFormFullText">
            <form id="divDeptSearchRetentionSchedules" method="post" action="<?php echo site_url();?>/du/searchByDepartment">
                <ul>
                    <li>
                        <select id='divisions' name='divisionID' size='1' class='required'> 
                            <option value='' selected='selected'>Select a division</option>
                            <option value=''>--------------------</option>
                            <?php foreach ($divisions as $divisionID => $divisionName): ?>
                            <option value="<?php echo $divisionID; ?>"><?php echo $divisionName; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </li>
                    <li>
                        <select id='departments' name='departmentID' size='1' class='required'>
                            <option value=''>Select a department</option>
                        </select>
                    </li>
                    <li>
                        <input name="searchRetentionSchedules" type="submit" value="Search" class="button"/>
                    </li>
                </ul>
            </form>
        </div>
    </div>
</div>
