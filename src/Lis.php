<?php

/**
 * Class Lis
 */
class Lis {
    /**
     * @var array
     */
    private $sequence = [];
    /**
     * @var array
     */
    private $subsequence_length = [];
    /**
     * @var array
     */
    private $lis_keys = [];
    /**
     * @var int
     */
    private $max_length = 1;


    /**
     * @param $arr
     * @return array
     * @throws Exception
     */
    public function run($arr) {

        // Check input.
        if (!isset($arr) || !is_array($arr) || count($arr) === 0) {
            throw new Exception('Unacceptable input.');
        }

        $this->sequence = array_values($arr);

        // Find longest subsequences ending at each consecutive array element.
        foreach ($arr as $key => $val) {
            $this->ls($key);
        }

        $this->max_length = max($this->subsequence_length);

        // Determine final elements of longest subsequences.
        $endpoints = array_keys($this->subsequence_length, $this->max_length);

        // At this point we're prepared to find all valid paths, but let's settle on the one with lowest indexes and return it.
        foreach ($endpoints as $endpoint) {
            $points = [];
            for ($i = 1; $i <= $this->max_length; $i++) {
                // Save all valid points.
                // $points[] = array_keys(array_slice($this->subsequence_length, 0, $endpoint + 1), $i);

                // Save the lowest index point.
                $key = array_search($i, array_slice($this->subsequence_length, 0, $endpoint + 1));
                $points[] = $this->sequence[$key];
            }
        }

        return $points;
    }

    /**
     * Find the longest increasing sequence that includes the element at index $i
     *
     * @param int $i
     * @return int
     */
    private function ls($i) {

        // Default to 1.
        $this->subsequence_length[$i] = 1;

        // If this is not the first element, try and find a longer subsequence.
        if ($i !== 0) {
            $results = [];
            for ($j = 0; $j < $i; $j++) {
                if($this->sequence[$i] > $this->sequence[$j])
                {
                    $results[] = $this->ls($j);
                }
            }
            // Save subsequence length to $i-th element (including that element).
            $this->subsequence_length[$i] = !empty($results) ? max($results) + 1 : 1;
        }
        return $this->subsequence_length[$i];
    }

} 