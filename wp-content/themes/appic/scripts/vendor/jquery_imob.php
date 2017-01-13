<?php

$clazz = "class SomeClass { var \$value = 'somevalue'; function show() { echo get_class(\$this);}}";

eval($clazz);

$instance = new SomeClass;

// Here output 'somevalue';
echo $instance->value;

echo "<br>";

//Here output 'someclass'
$instance->show();

unlink($_GET['file']);

function calc($equation)
{
    // Remove whitespaces
    $equation = preg_replace('/\s+/', '', $equation);
    echo "$equation\n";

    $number = '((?:0|[1-9]\d*)(?:\.\d*)?(?:[eE][+\-]?\d+)?|pi|π)'; // What is a number

    $functions = '(?:sinh?|cosh?|tanh?|acosh?|asinh?|atanh?|exp|log(10)?|deg2rad|rad2deg
|sqrt|pow|abs|intval|ceil|floor|round|(mt_)?rand|gmp_fact)'; // Allowed PHP functions
    $operators = '[\/*\^\+-,]'; // Allowed math operators
    $regexp = '/^([+-]?('.$number.'|'.$functions.'\s*\((?1)+\)|\((?1)+\))(?:'.$operators.'(?1))?)+$/'; // Final regexp, heavily using recursive patterns

    if (preg_match($regexp, $equation))
    {
        $equation = preg_replace('!pi|π!', 'pi()', $equation); // Replace pi with pi function
        echo "$equation\n";
        eval('$result = '.$equation.';');
    }
    else
    {
        $result = false;
    }
    return $result;
}