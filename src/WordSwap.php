<?php

/**
 * Class WordSwap
 */
class WordSwap {
    /**
     * @var string
     */
    private $delimiter = ' ';

    /**
     * @param $str
     * @return $this
     * @throws Exception
     */
    public function run($str) {

        // Check input.
        if (!isset($str) || !is_string($str) || strlen(trim($str)) === 0) {
            throw new Exception('Unacceptable input.');
        }

        try {
            // Explode the string by spaces and trim each word just in case.
            $str_arr = array_map('trim', explode($this->delimiter, $str));

            // Use PHP strrev() to reverse each word and echo the output.
            echo implode($this->delimiter, array_map('strrev', $str_arr));

        } catch (Exception $e) {
            // Log the exception quietly.
            throw new Exception('Runtime error.');
        }

        return $this;
    }

} 