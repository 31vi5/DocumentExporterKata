<?php

declare(strict_types=1);

namespace Dockata\Template;

class DocumentWithoutHeaderAndFooter extends BasicDocument
{

	protected function addHeader(array $p): array
	{
		return $p;
	}


	protected function addFooter(array $p): array
	{
		return $p;
	}

}
