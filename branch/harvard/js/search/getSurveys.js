function sortBy(departmentID, divisionID, sortBy, field) {
	$('#sorting').show();
	$.post(basepath + '/search/getSurveys', {
		departmentID: departmentID,
		divisionID: divisionID,
		sortBy: sortBy,
		field: field,
		ajax: 'true'
	},
	function(results) {
		$('#surveySearchResults').html(results);
		$('#sorting').hide();
	}); // post
} // js

