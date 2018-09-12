<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Dockata\Exporter\Exporter;
use Dockata\Template\BasicDocument;
use Dockata\Template\DocumentWithAlternativeFooter;
use Dockata\Template\DocumentWithoutHeaderAndFooter;

$exporter = new Exporter();

$document = new BasicDocument(
	[
		// thanks http://officeipsum.com
		[
			'text' => 'Bad commitment to the cause it just needs more cowbell nor pipeline digitalize. Low-hanging fruit programmatically we need distributors to evangelize the new line to local markets, so message the initiative win-win-win nor organic growth.',
			'color' => 'blue',
		],
		[
			'text' => 'Parallel path quarterly sales are at an all-time low, that\'s a huge problem. Goalposts on this journey. Come up with something buzzworthy put in in a deck for our standup today nor back of the net. Not enough bandwidth we are running out of runway.',
			'color' => 'red',
		],
		[
			'text' => 'Reach out we need to dialog around your choice of work attire customer centric, yet synergestic actionables cannibalize. Going forward nail jelly to the hothouse wall, yet it\'s a simple lift and shift job, quick win.',
			'color' => 'yellow',
		],
	]
);

$exporter->export(
	$document->getP(),
	[
		'format' => 'html',
		'print' => true,
	]
);

echo '


';

$document2 = new DocumentWithoutHeaderAndFooter($document->getRawParagraphs());

$exporter->export(
	$document2->getP(),
	[
		'format' => 'json',
		'print' => true,
	]
);

echo '


';

$document3 = new DocumentWithAlternativeFooter($document->getRawParagraphs());

$exporter->export(
	$document3->getP(),
	[
		'format' => 'json',
		'print' => true,
	]
);


