<?php
/**
 * Copyright 2011 University of Denver--Penrose Library--University Records Management Program
 * Author fernando.reyes@du.edu
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
	$data['title'] = 'List Surveys - Records Authority';
	$this->load->view('includes/adminHeader', $data); 
?>
<script type='text/javascript'>
    function areYouSure(surveyID) { 
        if (confirm('Are you sure you want to DELETE this Question?')) {
            $.post(basepath + '/dashboard/deleteSurvey/', {surveyID: surveyID, ajax: 'true'}, function(results){ 
                $('#' + surveyID).html(results); 
            });
        }
    }
</script>

  <div id="tabs">
	<ul>
		<li class="ui-tabs-nav-item"><a href="#fragment-1">Surveys</a><li>
        </ul>

  <div id="fragment-1">
  <div class="adminForm">
    <?php if (empty($surveys)): ?> 
        <p>No surveys found.</p>
    <?php else: ?> 
        <?php foreach ($surveys as $survey): ?>
        <li id="<?php echo $survey->surveyID; ?>">
            <a href="#" onClick="return areYouSure(<?php echo $survey->surveyID; ?>);">[Delete]</a>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <?php echo anchor("dashboard/addSurveyQuestions/$survey->surveyID", trim(strip_tags($survey->surveyName))); ?>
        </li>
        <br />
        <?php endforeach; ?>
    <?php endif; ?>
  </div>
  </div>
  </div>
<?php $this->load->view('includes/adminFooter'); ?>
