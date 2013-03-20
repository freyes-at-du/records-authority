			$surveyFormHtml = "";
	 		foreach ($surveyResponses as $i => $surveyData) {
	 		if ($i == "departmentContact") {
	 			$division = $surveyData['division'];
	 			$department = $surveyData['department'];
	 			
	 			$surveyFormHtml .= "<h1 style='font-size:20px;'>" . trim(strip_tags($division)) . "<h1>";
	 			$surveyFormHtml .= "<h2 style='font-size:15px;'>" . trim(strip_tags($department)) . "</h2>";
	 			$surveyFormHtml .= "<br />";
	 			$surveyFormHtml .= "<div class='ui-accordion-sections'>";
	 			$surveyFormHtml .= "<strong>Department Contact</strong>";
	 			$surveyFormHtml .= "<br />";
	 			
	 			foreach ($surveyData as $j => $contact) {
		 			if (!is_array($contact)) {
		 				if ($j == "firstName") {
					 		$surveyFormHtml .= "<strong>First Name:</strong> ";
					 	}
					 	if ($j == "lastName") {
			 				$surveyFormHtml .= "<strong>Last Name:</strong> ";
			 			}
			 			if ($j == "jobTitle") {
			 				$surveyFormHtml .= "<strong>Job Title:</strong> ";
			 			}
			 			if ($j == "phoneNumber") {
			 				$surveyFormHtml .= "<strong>Phone Number:</strong> ";
			 			}
			 			if ($j == "emailAddress") {
			 				$surveyFormHtml .= "<strong>Email:</strong> ";
			 			}
			 			if ($j !== "contactID" && $j !== "division" && $j !== "department") {
			 				$surveyFormHtml .= trim(strip_tags($contact)) . "<br /><br />";	
			 			}
			 			if ($j == "contactID") {
			 				$contact = trim(strip_tags($contact));
			 				$surveyFormHtml .= "<input name='contactID' type='hidden' value='$contact' />";
			 			}	
		 			}
		 		
		 		}
	 		}
				 			 			 		
			if ($i == "surveyContacts") {
				
				$surveyFormHtml .= "<div class='ui-accordion-sections'>";
				$surveyFormHtml .= "<strong>Survey Contacts</strong>";
				
				$surveyFormHtml .= "<br />";
				
				$surveyContacts = array();
				$arraySize = count($surveyData);
				$contactNoteTrigger = $arraySize - 1; // used to make sure the notes field only gets rendered at the end of the loop cycle
				$f = 0;
				while ($f < $arraySize) {
					$value = $surveyData[$f];
					if ($value == 'First Name') {
						$surveyFormHtml .= "<strong>" . trim(strip_tags($value)) . ":</strong> ";
					}
					if ($value == 'Last Name') {
						$surveyFormHtml .= "<strong>" . trim(strip_tags($value)) . ":</strong> ";
					}
					if ($value == 'Phone') {
						$surveyFormHtml .= "<strong>" . trim(strip_tags($value)) . ":</strong>";
					}
					if ($value == 'Email') {
						$surveyFormHtml .= "<strong>" . trim(strip_tags($value)) . ":</strong>";
					}
					if ($value == 'Notes') {
						$surveyFormHtml .= "<strong>test" . trim(strip_tags($value)) . ":</strong>";
					}
					if ($value !== 'First Name' && $value!== 'Last Name' && $value !== 'Phone' && $value !== 'Email' && $value !== 'Notes') {
						if (is_array($value)) {
							$surveyFormHtml .= ""; // don't display Array
						} else {
							$surveyFormHtml .= trim(strip_tags($value)) . "<br /><br />"; 
						}
					}
					if ($f == $contactNoteTrigger) {  
						if (is_array($value)) {
							$surveyFormHtml .= "<strong>Contact Notes:</strong><br />";
							foreach ($value as $e => $contactNotes) {
								if ($e == "contactNotesID") {
									$surveyFormHtml .= "<input name='contactNotesID' type='hidden' value='$contactNotes' />";
								}
								if ($e == "contactNotes") {
									$contactNotes = trim(strip_tags($contactNotes));
									$surveyFormHtml .= "<textarea name='contactNotes' rows='3' cols='50' wrap='hard'>$contactNotes</textarea><br />";				
								}
							}
						} else {
							$surveyFormHtml .= "<strong>Contact Notes:</strong><br />";
							$surveyFormHtml .= "<textarea name='contactNotes' rows='3' cols='50' wrap='hard'></textarea><br />";	
						} 
					}
				++$f;
				}	
				$surveyFormHtml .= "</div>";			
			}

			$qCount = 1; // sets question count
	 		if ($i == "responses") {
	 			$surveyFormHtml .= "<div class='ui-accordion-sections'>";
	 			$surveyFormHtml .= "<strong>Survey Responses</strong>";
	 			//$surveyFormHtml .= "</div>";
	 			 				 			
	 			foreach ($surveyData as $count => $responseData) {
	 			
	 				if (is_array($responseData)) {
	 						 						 					
	 					foreach ($responseData as $k => $responses) {	
							
	 						if ($k !== "questionFieldType" && !is_array($responses)) {
								
	 							if ($k == "questionID") {
	 								$questionID = $responseData['questionID'];
	 								$surveyFormHtml .= "<input name='questionID[]' type='hidden' value='$questionID' /><br />";
	 							}
	 						
	 							// extract file extension from filename
								$fileExtension = str_replace(".", "", strrchr($responses, "."));
		
								// TODO: allowed file types..refactor to pull from database
								$fileTypes = array('pdf', 'docx', 'doc', 'txt', 'gif', 'jpg', 'jpeg', 'vsd', 'xls', 'xlsx', 'ppt', 'pptx');
																																													
								if ($k == "question") {
									$surveyFormHtml .= "<hr /><br />"; 
									$surveyFormHtml .= "<strong>$qCount .) Question:</strong><br />";
	 								$qCount++; // increments question count by 1
									$surveyFormHtml .= trim(strip_tags($responses)) . "<br /><br />";		 	
	 							}
	 							if ($k == "subQuestion" && !empty($responseData['response'])) { 
	 								$surveyFormHtml .= "<strong>Sub Question:</strong><br />";
	 								$surveyFormHtml .= trim(strip_tags($responses)) . "<br /><br />";		
	 							}
	 							if ($k == "subChoiceQuestion" && !empty($responseData['response'])) { 
	 								$surveyFormHtml .= "<strong>Sub Choice Question:</strong><br />";
	 								$surveyFormHtml .= trim(strip_tags($responses)) . "<br /><br />";		
	 							}	 								 							
	 							if ($k == "response" && !empty($responseData['response'])) { 
	 								 								
	 								$surveyFormHtml .= "<strong>Response:</strong><br />";
	 								// check if filename extension is in extension list TODO: refactor / don't need to check for file extentiosn
									if (in_array($fileExtension, $fileTypes, TRUE)) {
										$siteURL = base_url();
										$responses = trim(strip_tags($responses));
										$controller = "index.php/dashboard/forceDownload/$responses";
										$url = $siteURL . $controller;
										$surveyFormHtml .= "<a href='$url' target='_blank'>$responses</a><br /><br />"; // triggers download	
									} elseif ($responseData['response'] == "null") {
										$surveyFormHtml .= "-<br /><br />";
									} else {
										$surveyFormHtml .= trim(strip_tags($responses)) . "<br /><br />";	
									}
	 							} 
	 								 							
	 							// survey notes
	 							if ($k == "surveyNotesID" && $responses !== "") {
	 								$responses = trim(strip_tags($responses));
	 								$surveyFormHtml .= "<input name='surveyNotesID[]' type='hidden' value='$responses' /><br />";
	 							}
		 						if ($k == "deptSurveyNotes") {
		 							$responses = trim(strip_tags($responses));
		 							$surveyFormHtml .= "(Department Answer)<br />";
			 						$surveyFormHtml .= "<textarea name='deptSurveyNotes[]' rows='3' cols='50' wrap='hard'>$responses</textarea><br /><br />";
		 						}
		 						if ($k == "rmSurveyNotes") {
		 							$responses = trim(strip_tags($responses));
		 							$surveyFormHtml .= "(Records Management)<br />";
		 							$surveyFormHtml .= "<textarea name='rmSurveyNotes[]' rows='3' cols='50' wrap='hard'>$responses</textarea><br /><br />";
		 						}				
							}			
	 					}
	 				}
	 			}
	 			$surveyFormHtml .= "</div>";
	 		} 	
	 		$surveyFormHtml .= "</div>";
	 		$surveyFormHtml .= "<br /><br />"; 	

	 		
	 		}
	 } elseif (!empty($surveyResponses)) {
	 	$surveyFormHtml .= $surveyResponses; // returns no responses message ?
	 } 	
		
	// display save/update buttons
	 if (!empty($surveyResponses) && is_array($surveyResponses)) {  
		if (isset($responseData['update']) && $responseData['update'] == TRUE) { 
			$surveyFormHtml .= "<input name='submit' type='submit' value='Update Notes' onClick='return confirm(\"Are you sure you want to update this record?\")' /><br /><br />";
	 	} else { 
			$surveyFormHtml .= "<input name='submit' type='submit' value='Save Notes'  /><br /><br />";
		} 
	 } 	
	return $surveyFormHtml;		
