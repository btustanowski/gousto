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
     * @var int
     */
    private $max_length = 1;

    /**
     * @var array
     */
    private $paths = [];


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
        foreach ($this->sequence as $key => $val) {
            $this->paths[$key][] = $val;
            $this->ls($key);
        }

        //var_dump($this->paths);die;

        // We have our max length, time to output the first array of that size. We could easily output all longest paths instead.
        foreach ($this->paths as $path) {
            if (count($path) === $this->max_length) {
                return $path;
            }
        }

        return false;
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
                if($this->sequence[$i] > $this->sequence[$j] && $this->subsequence_length[$i] < $this->subsequence_length[$j] + 1)
                {
                    $results[] = $this->ls($j);
                    $path = array_merge($this->paths[$j], [$this->sequence[$i]]);
                    //if($i==5) var_dump($path);
                    if (count($path) > count($this->paths[$i])) $this->paths[$i] = $path;
                    if (count($path) > $this->max_length) $this->max_length = count($path);
                }
            }
            // Save subsequence length to $i-th element (including that element).
            $this->subsequence_length[$i] = !empty($results) ? max($results) + 1 : 1;
        }
        return $this->subsequence_length[$i];
    }

} 