<?php

call_user_func(function () {
    static $functions = [
        'CodeBlocks\\Invoke\\invoke_if',
        'CodeBlocks\\Invoke\\invoke_if_isset',
        'CodeBlocks\\Invoke\\invoke_if_not_empty',

        'CodeBlocks\\not_empty',
        'CodeBlocks\\not_null',
        'CodeBlocks\\null',
        'CodeBlocks\\false',
        'CodeBlocks\\true',
        'CodeBlocks\\not_in_array',

        'CodeBlocks\\temp_file',

        'CodeBlocks\\first_value',
        'CodeBlocks\\first_value_not_empty',

        'CodeBlocks\\Collection\\collection_first',
        'CodeBlocks\\Collection\\collection_last',
        'CodeBlocks\\Collection\\collection_first_n',
        'CodeBlocks\\Collection\\collection_last_n',
        'CodeBlocks\\Collection\\collection_for_every',
        'CodeBlocks\\Collection\\collection_merge',
        'CodeBlocks\\Collection\\collection_get',

        'CodeBlocks\\Objects\\objects_to_array',

        'CodeBlocks\\String\\string_camelize',
        'CodeBlocks\\String\\string_lower_case_first',
        'CodeBlocks\\String\\string_upper_case_first',
        'CodeBlocks\\String\\string_is_lower',
        'CodeBlocks\\String\\string_is_upper',
    ];

    static $basePath = __DIR__;

    foreach ($functions as $function) {
        if (function_exists('Funct\\' . $function)) {
            continue;
        }

        $functionParts = explode('\\', $function);
        $functionName  = array_pop($functionParts);

        $path = $basePath . DIRECTORY_SEPARATOR . implode(DIRECTORY_SEPARATOR, $functionParts) .
                DIRECTORY_SEPARATOR . implode(
                    '',
                    array_map(
                        'ucfirst',
                        explode('_', $functionName)
                    )
                ) . '.php';

        require_once $path;
    }
});
