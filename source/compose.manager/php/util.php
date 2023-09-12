<?php

function sanitizeStr($a) {
	$a = str_replace(".","_",$a);
	$a = str_replace(" ","_",$a);
	$a = str_replace("-","_",$a);
    return strtolower($a);
}

function isIndirect($path) {
    return is_file("$path/indirect");
}

function getPath($basePath) {
    $outPath = $basePath;
    if ( isIndirect($basePath) ) {
        $outPath = file_get_contents("$basePath/indirect");
    }

    return $outPath;
}

function toSnakeCase($input)
{
    // Trim leading and trailing spaces
    $input = trim($input);
    // Convert PascalCase to snake_case
    $input = preg_replace('/(?<=\\w)([A-Z])/', '_\\1', $input);
    // Replace spaces with underscores
    $input = str_replace(' ', '_', $input);
    // Remove special characters that aren't underscore
    $input = preg_replace('/[^A-Za-z0-9_]/', '', $input);
    // Convert to lowercase
    return strtolower($input);
}

?>