<?php
namespace rias\widthfieldtype\twig;

class WidthAsPercentExtension extends \Twig_Extension
{
	public function getName()
	{
		return 'width_as_percentage_extension';
	}

	public function getFilters()
	{
		return [
			new \Twig_SimpleFilter('asPercentage', [$this, 'asPercentage'])
		];
	}

	public function asPercentage($width)
	{
		if (!preg_match('/(\d+)\/(\d+)/', $width, $out))
		{
			Craft::error("Bad value of {$width} passed.", __CLASS__);
			return '';
		}

		return (($out[1] / $out[2]) * 100) . '%';
	}
}
