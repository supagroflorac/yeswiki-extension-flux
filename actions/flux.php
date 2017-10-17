<?php
namespace Flux;

/* Usage : {{flux src="http://mon.domai.ne/path/fichier.ics" [nb='5'] [template='default']}} */

use PicoFeed\Reader\Reader;
use PicoFeed\PicoFeedException;

$loader = require __DIR__ . '/../vendor/autoload.php';

if (!defined("WIKINI_VERSION")) {
    die("Accès direct interdit.");
}

$src = filter_var($this->GetParameter("src"), FILTER_SANITIZE_URL);
if (empty($src)) {
    echo('La source doit être définie');
    return;
}

$template = filter_var($this->GetParameter('template', 'default'), FILTER_SANITIZE_STRING);

$nb = '5';
if (filter_var($this->GetParameter("nb", '5'), FILTER_VALIDATE_INT)) {
    $nb = filter_var($this->GetParameter("nb", '5'));
}

$view = new Views\Loading($src, $template, $nb);
$view->show();
