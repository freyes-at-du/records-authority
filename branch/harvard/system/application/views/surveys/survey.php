<?php 
$datestring = "%Y-%m-%d %H:%i:%s";
$time = time();
$submitDate = mdate($datestring, $time);
?>
<h1><?php echo $surveyName; ?></h1>
<p><?php echo $surveyDescription; ?></p>
<form id="surveyForm" name="survey" method="post" action="<?php echo site_url('/survey'); ?>" enctype="multipart/form-data">
    <p>* indicates a required field.</p>
    <hr />
    <p>Please fill out your contact information:</p>
    <input name="surveyID" type="hidden" value="<?php echo $surveyID; ?>" />

    <ul>
        <li>
            <label for="firstName" class="required">First Name</label>
            <input id="firstName" name="firstName" type="text" class="required" />
        </li>
        <li>
            <label for="lastName" class="required">Last Name</label>
            <input id="lastName" name="lastName" type="text" class="required" />
        </li>
        <li>
            <label for="jobTitle" class="required">Job Title</label>
            <input id="jobTitle" name="jobTitle" type="text" class="required" />
        </li>
        <li>
            <label for="phoneNumber" class="required">Phone Number</label>
            <input id="phoneNumber" name="phoneNumber" type="text" class="required phone" />(xxx-xxx-xxxx)
        </li>
        <li>
            <label for="emailAddress" class="required">Email Address</label>
            <input id="emailAddress" name="emailAddress" type="text" class="required email" />
            <input name="submitDate" type="hidden" value="<?php echo $submitDate; ?>" />
        </li>
        <li class="departmentSelect">
            <?php $this->load->view('includes/departmentSelect', array('divisions' => $divisions)); ?>
        </li>

        <li><hr /></li>

        <?php foreach ($questions as $question): ?> 
        <li>
            <p class="<?php if ($question['required']) { echo 'required'; } ?>"><?php echo $question['question']; ?></p>
        </li>
            <?php foreach ($question['toggleSubquestions'] as $toggleSubQuestionID): ?>
        <li>
            <label for="show-<?php echo $toggleSubQuestionID->subQuestionID; ?>">Yes</label>
            <input name="question[<?php echo $toggleSubQuestionID->subQuestionID; ?>]" type="radio" value="yes" id="show-<?php echo $toggleSubQuestionID->subQuestionID; ?>" class="required" />
            <label for="hide-<?php echo $toggleSubQuestionID->subQuestionID; ?>">No</label>
            <input name="question[<?php echo $toggleSubQuestionID->subQuestionID; ?>]" type="radio" value="no" id="hide-<?php echo $toggleSubQuestionID->subQuestionID; ?>" class="required" />
        </li>
            <?php endforeach; ?>

        <?php switch($question['fieldType']):
            case 'textarea': ?>
                <li>
                    <textarea name="question[<?php echo $question['questionID']; ?>]" rows="3" cols="50" wrap="hard" class="<?php if ($question['required']) { echo 'required'; } ?>"></textarea>
                </li>
                <?php break; ?>	
            <?php case 'file': ?>
                <li>
                    <input name="question[<?php echo $question['questionID']; ?>]" type="<?php echo $question['fieldType']; ?>" onBlur="checkExtension(document.survey['question[<?php echo $question['questionID']; ?>]'].value, 'checkExtensionQuestion')" class="<?php if ($question['required']) { echo 'required'; } ?>" />
                    <span id="checkExtensionQuestion" class="fileTypeError"></span>
                </li>
                <?php break; ?>
            <?php case false: ?>
                <?php break; ?>
            <?php default: ?>
                <li>
                    <input name="question[<?php echo $question['questionID']; ?>]" type="<?php echo $question['fieldType']; ?>" class="<?php if ($question['required']) { echo 'required'; } ?>" />
                </li>
        <?php endswitch; ?>

        <li>
        <?php if (!empty($question['subquestions'])): ?>
        <ul>
        <?php foreach ($question['subquestions'] as $subquestion): ?>
        <li>
            <?php if ($subquestion['toggle'] == 1): ?>
            <div id="<?php echo $subquestion['subQuestionID']; ?>" style="display: none;">
            <?php endif; ?>

            <?php switch($subquestion['fieldType']):

            case 'textarea': ?>
            <p class="<?php if ($question['required']) { echo 'required'; } ?>"><?php echo $subquestion['subQuestion']; ?></p>
            <?php if ($subquestion['subQuestion'] == 'Please list'): ?>
            <textarea name="subQuestion[<?php echo $subquestion['subQuestionID']; ?>]" rows="3" cols="50" wrap="hard" class="required">list:</textarea>
            <?php else: ?>
            <textarea name="subQuestion[<?php echo $subquestion['subQuestionID']; ?>]" rows="3" cols="50" wrap="hard"></textarea>
            <?php endif; ?>
            <?php break; ?>	

            <?php case 'file': ?>
            <p class="<?php if ($question['required']) { echo 'required'; } ?>"><?php echo $subquestion['subQuestion']; ?></p>
            <input name='subQuestion[<?php echo $subquestion['subQuestionID']; ?>]' type="<?php echo $subquestion['fieldType']; ?>" onBlur="checkExtension(document.survey['subQuestion[<?php echo $subquestion['subQuestionID']; ?>]'].value, 'checkExtensionSubQuestion')" />
            <span id="checkExtensionSubQuestion" class="fileTypeError"></span>
            <?php break; ?>	

            <?php case 'text': ?>
            <p class="<?php if ($question['required']) { echo 'required'; } ?>"><?php echo $subquestion['subQuestion']; ?></p>
            <input id="toggle-<?php echo $subquestion['subQuestionID']; ?>" name='subQuestion[<?php echo $subquestion['subQuestionID']; ?>]' type="checkbox" value="<?php echo $subquestion['subQuestion']; ?>" />
            <?php break; ?>

            <?php default: ?>
            <input id="subQuestion[<?php echo $subquestion['subQuestionID']; ?>]" name="subQuestion[<?php echo $subquestion['subQuestionID']; ?>]" type="<?php echo $subquestion['fieldType']; ?>" />
            <label for="subQuestion[<?php echo $subquestion['subQuestionID']; ?>]"><?php echo $subquestion['subQuestion']; ?></label>

            <?php endswitch; ?>

            <?php if ($subquestion['toggle'] == 1): ?>
            </div>
            <?php endif; ?>
        </li>
            <?php foreach ($subquestion['subchoicequestions'] as $subChoiceQuestion): ?>
        <li>
            <?php if ($subChoiceQuestion['toggle'] == 1): ?>
            <div id="<?php echo $subquestion['subQuestionID']; ?>" style="display: none;">	
                <?php endif; ?> 
                <?php switch($subChoiceQuestion['fieldType']):
                case 'textarea': ?>
                <?php if (!empty($subChoiceQuestion['subChoiceQuestion'])): ?>
                <p class="<?php if ($question['required']) { echo 'required'; } ?>">
                    <?php echo $subChoiceQuestion['subChoiceQuestion']; ?>
                </p>
                <?php endif; ?>
                <p><textarea name='subChoiceQuestion[<?php echo $subQuestion['subQuestionID']; ?>]' rows="3" cols="50" wrap="hard"></textarea></p>
                <?php break; ?>
                <?php default: ?>
                <p><input name='subChoiceQuestion[<?php echo $subQuestion['subQuestionID']; ?>]' type="<?php echo $subChoiceQuestion['fieldType']; ?>" /></p>
                <?php endswitch; ?>
                <?php if ($subChoiceQuestion['toggle'] == 1): ?>
            </div>
            <?php endif; ?>
        </li>
            <?php endforeach; ?>
        <?php endforeach; ?>
        </ul>
        <?php endif; ?>
        </li>
        <?php endforeach; ?>

        <?php foreach ($contactQuestions as $contactQuestion): ?>
        <li>
            <p><?php echo $contactQuestion['contactQuestion']; ?></p>
        </li>
        <li>
            <input type="checkbox" value="yes" name="copyData" id="copyData" onClick="copyFormData()" />
            <label for="copyData">Check to include yourself as an interviewee</label>
        </li>
        <li>
            <ul>
            <?php foreach ($contactQuestion['contactFields'] as $contactField): ?>
            <?php if ($contactField['required'] == 1): ?>
            <li><?php $this->load->view('surveys/contact', array('contactField' => $contactField, 'required' => true)); ?></li>
            <?php endif; ?>
            <?php endforeach; ?>
            </ul>
        </li>
        <?php endforeach; ?>
        <li>
            <p><a id="addContacts"><img src="<?php echo base_url('images/plus.gif'); ?>" alt="Add More Contacts" />Add More Contacts</a></p>				
        </li>
        <li>
            <div id="surveyContacts" style="display: none;">
                <ul>
                <?php foreach ($contactQuestions[0]['contactFields'] as $contactField): ?>
                <?php if ($contactField['required'] == 0): ?>
                <li><?php $this->load->view('surveys/contact', array('contactField' => $contactField, 'required' => false)); ?></li>
                <?php endif; ?>
                <?php endforeach; ?>
                </ul>
            </div>
        </li>
        <li>
            <p><input name="submit" type="submit" value="Submit your responses" /></p>
        </li>
    </ul>
</form>
<script type="text/javascript">
    function copyFormData() {
        $('#firstName, #lastName, #phoneNumber, #emailAddress').each(function(i) {
            if ($('#copyData').is(':checked')) {
                $('input[id*=contactField]').eq(i).val($(this).val());
            } else {
                $('input[id*=contactField]').eq(i).val('');
            }
        });
    }

    $(document).ready(function(){  
        $('#surveyForm').validate();
        $('#addContacts').click(function () { 
            $('#surveyContacts').toggle('fast'); 	
        });  
        $('input[id|=show]').change(function () { 
            $('#' + $(this).attr('id').replace('show-', '')).show('fast'); 	
        });  
        $('input[id|=hide]').change(function () { 
            $('#' + $(this).attr('id').replace('hide-', '')).hide('fast'); 	
        });  
        $('input[id|=toggle]').change(function () { 
            $('#' + $(this).attr('id').replace('toggle-', '')).toggle('fast'); 	
        });  
    }); 
</script>
