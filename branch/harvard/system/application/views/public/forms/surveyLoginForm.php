<?php
/**
 * Copyright 2011 University of Denver--Penrose Library--University Records Management Program
 * Author evan.blount@du.edu and fernando.reyes@du.edu
 * 
 * This file is part of Records Authority.
 * 
 * Records Authority is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * Records Authority is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with Records Authority.  If not, see <http://www.gnu.org/licenses/>.
 * 
 **/
?>

<h3><?php echo $this->lang->line('page_title_survey_login'); ?></h3>
<?php if (!empty($error)) {echo "<div class='error'>" . $error . "</div>";} ?>
<div id="loginMessage">
    <?php echo $this->lang->line('login_message'); ?>
    <a href="<?php $siteUrl = site_url();echo $siteUrl;?>/du/retentionSchedules">Records Authority Search</a>
</div>
    
<form name="surveyLoginForm" id="login" method="post" action="<?php echo site_url();?>/login/authenticate">
    <ul>
        <li>
        <label for="username">ID</label>
        <input name="uname" id="username" type="text" size="16" maxlength="9" value="<?php if (!empty($error)) {echo $uname;} ?>" class="required" />
        </li>
        <li>
        <label for="passcode">Password</label>
        <input name="pcode" id="passcode" type="password" size="16" maxlength="20" value="<?php if (!empty($error)) {echo $pcode;} ?>" class="required" />
        </li>
        <li>
        <input type="submit" value="Log In" name="submit">
        </li>
    </ul>
</form>

<p><?php echo str_replace('$email', '<a href="mailto:' . $this->config->item('prodEmail') .'">' . $this->config->item('prodEmail') . '</a>', $this->lang->line('login_contact')); ?></p>
