<?php

class Item
{
	public $id;
	public $text;

	function __construct($id = null, $text = null)
	{
		$this->id = $id;
		$this->text = $text;
	}


	public function show()
	{
		return $this->text;
	}
}?>