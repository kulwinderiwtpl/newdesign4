<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = $message;
}
?>
<!--<div class="message error" onclick="this.classList.add('hidden');"><?= $message ?></div>-->
<div class="alert alert-danger" onclick="this.classList.add('hidden')"><button class="close" data-close="alert"></button><?= $message ?></div>