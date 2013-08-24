<?php

class InterpreterContext {
	private $expressionstore = array();

	function replace (Expression $exp, $value) {
		$this->expressionstore[$exp->getKey()] =$value;
	}

	function lookup(Expression $exp) {
		return $this->expressionstore[$exp->getKey()];
	}
}
