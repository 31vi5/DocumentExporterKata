<?php

declare(strict_types=1);

namespace Dockata\Tests\Exporter;

require_once __DIR__ . '/../bootstrap.php';

use Dockata\Exporter\Exporter;
use Tester\Assert;
use Tester\TestCase;

final class ExporterTest extends TestCase
{

	/**
	 * @dataProvider dataProviderForTestHtml
	 */
	public function testHtml(array $p, string $expectedResult): void
	{
		$exporter = new Exporter();

		$export = $exporter->export(
			$p,
			[
				'format' => 'html',
				'print' => false,
			]
		);

		Assert::equal($expectedResult, $export);
	}


	public function dataProviderForTestHtml(): array
	{
		return [
			[
				[],
				'<html><head></head><body></body></html>',
			],
			[
				[
					[
						'text' => 'paragraph',
					],
					[
						'text' => 'paragraph2',
						'color' => 'red',
					],
				],
				'<html><head></head><body><p style="color:white">paragraph</p><p style="color:red">paragraph2</p></body></html>',
			],
		];
	}


	/**
	 * @dataProvider dataProviderForTestJson
	 */
	public function testJson(array $p, string $expectedResult): void
	{
		$exporter = new Exporter();

		$export = $exporter->export(
			$p,
			[
				'format' => 'json',
				'print' => false,
			]
		);

		Assert::equal($expectedResult, $export);
	}


	public function dataProviderForTestJson(): array
	{
		return [
			[
				[],
				'[]',
			],
			[
				[
					[
						'text' => 'paragraph',
					],
					[
						'text' => 'paragraph2',
						'color' => 'red',
					],
				],
				'[{"text":"paragraph","color":"white"},{"text":"paragraph2","color":"red"}]',
			],
		];
	}


	/**
	 * @dataProvider dataProviderForTestReplaceBadWords
	 */
	public function testReplaceBadWords(array $p, string $expectedResult): void
	{
		$exporter = new Exporter();

		$export = $exporter->export(
			$p,
			[
				'format' => 'json',
				'print' => false,
			]
		);

		Assert::equal($expectedResult, $export);
	}


	public function dataProviderForTestReplaceBadWords(): array
	{
		return [
			[
				[
					[
						'text' => 'The situation is really bad. We have a huge problem in here.',
					],
				],
				'[{"text":"The situation is really good. We have a huge opportunity in here.","color":"white"}]',
			],
		];
	}

	/**
	 * @dataProvider dataProviderForTestAddSmileys
	 */
	public function testAddSmileys(array $p, string $expectedResult): void
	{
		$exporter = new Exporter();

		$export = $exporter->export(
			$p,
			[
				'format' => 'json',
				'print' => false,
			]
		);

		Assert::equal($expectedResult, $export);
	}


	public function dataProviderForTestAddSmileys(): array
	{
		return [
			[
				[
					[
						'text' => 'paragraph',
					],
					[
						'text' => 'paragraph2',
						'color' => 'red',
					],
					[
						'text' => 'paragraph3 ',
					],
				],
				'[{"text":"paragraph :)","color":"white"},{"text":"paragraph2 :)","color":"red"},{"text":"paragraph3 :)","color":"white"}]',
			],
		];
	}

}

(new ExporterTest())->run();
