<?php
$content = <<<EOD
<h1>Шапка шаблона</h1>
EOD;
$content .= require_once $page['viewUri'];
$content .= <<<EOD
<h1>Подвал шаблона</h1>
EOD;

return $content;