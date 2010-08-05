<?php

class LogCentral_Directory extends FilterIterator
{
	public function __construct($dir)
	{
		parent::__construct(
			new RecursiveIteratorIterator(
				new RecursiveDirectoryIterator($dir),
					RecursiveIteratorIterator::SELF_FIRST
				));
	}

	public function current()
	{
		return new LogCentral_Log($this->getInnerIterator()->current());
	}

	public function accept()
	{
		return preg_match('/_current$/',
			$this->getInnerIterator()->current()->getPathname());
	}
}
