<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="alert alert-success" id="hidemesges" onclick="hideme();" style="text-align: center;position: fixed;
   width: 70%;margin-left: 18%;
    z-index: 10000;opacity: 0.9;    font-size: 17px;
    font-weight: bold;"><?= $message ?></div>
