<?php

/**
 * Class WordSwap
 *
 * Perform task 2
 */
class WordSwap {
    /**
     * @var string We can set the delimiter here, defaults to space.
     */
    private $delimiter = ' ';

    /**
     * Run the swapper.
     *
     * @param $str String to reverse words in.
     * @return $this
     * @throws Exception
     */
    public function run($str) {

        // Check input.
        if (!isset($str) || !is_string($str) || strlen(trim($str)) === 0) {
            throw new Exception('Unacceptable input.');
        }

        try {
            // Explode the string by our delimiter and trim each word just in case.
            $str_arr = array_map('trim', explode($this->delimiter, $str));

            // Use PHP's strrev() to reverse each word and echo the entire output.
            echo implode($this->delimiter, array_map('strrev', $str_arr));

        } catch (Exception $e) {
            // Log the exception quietly.
            throw new Exception('Runtime error.');
        }

        return $this;
    }
} 