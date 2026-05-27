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
<p>Hello <?=$user->first_name;?>,</p>
<p>Please use the below link to Reset your Password</p>
<p><a href="<?=$user->link ?>"><?=$user->link ?></a></p>
<p>Ignore this Email if you have not Requested a Password Reset for your Account</p>
<p>
    Kind Regards,<br/>
    Health Claims Forum Team
</p>