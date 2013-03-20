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
	$data['title'] = 'Record Inventory - Records Authority';
	$this->load->view('includes/adminHeader', $data); 
?>

<script src="<?php echo base_url('js/departmentWidget.js');?>"></script>
<script src="<?php echo base_url('js/managementDepartmentWidget.js');?>"></script>

<div id="tabs">
	<div id="setDepartment">Setting Department...</div>
	  	<ul>
        	<li class="ui-tabs-nav-item"><a href="#fragment-1">Record Inventory</a></li>
            <!-- <li class="ui-tabs-nav-item"><a href="#fragment-2">Format and Location</a></li> -->
            <!-- <li class="ui-tabs-nav-item"><a href="#fragment-3"><span>Management</span></a></li> -->
        </ul>
       <div id="fragment-1" class="adminForm">
       <br />
       
       <?php if (!isset($division)) { ?>
       	
       	<form name="department" method="post" action="<?php echo site_url();?>/recordType/view" />
			<!--<label for='divisions'>Divisions:</label><br />-->
			<select id='divisions' name='divisionID' size='1' class='required'>
				<option value=''>Select a Division</option>
				<option value=''>-----------------</option>
				<?php 
					foreach ($divisionData as $id => $divisions) {
						echo "<option value='$id'>$divisions</option>";
					}
				?>
			</select> *
		</form>	
										
		<form id="recordTypeDepartment" method="post" action="<?php echo site_url();?>/recordType/setRecordTypeFormDepartment" />
			<!--<label for='departments'>Departments:</label><br />-->
			<select id='departments' name='departmentID' size='1' class='required'>
				<option value=''>Select a Department</option>
				<option value=''>-----------------</option>
				<?php 
					if (!empty($departmentData)) {
						foreach ($departmentData as $id => $departments) {
							echo "<option value='$id'>$departments</option>";
						}
					}
				?>
			</select> <input name="department" type="submit" value="Set Department" />&nbsp;*
			<br />
		</form>
		
		<?php } else {
				echo "<h1>" . $division['divisionName'] . "</h1>";
				echo "<h2>" . $division['departmentName'] . "</h2>";
		} ?>
		
					
		<form id="recordInformation" method="post" action="<?php echo site_url();?>/recordType/saveRecordType">
					
			<input name="recordInformationDivisionID" type="hidden" value="<?php if (!empty($_POST['divisionID'])) {echo $_POST['divisionID'];} elseif (isset($division)) { echo $division['divisionID']; } ?>" />
					
			<input name="recordTypeDepartment" type="hidden" value="<?php if (isset($division)) {echo $division['departmentID'];} ?>" class="required" /><br />	
<!-- Question 1 -->										
			<label for='recordName'>1.) Record Name:&nbsp;*</label><br />
			<input name='recordName' id='recordName' type='text' value="" class="required" />
			<br /><br />
<!-- Question 2 -->						
			<label for='recordDescription'>2.) Record Description:&nbsp;*</label><br />
			<textarea name="recordDescription" rows="3" cols="50" wrap="hard" class="required" ></textarea>
			<br /><br />
<!-- Question 3 -->						
			<!-- <label for='recordCategory'>3.) Record Category:</label><br />  -->
			3.) 
			<select name='recordCategory' size='1' class='required' >
				<option value=''>Select a Functional Category</option>
				<option value=''>-----------------</option>
				<?php 
					foreach ($recordCategories as $recordCategory) {
						echo "<option value='$recordCategory'>$recordCategory</option>";
					}
				?>
			</select>
			&nbsp;*&nbsp;
			<!-- refresh icon from http://jimmac.musichall.cz/icons.php -->
			<?php /*
				$imagePath = base_url() . "/images";
				$addCategoryRecord = "<img src='$imagePath/ffd40f_11x11_icon_plus.gif' alt='Add Record Category' border=0 />";   
				echo anchor_popup('upkeep/recordCategoryForm', $addCategoryRecord, $smallPopUp) . "&nbsp;&nbsp;&nbsp;<a href='javascript:history.go(0)'><img src='$imagePath/refresh.png' alt='Refresh' border=0 /></a><br />";
			*/?>
			
			<!-- 
			<textarea name="recordCategory" rows="3" cols="50" wrap="hard" class="required"></textarea>
			 -->
			 
			<br /><br />
