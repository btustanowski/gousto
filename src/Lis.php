<?php

/**
 * Class Lis
 *
 * Perform task 4
 */
class Lis {
    /**
     * @var array The initial sequence.
     */
    private $sequence = [];

    /**
     * @var array Longest increasing subsequence at each element.
     */
    private $subsequence_length = [];

    /**
     * @var int Highest subsequence length.
     */
    private $max_length = 1;

    /**
     * @var array List all valid paths/subsequences.
     */
    private $paths = [];


    /**
     * Quickly check the input array, prepare subsequences and return output.
     *
     * @param $arr
     * @return array
     * @throws Exception
     */
    public function run($arr) {

        // Check input.
        if (!isset($arr) || !is_array($arr) || count($arr) === 0) {
            throw new Exception('Unacceptable input.');
        }

        // Maintain element order, but assign new keys to ensure they're correct.
        $this->sequence = array_values($arr);

        // Find longest subsequences ending at each consecutive array element. Initially assume the path to each element is the element itself.
        foreach ($this->sequence as $key => $val) {
            $this->paths[$key][] = $val;
            $this->ls($key);
        }

        // We have our max length, time to output the first array of that size. We could easily output all longest paths if needed, or sort them and return an array.
        foreach ($this->paths as $path) {
            if (count($path) === $this->max_length) {
                return $path;
            }
        }

        return false;
    }

    /**
     * Find the longest increasing sequence that ends in the element at index $i
     *
     * @param int $i
     * @return int Subsequence length
     */
    private function ls($i) {

        // Default to 1 for the first element regardless of its value.
        $this->subsequence_length[$i] = 1;

        // If this is not the first element, try and find a longer subsequence.
        if ($i !== 0) {
            $results = [];

            // Loop over elements left of ours.
            for ($j = 0; $j < $i; $j++) {

                // Having found an element vith a valid subsequence...
                if($this->sequence[$i] > $this->sequence[$j] && $this->subsequence_length[$i] < $this->subsequence_length[$j] + 1)
                {
                    // ...calculate the LS to the current element using the previous one, and save the longest path to $i-th element
                    $results[] = $this->ls($j);
                    $path = array_merge($this->paths[$j], [$this->sequence[$i]]);
                    if (count($path) > count($this->paths[$i])) $this->paths[$i] = $path;

                    // Update max length too.
                    if (count($path) > $this->max_length) $this->max_length = count($path);
                }
            }
            // Save subsequence length to $i-th element (including that element).
            $this->subsequence_length[$i] = !empty($results) ? max($results) + 1 : 1;
        }
        return $this->subsequence_length[$i];
    }

} 