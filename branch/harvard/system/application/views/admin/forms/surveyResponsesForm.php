<?php
if (!empty($surveyResponses) && is_array($surveyResponses)): 
        
    $siteUrl = site_url();
    $actionUrl = $siteUrl . '/dashboard/surveyNotesForm';

    $surveyFormHtml = "";
    foreach ($surveyResponses as $i => $surveyData):
        if ($i == "departmentContact"):
            $division = $surveyData['division'];
            $department = $surveyData['department']; ?>
            
            <h1 style="font-size:20px;"><?php echo trim(strip_tags($division)); ?><h1>
            <h2 style="font-size:15px;"><?php echo trim(strip_tags($department)); ?></h2>
            <br />
            <div class="ui-accordion-sections">
            <strong>Department Contact</strong>
            <br />
            
            <?php foreach ($surveyData as $j => $contact): ?>
                <?php if (!is_array($contact)): ?>
                    <?php switch($j):
                        case "firstName": ?>
                        <strong>First Name:</strong> 
                        <?php
                        break;
                        case "lastName":
                        ?>
                        <strong>Last Name:</strong> 
                        <?php
                        break;
                        case "jobTitle":
                        ?>
                        <strong>Job Title:</strong> 
                        <?php
                        break;
                        case "phoneNumber":
                        ?>
                        <strong>Phone Number:</strong> 
                        <?php
                        break;
                        case "emailAddress":
                        ?>
                        <strong>Email:</strong> 
                        <?php
                        break;
                        case "contactID":
                        ?>
                        <input name="contactID" type="hidden" value="<?php echo trim(strip_tags($contact)); ?>" />
                    <?php endswitch; ?>	
                    <?php if ($j !== "contactID" && $j !== "division" && $j !== "department"): ?>
                        <?php echo trim(strip_tags($contact)); ?><br /><br />
                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
                                        
    <?php if ($i == "surveyContacts"): ?>
        <div class="ui-accordion-sections">
        <strong>Survey Contacts</strong>
        <br />
        <?php
        $surveyContacts = array();
        $arraySize = count($surveyData);
        $contactNoteTrigger = $arraySize - 1; // used to make sure the notes field only gets rendered at the end of the loop cycle
        $f = 0;
        ?>
        <?php while ($f < $arraySize): ?>
            <?php switch($surveyData[$f]):
                case 'First Name': ?>
            <?php case 'Last Name': ?>
            <?php case 'Phone': ?>
            <?php case 'Email': ?>
            <?php case 'First Name': ?>
            <?php case 'Notes': ?>
                <strong><?php echo trim(strip_tags($surveyData[$f])); ?>:</strong> 
            <?php 
                break;
                default: 
                    if (!is_array($surveyData[$f])): ?>
                    <?php echo trim(strip_tags($surveyData[$f])); ?><br /><br />
                <?php endif; ?>
            <?php endswitch; ?>

            <?php if ($f == $contactNoteTrigger): ?>  
                <?php if (is_array($surveyData[$f])): ?>
                    <strong>Contact Notes:</strong><br />
                    <?php foreach ($surveyData[$f] as $e => $contactNotes): ?>
                        <?php if ($e == "contactNotesID"): ?>
                            <input name="contactNotesID" type="hidden" value="$contactNotes" />
                        <?php elseif ($e == "contactNotes"): ?>
                            <textarea name="contactNotes" rows="3" cols="50" wrap="hard"><?php echo trim(strip_tags($contactNotes)); ?></textarea><br />
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <strong>Contact Notes:</strong><br />
                    <textarea name="contactNotes" rows="3" cols="50" wrap="hard"></textarea><br />	
                <?php endif; ?> 
            <?php endif; ?>

        <?php ++$f; ?>
        <?php endwhile; ?>
        </div>			
    <?php endif; ?>

    <?php $qCount = 1; /* sets question count */ ?>
    <?php if ($i == "responses"): ?>
        <div class="ui-accordion-sections">
        <strong>Survey Responses</strong>
        <?php foreach ($surveyData as $count => $responseData): ?>
            <?php if (is_array($responseData)): ?>
                <?php foreach ($responseData as $k => $responses): ?>
                    <?php if ($k !== "questionFieldType" && !is_array($responses)): ?>
                        <?php  
                        // extract file extension from filename
                        $fileExtension = str_replace(".", "", strrchr($responses, "."));

                        // TODO: allowed file types..refactor to pull from database
                        $fileTypes = array('pdf', 'docx', 'doc', 'txt', 'gif', 'jpg', 'jpeg', 'vsd', 'xls', 'xlsx', 'ppt', 'pptx');
                        ?>
                                                                                                                                                                            
                        <?php switch($k):
                            case 'questionID': ?>
                            <input name="questionID[]" type="hidden" value="<?php echo $responseData['questionID']; ?>" /><br />
                            <?php break; ?>
                        <?php case 'question': ?>
                            <hr /><br /> 
                            <strong><?php echo $qCount; ?> .) Question:</strong><br />
                            <?php echo trim(strip_tags($responses)); ?><br /><br />
                            <?php $qCount++; ?>
                            <?php break; ?>
                        <?php case 'subQuestion': ?>
                            <?php if (!empty($responseData['response'])): ?>
                                <strong>Sub Question:</strong><br /><?php echo trim(strip_tags($responses)); ?><br /><br />
                            <?php endif; ?>
                            <?php break; ?>
                        <?php case 'subChoiceQuestion': ?>
                            <?php if (!empty($responseData['response'])): ?>
                                <strong>Sub Choice Question:</strong><br /><?php echo trim(strip_tags($responses)); ?><br /><br />
                            <?php endif; ?>
                            <?php break; ?>
                        <?php case 'response': ?>
                            <?php if (!empty($responseData['response'])): ?>
                                <strong>Response:</strong><br />
                                <?php if (in_array($fileExtension, $fileTypes, TRUE)): ?>
                                    <a href="<?php echo base_url() . 'index.php/dashboard/forceDownload/' . trim(strip_tags($responses)); ?>" target="_blank"><?php echo trim(strip_tags($responses)); ?></a><br /><br />
                                <?php elseif ($responseData['response'] == "null"): ?>
                                    -<br /><br />
                                <?php else: ?>
                                    <?php echo trim(strip_tags($responses)); ?><br /><br />
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php break; ?>
                        <?php case 'surveyNotesID': ?>
                            <?php if ($responses !== ""): ?>
                            <input name="surveyNotesID[]" type="hidden" value="<?php echo trim(strip_tags($responses)); ?>" /><br />
                            <?php endif; ?>
                            <?php break; ?>
                        <?php case 'deptSurveyNotes': ?>
                            (Department Answer)<br />
                            <textarea name="deptSurveyNotes[]" rows="3" cols="50" wrap="hard"><?php echo trim(strip_tags($responses)); ?></textarea><br /><br />
                            <?php break; ?>
                        <?php case 'rmSurveyNotes': ?>
                            (Records Management)<br />
                            <textarea name="rmSurveyNotes[]" rows="3" cols="50" wrap="hard"><?php echo trim(strip_tags($responses)); ?></textarea><br /><br />
                            <?php break; ?>
                    <?php endswitch; ?>
                    <?php endif; ?>			
                <?php endforeach; ?>
            <?php endif; ?>
        <?php endforeach; ?>
        </div>
    <?php endif; ?> 	
    </div>
    <br /><br /> 	
    <?php endforeach; ?>
<?php elseif (!empty($surveyResponses)): ?>
<?php echo $surveyResponses; /* returns no responses message // What is this? */ ?>
<?php endif; ?>

<?php if (!empty($surveyResponses) && is_array($surveyResponses)): ?>
    <?php if (isset($responseData['update']) && $responseData['update'] == TRUE): ?>
        <input name="submit" type="submit" value="Update Notes" onClick="return confirm('Are you sure you want to update this record?')" /><br /><br />
    <?php else: ?>
        <input name="submit" type="submit" value="Save Notes"  /><br /><br />
    <?php endif ?>
<?php endif; ?> 	
