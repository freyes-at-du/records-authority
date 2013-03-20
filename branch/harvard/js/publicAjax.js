/**
*
* University of Denver - Penrose Library
* provides ajax functionality to recordsAuthority public search screens
*
*/

// prepare the form when the DOM is ready and set AJAX submit options
$(document).ready(function() {
    
    // Load all the bits that used to be thickbox into a jquery UI modal
    $('body').on('click', 'a.thickbox', function(e) {
             var url = e.target.href;

            // show a spinner or something via css
            var dialog = $('<div style="display:none" class="loading"></div>').appendTo('body');

            // open the dialog
            // load remote content
            dialog.load(
                url, 
                {}, // omit this param object to issue a GET request instead a POST request, otherwise you may provide post parameters within the object
                function (responseText, textStatus, XMLHttpRequest) {
                    // remove the loading class
                    dialog.removeClass('loading');
                    dialog.dialog({
                        width: 600,
                        // add a close listener to prevent adding multiple divs to the document
                        close: function(event, ui) {
                            // remove div with all data and events
                            dialog.remove();
                        },
                        modal: true
                    });
                }
            );
            //prevent the browser to follow the link
            return false;
    });


    $('a.my_schedules_link').on('click', function(e) {
        $.ajax(basepath + '/du/mySchedules').success(displaySearchResults);
        return false;
    });

    $('body').on('change', 'input.my_schedule_input', function(e) {
        if ($(this).is(':checked')) {
            $.post(basepath + '/du/addToMySchedules', { schedule_id: $(this).val() });
        } else {
            $.post(basepath + '/du/removeFromMySchedules', { schedule_id: $(this).val() });
        }

        return false;
    });

	// changes search page title  ex. Search retention schedule to Retention schedule results
	function changePageTitle() {
		document.getElementById('pageTitle').innerHTML = "Retention Schedule Search Results";
	}

	//----------------full-text search form------------------------------//	
	var searchRetentionSchedulesOptions = {
		success: displaySearchResults,
		// post-submit callback 
		resetForm: false,
		// reset the form after successful submit 
		timeout: 4000,
		beforeSend: retentionScheduleSearchBegins,
		// changes submit button text
		complete: retentionScheduleSearchEnds
	};

	var validateFTSearchRetentionSchedules = $("#searchRetentionSchedules").validate({
		rules: {
			//keyword: "required"
		},
		messages: {
			//keyword: "Required"	
		},
		submitHandler: function(searchRetentionSchedules) {
			$(searchRetentionSchedules).ajaxSubmit(searchRetentionSchedulesOptions);
		}
	});

	function retentionScheduleSearchBegins() {
		document.forms['searchRetentionSchedules'].searchRetentionSchedules.value = "Searching...";
	}

	function retentionScheduleSearchEnds() {
		document.forms['searchRetentionSchedules'].searchRetentionSchedules.value = "Search";
	}

	// post-submit callback...injects search results into div
	function displaySearchResults(responseText, statusText) {
		$("#rightContent .superTitle~*").remove();
        $('#rightContent .superTitle').after(responseText); // injects html into div
        $('#suggestion').replaceWith('<a href="#" id="suggest-link">' + $('#suggestion').text() + '</a>');
	}

    $('body').on('click', '#suggest-link', function () {
        $('#keyword').val($(this).text());
        $('#searchRetentionSchedules').submit();
    });


	//Search All Full Text
	var searchAllRetentionSchedulesOptions = {
		success: displaySearchResults,
		// post-submit callback 
		resetForm: false,
		// reset the form after successful submit 
		timeout: 4000,
		beforeSend: retentionScheduleSearchAllBegins,
		// changes submit button text
		complete: retentionScheduleSearchAllEnds
	};

	var validateFTSearchAllRetentionSchedules = $("#searchAllRetentionSchedules").validate({
		rules: {
			//keyword: "required"
		},
		messages: {
			//keyword: "Required"	
		},
		submitHandler: function(searchAllRetentionSchedules) {
			$(searchAllRetentionSchedules).ajaxSubmit(searchAllRetentionSchedulesOptions);
		}
	});

	function retentionScheduleSearchAllBegins() {
		document.forms['searchAllRetentionSchedules'].searchAllRetentionSchedules.value = "Searching...";
	}

	function retentionScheduleSearchAllEnds() {
		document.forms['searchAllRetentionSchedules'].searchAllRetentionSchedules.value = "Full Schedule";
	}

	// post-submit callback...injects search results into div

	//------------------search by div/dept-------------------------------//
	var divDeptsearchRetentionSchedulesOptions = {
		success: displaySearchResults,
		// post-submit callback 
		resetForm: false,
		// reset the form after successful submit 
		timeout: 4000,
		beforeSend: retentionScheduleDivDeptSearchBegins,
	};

	var validateDDSearchRetentionSchedules = $("#divDeptSearchRetentionSchedules").validate({
		rules: {
			departmentID: "required"
		},
		messages: {
			departmentID: "Please select a department."
		},
		submitHandler: function(divDeptSearchRetentionSchedules) {
			$(divDeptSearchRetentionSchedules).ajaxSubmit(divDeptsearchRetentionSchedulesOptions);
		}
	});

	function retentionScheduleDivDeptSearchBegins() {
		document.forms['divDeptSearchRetentionSchedules'].searchRetentionSchedules.value = "Searching...";
	}

	// search response
	// post-submit callback...injects search results into div

	//------------------search by record category -------------------------------//
	var recordCategorySearchRetentionSchedulesOptions = {
		success: displaySearchResults,
		// post-submit callback 
		resetForm: false,
		// reset the form after successful submit 
		timeout: 4000,
		beforeSend: retentionScheduleRecordCategorySearchBegins,
		// changes submit button text
		complete: retentionScheduleRecordCategorySearchEnds
	};

	var validateRCSearchRetentionSchedules = $("#recordCategorySearchRetentionSchedules").validate({
		rules: {
			recordCategory: "required"
		},
		messages: {
			recordCategory: "Please select a record category."
		},
		submitHandler: function(recordCategorySearchRetentionSchedules) {
			$(recordCategorySearchRetentionSchedules).ajaxSubmit(recordCategorySearchRetentionSchedulesOptions);
		}
	});

	function retentionScheduleRecordCategorySearchBegins() {
		document.forms['recordCategorySearchRetentionSchedules'].searchRetentionSchedules.value = "Searching...";
	}

	function retentionScheduleRecordCategorySearchEnds() {
		document.forms['recordCategorySearchRetentionSchedules'].searchRetentionSchedules.value = "Search";
	}

	// search response
	// post-submit callback...injects search results into div

}); // closes document

