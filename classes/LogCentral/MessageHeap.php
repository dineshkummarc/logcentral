<?php

class LogCentral_MessageHeap extends SplMaxHeap
{
	public function compare($value1, $value2)
	{
		if($value1->timestamp > $value2->timestamp)
			return -1;
		else if($value1->timestamp < $value2->timestamp)
			return 1;
		else
			return 0;
	}

	public function loadDirectory($directory)
	{
		foreach($directory as $log)
		{
			foreach($log as $message)
			{
				$this->insert($message);
			}
		}

		return $this;
	}
}
