<?php
abstract class Expression {
	private static $keycount = 0;
	private $key;

	abstract function interpret (InterpreterContext $context) ;
	function getKey() {
		if (!$this->key ) {
			self::$keycount++;
			$this->key = self::$keycount;
		}
		return $this->key;
	}
}