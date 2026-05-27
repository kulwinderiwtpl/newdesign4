<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
Hello <?=$user->first_name;?> <?=$user->last_name;?>,<br />

<br />You have successfully registered for the HCF website.
<br />Please visit your members area at http://app-hcf.co.uk/hide/newdesign4/users/login or log in through our website at http://healthclaimsforum.net.
<br />
<br />Your login details for the members' area are as follows:

<p>
Your username is your email: <?=$user->email;?>
<br />Your password is:  <?=$user->pwd;?>
</p>

<p>
You will need your e-mail address and password each time you log in and
we recommend you keep these details safe for future reference. Please
note that all passwords are case sensitive.
</p>

<p>
If you wish to change your account details or password please log into
the website and update the details under 'My Account'.
</p>

<br />To visit the website please go to http://healthclaimsforum.net

<br />Kind regards,

<br />HCF IT officers