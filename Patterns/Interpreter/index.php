<?php

function load_class($class) {
	include "$class.php";
}

 spl_autoload_register (load_class);
 
function print_l($var) {

	echo "$var <br />";
}



$context = new InterpreterContext();
$input= new VariableExpression("input");

/**
 * Simulate the following expression:
 * 	input equals 4 or inputs equals "four"
 *
 */

$statement = new BooleanOrExpression (
		new EqualsExpression($input, new LiteralExpression("4") ),
		new EqualsExpression($input, new LiteralExpression("four") )
		);

foreach (array ("four" , "4" , "52" ) as $val) {
	$input->setValue($val);
	echo ("$val:"); 
	$statement->interpret($context);
 	if ($context->lookup($statement)) {
		print_l("true");
	} else {
		print_l("false");
 	}
}

