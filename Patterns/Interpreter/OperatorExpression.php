<?php
/**
 *
 * An instance of the Composite pattern both nodes and leaves share the same interface
 * @author Chris.Kot
 *
 */
abstract class OperatorExpression extends Expression {
	protected $l_op;
	protected $r_op;

	function __construct (Expression $l_op, Expression $r_op) {
		$this->l_op = $l_op;
		$this->r_op = $r_op;
	}

	function interpret(InterpreterContext $context) {
		
		$this->l_op->interpret($context) ;
		$this->r_op->interpret($context);
		$this->doInterpret(
				$context,  $context->lookup($this->l_op), 
				$context->lookup($this->r_op));
	}
	/**
	 *
	 * an instance of the template method pattern. allowing its child classes to provide an implementation. This can streamline the development of concrete classes, as shared functionality is handled by the superclass, leaving the children to concenrate on clean, narraw objectives
	 * @param InterpreterContext $context
	 * @param unknown $result_l
	 * @param unknown $result_r
	 */
	protected abstract function doInterpret (InterpreterContext $context, $result_l, $result_r) ;
}
