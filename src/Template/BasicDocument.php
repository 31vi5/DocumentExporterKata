<?php

declare(strict_types=1);

namespace Dockata\Template;

class BasicDocument
{

	/**
	 * @var array
	 */
	private $p;


	public function __construct(array $p)
	{
		$p = $this->addHeader($p);
		$p = $this->addFooter($p);
		$this->p = $p;
	}


	public function getP(): array
	{
		return $this->p;
	}


	public function getRawParagraphs(): array
	{
		$p = $this->p;
		unset($p[count($p) - 1]);
		unset($p[0]);

		return $p;
	}


	protected function addHeader(array $p): array
	{
		$p2 = [
			[
				'text' => ' BIG HEADER ',
			],
		];
		foreach ($p as $para) {
			$p2[] = $para;
		}

		return $p2;
	}


	protected function addFooter(array $p): array
	{
		$p2 = [];
		foreach ($p as $para) {
			$p2[] = $para;
		}
		$p2[] = [
			'text' => ' small footer ',
		];

		return $p2;
	}

}
