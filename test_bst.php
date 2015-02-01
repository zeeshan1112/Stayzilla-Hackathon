<?php

/**
 * by Adrian Statescu <adrian@thinkphp.ro>
 * Twitter: @thinkphp
 * G+     : http://gplus.to/thinkphp
 * MIT Style License
 */


    class Node {

          public $info;
          public $left;
          public $right;
          public $level;

          public function __construct($info) {
                 $this->info = $info;
                 $this->left = NULL;
                 $this->right = NULL;
                 $this->level = NULL;
          }

          public function __toString() {

                 return "$this->info";
          }
    }  


    class SearchBinaryTree {

          public $root;

          public function  __construct() {
                 $this->root = NULL;
          }
  
          public function create($info) {
              
                 if($this->root == NULL) {

                    $this->root = new Node($info);

                 } else {
  
                    $current = $this->root;

                    while(true) {

                          if($info < $current->info) {
                         
                                if($current->left) {
                                   $current = $current->left;
                                } else {
                                   $current->left = new Node($info);
                                   break; 
                                }

                          } else if($info > $current->info){

                                if($current->right) {
                                   $current = $current->right;
                                } else {
                                   $current->right = new Node($info);
                                   break; 
                                }

                          } else {

                            break;
                          }
                    } 
                 }
          }

          public function traverse($method) {

                 switch($method) {

                     case 'inorder':
                     $this->_inorder($this->root);
                     break;

                     case 'postorder':
                     $this->_postorder($this->root);
                     break;
    
                     case 'preorder':
                     $this->_preorder($this->root);
                     break;
   
                     default:
                     break;
                 } 

          } 

          private function _inorder($node) {

                          if($node->left) {
                             $this->_inorder($node->left); 
                          } 

                          echo $node. " ";

                          if($node->right) {
                             $this->_inorder($node->right); 
                          } 
          }


          private function _preorder($node) {

                          echo $node. " ";

                          if($node->left) {
                             $this->_preorder($node->left); 
                          } 


                          if($node->right) {
                             $this->_preorder($node->right); 
                          } 
          }


          private function _postorder($node) {


                          if($node->left) {
                             $this->_postorder($node->left); 
                          } 


                          if($node->right) {
                             $this->_postorder($node->right); 
                          } 

                          echo $node. " ";
          }


          public function BFT() {

                 $node = $this->root;
                 
                 $node->level = 1; 

                 $queue = array($node);

                 $out = array("<br/>");


                 $current_level = $node->level;
  

                 while(count($queue) > 0) {

                       $current_node = array_shift($queue);

                       if($current_node->level > $current_level) {
                            $current_level++;
                            array_push($out,"<br/>");  
                       } 

                       array_push($out,$current_node->info. " ");

                       if($current_node->left) {
                          $current_node->left->level = $current_level + 1;
                          array_push($queue,$current_node->left); 
                       }    

                       if($current_node->right) {
                          $current_node->right->level = $current_level + 1;
                          array_push($queue,$current_node->right); 
                       }    
                 }
    
                
                return join($out,""); 
          }
    } 
               $arr = array(8,3,1,6,4,7,10,14,13);

               $tree = new SearchBinaryTree();
               for($i=0,$n=count($arr);$i<$n;$i++) {
                   $tree->create($arr[$i]);
               }
$str = <<<INTRO
     In computer science, a binary search tree (BST) is a node-based binary tree structure which has the following
properties:
<ul>
<li>the left subtree of a node contains only nodes with keys less than the node's key</li>
<li>the right subtree of a node contains only nodes with keys greater than the node's key</li>
<li>both the left and right subtrees must also be binary search trees</li>
</ul> 
INTRO;
   
    echo"<h1>Binary Search Tree</h1>"; 

    echo"<p>$str</p>"; 

    echo "<h2>Input vector: ", join($arr," "), "</h2>";

    echo"<h1>Breadh-First Traversal Tree</h1>"; 
    echo $tree->BFT();

    echo"<h1>Inorder</h1>"; 
    $tree->traverse('inorder');


    echo"<h1>Postorder</h1>"; 
    $tree->traverse('postorder');

    echo"<h1>Preorder</h1>"; 
    $tree->traverse('preorder');
  
?>