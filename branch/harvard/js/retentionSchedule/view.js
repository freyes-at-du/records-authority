$(document).ready(function () {
    $('select#divisions').change(function () {
        $.post(basepath + '/survey/getDepartments', {
            divisionID: $(this).val(),
            ajax: 'true'
        }, function (j) {
            var options = '';
            for (var i = 0; i < j.length; i++) {
                options += "<input name='departmentID' type='radio' value=" + j[i].departmentID + " onClick='officeOfPrimaryResponsibilitydepartmentCheck(" + j[i].departmentID + ", 1)' />" + j[i].departmentName + '<br />';
            }
            $('#departments').html(options);
        }, 'json');
    });
});

function officeOfPrimaryResponsibilitydepartmentCheck(departmentID, primaryRep) {
    $.post(basepath + '/retentionSchedule/getAssociatedUnits', {
        departmentID: departmentID,
        primaryRep: primaryRep,
        ajax: 'true'
    }, function (results) {});
}
$(document).ready(function () {
    $('select#associatedUnitDivisions').click(function () {
        $('#loading').show('slow');
        $.post(basepath + '/retentionSchedule/getAssociatedUnits', {
            divisionID: $(this).val(),
            ajax: 'true'
        }, function (results) {
            $('#associatedUnitsResults').html(results);
            $('#loading').hide('slow');
        });
    });
});

function checkAll(divisionID) {
    $('#checkBox').show('slow');
    $.post(basepath + '/retentionSchedule/check_associatedUnits', {
        divisionID: divisionID,
        ajax: 'true'
    }, function (results) {
        $('#associatedUnitsResults').html(results);
        $('#checkBox').hide('slow');
    });
}
function uncheckAll(divisionID, uuid) {
    $('#checkBox').show('slow');
    $.post(basepath + '/retentionSchedule/uncheck_associatedUnits', {
        divisionID: divisionID,
        uuid: uuid,
        ajax: 'true'
    }, function (results) {
        $('#associatedUnitsResults').html(results);
        $('#checkBox').hide('slow');
    });
}
function checkDepartment(departmentID) {
    $('#checkBox').show('slow');
    $.post(basepath + '/retentionSchedule/getAssociatedUnits', {
        departmentID: departmentID,
        ajax: 'true'
    }, function (results) {
        $('#associatedUnitsResults').html(results);
        $('#checkBox').hide('slow');
    });
}
function uncheckDepartment(departmentID) {
    $('#checkBox').show('slow');
    $.post(basepath + '/retentionSchedule/getAssociatedUnits', {
        departmentID: departmentID,
        ajax: 'true'
    }, function (results) {
        $('#associatedUnitsResults').html(results);
        $('#checkBox').hide('slow');
    });
}