<!-- Question 4 -->
			<label for='Office of Primary Responsibility'>4.) What department is the Office of Primary Responsibility for these records?</label>
			<br />
			<select id='managementDivisions' name='managementDivisionID' size='1' class='required' 10>
					<option value=''>Select a Division</option>
					<option value=''>-----------------</option>
					<?php 
						foreach ($divisionData as $id => $divisions) {
							echo "<option value='$id'>$divisions</option>";
						}
					?>
				</select> *
				&nbsp;&nbsp;
				<select id='managementDepartments' name='managementDepartmentID' size='1' class='required'>
					<option value=''>departments</option>
				</select> * 
				<br /><br />
				<?php /*
			<p>
				<label for='divisions'></label>
				<select id='divisions' name='primaryResponsibilityDivision' size='1' class='required'>
				<option value='' selected='selected'>Select a Division</option>
				<option value=''>-----------------</option>
				<?php 
					foreach ($divisionData as $divisionID => $divisionName) {
						echo "<option value='$divisionID'>$divisionName</option>";
					}
				?>
				</select>&nbsp;&nbsp;*
				&nbsp;&nbsp;&nbsp;&nbsp;
				<div id="departments">
				<select id='departments' name='primaryResponsibilityDepartment' size='1' class='required'>
				<option value='' selected='selected'>Select a Division</option>
				<option value=''>-----------------</option>
				<?php 
					foreach ($divisionData as $divisionID => $divisionName) {
						echo "<option value='$divisionID'>$divisionName</option>";
					}
				?>
				</select>
				</div>
			</p>
			<br /><br />*/?>
<!-- Question 5 -->									
			<label for='recordNotes'>5.) Records Notes</label><br />
			Notes: (Department Answer)<br />
			<textarea name="recordNotesDeptAnswer" rows="3" cols="50" wrap="hard" ></textarea>
			<br /><br />
			Notes: (Records Management)<br />
			<textarea name="recordNotesRmNotes" rows="3" cols="50" wrap="hard" ></textarea>
			<br /><br /><br />	
<!-- Question 6 -->			
			<label for='recordFormat'>6.) What is the format of the official record?</label><br />
			<input name="recordFormat" type="radio" value="Paper" />&nbsp;&nbsp;Paper<br />
			<input name="recordFormat" type="radio" value="Banner"  />&nbsp;&nbsp;Banner Database Record<br />
			<input name="recordFormat" type="radio" value="Electronic Document" 3 />&nbsp;&nbsp;Electronic Document<br />
			<input name="recordFormat" type="radio" value="Email" />&nbsp;&nbsp;Email<br />
			<input name="recordFormat" type="radio" value="Other Physical" id="toggleOtherPhysical" />&nbsp;&nbsp;Other Physical: (enter other type)<br />
			
			<div id="otherPhysicalText">
				<input name="otherPhysicalText" type="text"/>
			</div>
			
			<input name="recordFormat" type="radio" value="Other Electronic" id="toggleOtherElectronic"  />&nbsp;&nbsp;Other Electronic: (enter other type)<br />
			
			<div id="otherElectronicText">
				<input name="otherElectronicText" type="text"/>
			</div>
			
			<br /><br />
<!-- Question 7 -->			
			<label for='recordStorage'>7.) Where is the record stored?</label><br />
			<input name="recordStorage" type="radio" value="Physical storage in department" />&nbsp;&nbsp;Physical Storage in department<br />
			<input name="recordStorage" type="radio" value="Physical storage in other building" id="toggleOtherDUBuilding" />&nbsp;&nbsp;Physical Storage in other building (enter other type)<br />
			
			<div id="otherDUBuildingText">
				<input name="otherDUBuildingText" type="text"/>
			</div>			
		
			<input name="recordStorage" type="radio" value="Physical offsite storage" id="toggleOffsiteStorage"  />&nbsp;&nbsp;Physical offsite storage (enter other type)<br />
				
			<div id="otherOffsiteStorageText">
				<input name="otherOffsiteStorageText" type="text"/>
			</div>					
			
			<input name="recordStorage" type="radio" value="Banner" />&nbsp;&nbsp;Banner<br />
			<input name="recordStorage" type="radio" value="Peak Digital"  />&nbsp;&nbsp;Peak Digital<br />
			<input name="recordStorage" type="radio" value="Networked Computer/Server" />&nbsp;&nbsp;Networked Computer/Server<br />
			<input name="recordStorage" type="radio" value="Local HD"  />&nbsp;&nbsp;Local HD<br />
			
			<input name="recordStorage" type="radio" value="Other electronic system" id="toggleOtherElectronicSystem" />&nbsp;&nbsp;Other electronic system (enter other type)<br />
				
			<div id="otherElectronicSystemText">
				<input name="otherElectronicSystemText" type="text"/>
			</div>	
					
			<br /><br />
