<?php

declare(strict_types=1);

namespace Dockata\Exporter;

class Exporter
{

	public function export(array $p, array $config): string
	{
		if ($config['format'] === 'html') {

			$htmlExport = '<html><head></head><body>';

			foreach ($p as $para) {
				$htmlExport .= '<p style="color=' . (isset($para['color']) ? $para['color'] : 'white') .
					'">' .
					$para['text'] . '</p>';
			}

			$htmlExport .= '</body></html>';

			return self::output($htmlExport, $config['print']);

		} elseif ($config['format'] === 'json') {

			$jsonExport = '[';
			foreach ($p as $para) {
				$jsonExport .= '{"text":"' . $para['text'] . '","color": ' .
					(isset($para['color']) ? $para['color'] : 'white') . '},';
			}
			$jsonExport = rtrim($jsonExport, ',');
			$jsonExport .= ']';

			return self::output($jsonExport, $config['print']);
		}
	}


	private static function output(string $htmlExport, $print): string
	{
		if ($print) {
			echo $htmlExport;

			return '';
		} else {
			return $htmlExport;
		}
	}

}
