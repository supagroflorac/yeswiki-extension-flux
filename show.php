<?php
namespace Flux;

$loader = require __DIR__ . '/vendor/autoload.php';

use PicoFeed\Reader\Reader;
use PicoFeed\PicoFeedException;

if (!isset($_GET['src'])) {
    (new Views\Error('Action flux : Paramètre src non définis.'))->show();
    return;
}
$src = filter_var(urldecode($_GET['src']), FILTER_SANITIZE_URL);

$template = 'default';
if (isset($_GET['template'])) {
    $template = filter_var($_GET['template'], FILTER_SANITIZE_STRING);
}

$nbItemsToshow = 5;
if (isset($_GET['nb']) and filter_var($_GET['nb'], FILTER_VALIDATE_INT)) {
    $nbItemsToshow = (int)$_GET['nb'];
}

try {
    $reader = new Reader();
    $resource = $reader->download($src);
    $parser = $reader->getParser(
        $resource->getUrl(),
        $resource->getContent(),
        $resource->getEncoding()
    );

    $feed = $parser->execute();
} catch (PicoFeedException $e) {
    (new Views\Error('Action flux : La source n\'est pas accessible.'))->show();
    return;
}

$view = new Views\AjaxShowFlux($src, $nbItemsToshow, $template, $feed);
$view->show();
