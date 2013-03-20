$(document).ready(function() {
	$('select#divisions').change(function() {
		$.post(basepath + '/survey/getDepartments', {
			divisionID: $(this).val(),
			ajax: 'true'
		},
		function(j) {
			var options = '';
			for (var i = 0; i < j.length; i++) {
				options += '<option value=' + j[i].departmentID + '>' + j[i].departmentName + '</option>';
			}
			$('select#departments').html(options);
		},
		'json');
	});
});

