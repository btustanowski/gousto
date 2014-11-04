<?php

/**
 * Class Node
 */
class Node
{
    /**
     * @var Node value.
     */
    public $value;

    /**
     * @var null Left child
     */
    public $left;

    /**
     * @var null Right child.
     */
    public $right;

    /**
     * Node constructor.
     *
     * @param $val Node value.
     */
    public function __construct($val) {
        $this->value = $val;

        $this->left = null;
        $this->right = null;
    }

    /**
     * @return bool Whether the node's subtree is balanced.
     */
    public function isBalanced() {
        return $this->balance() <= 1 ? true : false;
    }

    /**
     * @return number
     */
    private function balance() {
        if ($this->left === null && $this->right === null)
        {
            return 0;
        } elseif($this->left === null) {
            return $this->right->height();
        } elseif($this->right === null) {
            return $this->left->height();
        }
        return abs($this->left->height() - $this->right->height());
    }

    /**
     * @return int
     */
    private function height() {
        $left = $this->left === null ? 0 : $this->left->height();
        $right = $this->right === null ? 0 : $this->right->height();
        return max($left, $right) + 1;
    }
}