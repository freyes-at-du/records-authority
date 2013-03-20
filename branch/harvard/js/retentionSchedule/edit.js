$(document).ready(function() {
	$('select#associatedUnitDivisions').click(function() {
		$('#loading').show('slow');
		$.post(basepath + '/retentionSchedule/getAssociatedUnits', {
			divisionID: $(this).val(),
			retentionScheduleID: 1,
			ajax: 'true'
		},
		function(results) {
			$('#associatedUnitsResults').html(results);
			$('#loading').hide('slow');
		});
	});
});
function checkDepartment(departmentID, retentionScheduleID) {
	$('#checkBox').show('slow');
	$.post(basepath + '/retentionSchedule/getAssociatedUnits', {
		departmentID: departmentID,
		retentionScheduleID: retentionScheduleID,
		ajax: 'true'
	},
	function(results) {
		$('#associatedUnitsResults').html(results);
		$('#checkBox').hide('slow');
	});
}
function uncheckDepartment(departmentID, associatedUnitsID) {
	$('#checkBox').show('slow');
	$.post(basepath + '/retentionSchedule/getAssociatedUnits', {
		departmentID: departmentID,
		associatedUnitsID: associatedUnitsID,
		retentionScheduleID: 1,
		ajax: 'true'
	},
	function(results) {
		$('#associatedUnitsResults').html(results);
		$('#checkBox').hide('slow');
	});
}
function checkOpr(departmentID) {
	$.post(basepath + '/retentionSchedule/updateOfficeOfPrimaryResponsibility', {
		retentionScheduleID: 1,
		departmentID: departmentID,
		ajax: 'true'
	},
	function(results) {});
}
function editCheckAll(divisionID) {
	$('#checkBox').show('slow');
	$.post(basepath + '/retentionSchedule/editCheckAllAssociatedUnits', {
		divisionID: divisionID,
		retentionScheduleID: 1,
		ajax: 'true'
	},
	function(results) {
		$('#associatedUnitsResults').html(results);
		$('#checkBox').hide('slow');
	});
}
function editUncheckAll(divisionID) {
	$('#checkBox').show('slow');
	$.post(basepath + '/retentionSchedule/editUnCheckAllAssociatedUnits', {
		divisionID: divisionID,
		retentionScheduleID: 1,
		ajax: 'true'
	},
	function(results) {
		$('#associatedUnitsResults').html(results);
		$('#checkBox').hide('slow');
	});
}
$(document).ready(function() {
	$('select#divisions').change(function() {
		$.post(basepath + '/survey/getDepartments', {
			divisionID: $(this).val(),
			ajax: 'true'
		},
		function(j) {
			var options = '';
			for (var i = 0; i < j.length; i++) {
				options += "<input name='departmentID' type='radio' value=" + j[i].departmentID + " onClick='officeOfPrimaryResponsibilitydepartmentCheck(" + j[i].departmentID + ", 1)' />" + j[i].departmentName + '<br />';
			}
			$('#departments').html(options);
		},
		'json');
	});
});
function officeOfPrimaryResponsibilitydepartmentCheck(departmentID, primaryRep) {
	$.post(basepath + '/retentionSchedule/getAssociatedUnits', {
		departmentID: departmentID,
		primaryRep: primaryRep,
		ajax: 'true'
	},
	function(results) {});
}
