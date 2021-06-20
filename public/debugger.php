<?php

require_once '../app/config.php';

if (!DEBUG) exit('Debugger is disabled.');

// Var
$phpVer = PHP_VERSION;

// Run debugger
if (version_compare(phpversion(), "7.4", ">=")) echo "[ + ] Correct PHP Version";
else echo "[ - ] Outdated PHP Version";