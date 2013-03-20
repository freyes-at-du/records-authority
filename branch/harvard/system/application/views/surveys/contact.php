<?php switch($contactField['fieldType']):
        case 'text': ?>
        <label class="<?php if ($required) { echo 'required'; }?>" for="contactField_<?php echo $contactField['contactFieldID']; ?>"><?php echo $contactField['contactField']; ?></label>
        <input name="surveyContacts[<?php echo $contactField['contactFieldID']; ?>]" id="contactField_<?php echo $contactField['contactFieldID']; ?>" type="<?php echo $contactField['fieldType']; ?>" class="<?php if ($required) { echo 'required'; }?> 
        <?php switch($contactField['contactField']):
                case 'Email': ?>
                email" />
                <?php break; ?>
            <?php case 'Phone': ?>
                phone" /> (xxx-xxx-xxxx)
                <?php break; ?>
            <?php default: ?>
               " />
        <?php endswitch; ?>
        <?php break; ?>
    <?php case 'textarea': ?>
        <label for="contactField_<?php echo $contactField['contactFieldID']; ?>" class="<?php if ($required) { echo 'required'; }?>"><?php echo $contactField['contactField']; ?></label>
        <textarea name="surveyContacts[<?php echo $contactField['contactFieldID']; ?>]" id="contactField_<?php echo $contactField['contactFieldID']; ?>" rows="3" cols="50" wrap="hard" class="<?php if ($required) { echo 'required'; }?>"></textarea>
<?php endswitch; ?> 
