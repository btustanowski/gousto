<?php

/**
 * Class CountryCodes
 *
 * Perform Task 1 operations.
 */
class CountryCodes {
    /**
     * @var array The script will work with a different set of codes. Not placing them all here also improves testability.
     */
    private $codes = [];

    /**
     * @var array Order-sensitive swap map for the script.
     */
    private $swapmap = [];

    /**
     * Sort loaded codes using PHP's default sort.
     *
     * @return $this
     */
    public function sort() {
        sort($this->codes);
        return $this;
    }

    /**
     * Load country codes one by one. Easily adaptable for mass loading via an array parameter.
     *
     * @param string $code Code to add
     * @return $this
     * @throws Exception
     */
    public function addCode($code) {

        // Check input.
        if (!isset($code) || !is_string($code) || strlen($code) === 0) {
            throw new Exception('Unacceptable input.');
        }

        // Add code.
        $this->codes[] = $code;
        return $this;
    }

    /**
     * Configure the array map for swaps.
     *
     * @param $arr array of swap map entries, ex. [['A' => 'Aswap'], ['B' => 'Bswap']]
     * @return $this
     * @throws Exception
     */
    public function addMap($arr) {

        // Check input.
        if (!isset($arr) || !is_array($arr) || count($arr) === 0) {
            throw new Exception('Unacceptable input.');
        }

        try {
            foreach ($arr as $key => $val) {
                // Ignore entries that are not strings for both key and value.
                if (!is_string($key) || !is_string($val)) {
                    throw new Exception('Wrong map format.');
                }
                $this->swapmap[$key] = $val;
            }
        } catch (Exception $e) {
            // Log the exception quietly.
            throw new Exception('Map not saved.');
        }

        return $this;
    }

    /**
     * Run the process, echo our codes.
     *
     * @return $this
     * @throws Exception
     */
    public function run() {

        try {
            foreach ($this->codes as &$code) {
                $code = $this->swap($code);
                echo $code . "\n";
            }
        } catch (Exception $e) {
            // Log the exception quietly.
            throw new Exception('Runtime error.');
        }

        return $this;
    }

    /**
     * Perform the swap if the condition is met.
     *
     * @param string $code
     * @return string swapped string or initial code
     */
    private function swap($code) {
        foreach ($this->swapmap as $map => $swap) {
            $matches = 0;
            // Check if all map elements are present in tested string.
            $map_arr = str_split($map);
            foreach ($map_arr as $element) {
                if (strpos($code, $element) !== false) $matches++;
            }

            // Replace the string if matches equal map size. On match found, don't check more swaps and return instantly.
            if (count($map_arr) === $matches) {
                return $swap;
            }
        }
        return $code;
    }
} 