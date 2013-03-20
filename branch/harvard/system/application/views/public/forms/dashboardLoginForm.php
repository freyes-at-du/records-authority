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
<div id="main-content">
    <form name="surveyLoginForm" id="login" method="post" action="<?php echo site_url();?>/login/authdashboard">
        <p>
        <?php if (!empty($error)) {echo "<font color='red'>" . $error . "</font><br /><br />";} ?>
        <div id="loginForm">
            <div class="loginForm">
                <ul>
                    <li>
                    <label for="username">Username</label>
                    <input name="uname" id="username" type="text" size="16" maxlength="10" value="<?php if (!empty($error)) {echo $uname;} ?>" class="required" />
                    </li>
                    <li>
                    <label for="passcode">Passcode</label>
                    <input name="pcode" id="passcode" type="password" size="16" maxlength="20" value="<?php if (!empty($error)) {echo $pcode;} ?>" class="required" />
                    </li>
                    <li>
                    <input type="submit" value="Login" name="submit">
                    </li>
                </ul>
            </div>
        </div>				
        </p>
    </form>
</div>
