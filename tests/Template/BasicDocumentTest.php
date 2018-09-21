<?php

declare(strict_types=1);

namespace Dockata\Tests\Template;

require_once __DIR__ . '/../bootstrap.php';

use Dockata\Template\BasicDocument;
use Tester\Assert;
use Tester\TestCase;

final class BasicDocumentTest extends TestCase
{

	public function testBasicDocument(): void
	{
		$p = [
			[
				'text' => 'paragraph',
			],
			[
				'text' => 'paragraph',
				'color' => 'red',
			],
		];
		$document = new BasicDocument($p);

		Assert::count(4, $document->getP());
		Assert::equal($p, array_values($document->getRawParagraphs()));

		$expectedResult = [
			[
				'text' => ' BIG HEADER ',
			],
			$p[0],
			$p[1],
			[
				'text' => ' small footer ',
			],
		];

		Assert::equal($expectedResult, $document->getP());
	}
}

(new BasicDocumentTest())->run();