<!-- Question 8 -->						
			<label for='formatAndLocationNotes'>8.) Format and Location Notes</label><br />
			Notes: (Department Answer)<br />
			<textarea name="formatAndLocationDeptAnswer" id="formatAndLocationNotes" rows="3" cols="50" wrap="hard" ></textarea>
			<br /><br />
			Notes: (Records Management)<br />
			<textarea name="formatAndLocationRmNotes" id="formatAndLocationNotes" rows="3" cols="50" wrap="hard" ></textarea>
			<br /><br />
<!-- Question 9 -->
			<label for='recordRetention'>9.) How long are the records currently retained?</label><br />
			<textarea name="recordRetentionAnswer" id="recordRetention" rows="3" cols="50" wrap="hard" ></textarea>
			<br /><br />
<!-- Question 10 -->
			<label for='usageNotes'>10.) Usage Notes</label><br />
			<textarea name="usageNotesAnswer" id="usageNotes" rows="3" cols="50" wrap="hard"></textarea>
			<br /><br />
<!-- Question 11 -->
			<label for='retentionAuthorities'>11.) Retention Authorities</label><br />
			<textarea name="retentionAuthoritiesAnswer" id="retentionAuthorities" rows="3" cols="50" wrap="hard"></textarea>
			<br /><br />
<!-- Question 12 -->
			<label for='vitalRecord'>12.) Is this a vital record?</label><br />
			<input name="vitalRecord" type="radio" value="Yes" />&nbsp;&nbsp;Yes<br />
			<input name="vitalRecord" type="radio" value="No" />&nbsp;&nbsp;No<br />
			<br /><br />
<!-- Question 13 -->
			<label for='vitalRecordNotes'>13.) Vital Record Notes</label><br />
			<textarea name="vitalRecordNotesAnswer" id="vitalRecordNotes" rows="3" cols="50" wrap="hard"></textarea>
			<br /><br />
<!-- Question 14 -->
			<label for='recordRegulations'>14.)  Do the records contain information that may be subject to any of the following regulations:</label><br />
			<input name="recordRegulations[]" type="checkbox" value="FERPA" />&nbsp;&nbsp;FERPA<br />
			<input name="recordRegulations[]" type="checkbox" value="HIPAA" />&nbsp;&nbsp;HIPAA<br />
			<input name="recordRegulations[]" type="checkbox" value="PCI DSS" />&nbsp;&nbsp;PCI DSS<br />
			<input name="recordRegulations[]" type="checkbox" value="GLBA" />&nbsp;&nbsp;GLBA<br />
			<input name="recordRegulations[]" type="checkbox" value="FCRA/FACTA" />&nbsp;&nbsp;FCRA/FACTA<br />
			<br />
<!-- Question 15 -->
			<label for='personallyIdentifiableInformation'>15.) Personally Identifiable Information (PII) Notes</label><br />
			Notes: (Department Answer)<br />
			<textarea name="personallyIdentifiableInformationAnswer" id="personallyIdentifiableInformation" rows="3" cols="50" wrap="hard" ></textarea>
			<br /><br />
			Notes: (Records Management)<br />
			<textarea name="personallyIdentifiableInformationRmNotes" id="personallyIdentifiableInformation" rows="3" cols="50" wrap="hard" ></textarea>
			<br /><br />			
<!-- Question 16 -->
			<label for='otherDepartmentCopies'>16.) Which other departments might hold copies of these records?</label><br />
			<textarea name="otherDepartmentCopiesAnswer" id="otherDepartmentCopies" rows="3" cols="50" wrap="hard"></textarea>
			<br /><br />
<!-- Save Form -->			
			<br /><br /><br />
			<input name="recordInformation" type="submit" value="Save" />
			
		</form>
		<br /><br />
	</div>
<?php $this->load->view('includes/adminFooter'); ?>
