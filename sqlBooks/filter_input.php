<?php
function my_filter_function (){
        $filter = [
            'ISBN' => FILTER_SANITIZE_STRING,
            'book_name' => FILTER_SANITIZE_STRING,
            'author' => FILTER_SANITIZE_STRING
        ];
        return (filter_input_array(INPUT_GET, $filter));
        }