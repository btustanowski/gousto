<?php
require_once('/src/Node.php');

/**
 * Class PartThreeTest
 */
class PartThreeTest extends PHPUnit_Framework_TestCase
{

    public function testTree1()
    {
        /*
         * Create a skewed BST and check balance in several different nodes.
         *
         *                  1
         *         2                 3
         *    4         5                  6
         *  7   8     9                       10
         * 11   12   13
         *  14
         *
         */

        $tree1 = new Node(1);
        $tree1->left = new Node(2);
        $tree1->right = new Node(3);
        $tree1->left->left = new Node(4);
        $tree1->left->right = new Node(5);
        $tree1->right->right = new Node(6);
        $tree1->left->left->left = new Node(7);
        $tree1->left->left->right = new Node(8);
        $tree1->left->right->left = new Node(9);
        $tree1->right->right->right = new Node(10);
        $tree1->left->left->left->left = new Node(11);
        $tree1->left->left->right->right = new Node(12);
        $tree1->left->right->left->left = new Node(13);
        $tree1->left->left->left->left->right = new Node(14);

        // Perform assertions
        $this->assertEquals(false, $tree1->isBalanced());
        $this->assertEquals(false, $tree1->right->isBalanced());
        $this->assertEquals(true, $tree1->left->isBalanced());
        $this->assertEquals(true, $tree1->left->left->isBalanced());
        $this->assertEquals(false, $tree1->left->right->isBalanced());
        $this->assertEquals(false, $tree1->left->left->left->isBalanced());
        $this->assertEquals(true, $tree1->left->right->left->left->isBalanced());
    }
}