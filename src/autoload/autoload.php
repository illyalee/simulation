<?php

spl_autoload_register(function ($class) {
    $parts = explode('\\', $class);
    $lowercasedParts = array_map(function ($part) {
        return lcfirst($part);
    }, $parts);
    $classNameLowercase = implode('/', $lowercasedParts);
    $file = '../' . $classNameLowercase . '.php';
    if (file_exists($file)) {
        require $file;
    } else {
        throw new Exception("File not found: " . $file);
    }
});