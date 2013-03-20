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

<div id="searchContent">
    <h3 id="title">Search the Records Retention Schedule</h3>
    <div id="searchFullTextForm">
        <div class="searchFormFullText">
            <form id="recordCategorySearchRetentionSchedules" method="post" action="<?php echo site_url();?>/du/searchByRecordCategory">
                <ul>
                    <?php $count = 0; ?>
                    <?php foreach ($recordCategories as $recordCategoryID => $recordCategory): ?>
                        <li>
                            <input type="checkbox" id="recordCategory<?php echo $count; ?>" name="recordCategory<?php echo $count; ?>" value="<?php echo $recordCategory; ?>" />
                            <label for="recordCategory<?php echo $count; ?>"><?php echo $recordCategory; ?></label>
                        </li>
                        <?php $count += 1; ?>
                    <?php endforeach; ?>
                    <li><input name="searchRetentionSchedules" type="submit" value="Search" class="button"/></li>
                </ul>
            </form>
        </div>
    </div>
</div>
