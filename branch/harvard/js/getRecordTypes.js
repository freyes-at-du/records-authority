function sortBy(departmentID, divisionID, sortBy, field) {
	$('#sorting').show();
	$.post(basepath + '/search/getRecordTypes', {
		departmentID: departmentID,
		divisionID: divisionID,
		sortBy: sortBy,
		field: field,
		ajax: 'true'
	},
	function(results) {
		$('#recordTypeSearchResults').html(results);
		$('#sorting').hide();
	}); // post
} // js
