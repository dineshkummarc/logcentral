<?php

class LogCentral_Log extends FilterIterator
{
	public function __construct($file)
	{
		parent::__construct($file->openFile());
	}

	public function current()
	{
		$json = json_decode($this->getInnerIterator()->current());
		$message = new LogCentral_Message();

		foreach($json as $key=>$value)
			$message->$key = $value;

		return $message;
	}

	public function accept()
	{
		$row = $this->getInnerIterator()->current();
		return trim($row) != '';
	}
}
