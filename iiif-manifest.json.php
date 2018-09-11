<?php 

namespace IIIF;

require(STYLESHEETPATH . '/manifest-generator/iiif-autoloader.php' );

$manifest = new PresentationAPI\Resources\Manifest(true);

$manifest->setID( site_url('/iiif-resource/' . $item->get_id() . '/manifest.json') );
$manifest->addLabel($item->get_title());

$sequence = new PresentationAPI\Resources\Sequence();
$manifest->addSequence($sequence);
$sequence->setID("http://example.org/iiif/book1/sequence/normal");
//$sequence->addLabel("Current Page Order");

$canvas = new PresentationAPI\Resources\Canvas();
$sequence->addCanvas($canvas);
$canvas->setID("http://example.org/iiif/book1/canvas/p1");
$canvas->addLabel("p. 1");
$canvas->setWidth(500);
$canvas->setHeight(500);

$generator = new Generator();

echo $generator->generate($manifest);

var_dump($_SERVER);
var_dump($item->get_id());