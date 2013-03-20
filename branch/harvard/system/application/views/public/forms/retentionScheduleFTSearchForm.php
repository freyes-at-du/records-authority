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

<h3><?php echo $this->lang->line('nav_search_title'); ?></h3>
<div id="searchFullTextForm">
    <div class="searchFormFullText">
        <?php 
            $attributes = array('id' => 'searchRetentionSchedules');
            $keywordData = array(
                'name'		=>	'keyword',
                'id'		=>	'keyword',
                'maxlength'	=>	'50',
                'value'		=>	'',
            );

            if(!empty($error))
            {
                $data['value'] = $keyword;
            }
            echo form_open('/du/fullTextSearch', $attributes);
            echo form_input($keywordData);
            echo form_submit(array( 'name' => 'searchRetentionSchedules', 'class' => 'buttonLink'), 'Search');
            echo form_close();
        ?>
    </div>
</div>
