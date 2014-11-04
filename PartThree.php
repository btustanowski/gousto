<?php
require_once('src/Node.php');

/*
 * We'll be building two binary trees.
 *
 * Tree 1 (balanced):
 *
 *           1
 *      2         3
 *    4   5          6
 *  7
 *
 * Tree 2 (not balanced):
 *
 *           1
 *      2         3
 *    4   5
 *  6
 * 7
 *
 */

$tree1 = new Node(1);
$tree1->left = new Node(2);
$tree1->right = new Node(3);
$tree1->left->left = new Node(4);
$tree1->left->right = new Node(5);
$tree1->right->right = new Node(6);
$tree1->left->left->left = new Node(7);

$tree2 = new Node(1);
$tree2->left = new Node(2);
$tree2->right = new Node(3);
$tree2->left->left = new Node(4);
$tree2->left->right = new Node(5);
$tree2->left->left->left = new Node(6);
$tree2->left->left->left->left = new Node(7);

if ($tree1->isBalanced()) {
    echo 'Tree 1 is balanced.';
} else {
    echo 'Tree 1 is not balanced.';
}

echo "\n";

if ($tree2->isBalanced()) {
    echo 'Tree 2 is balanced.';
} else {
    echo 'Tree 2 is not balanced.';
}