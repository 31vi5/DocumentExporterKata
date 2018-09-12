<?php

declare(strict_types=1);

namespace Dockata\Template;

class DocumentWithAlternativeFooter extends BasicDocument
{

	protected function addFooter(array $p): array
	{
		$p[] = [
			'text' => ' alternative footer ',
		];

		return $p;
	}

}
