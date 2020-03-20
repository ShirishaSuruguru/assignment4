<?php
//creating class for vending machine
class VendingMachine
{
    //creating private variables
    private $product;
    private $cost;
    private $amount;
    
    //creating functions 
    function __construct()
    {
        $this->cost = 0;
        $this->amount = 0;
    }
    //creating function and declaring the cost of the product
    function select_product($product)
    {
        $this->product = $product;
        if($product == 'Chocolate') {
            $this->cost = 125;
        } else if ($product == 'Pop') {
            $this->cost = 150;
        } else if($product == 'Chips') {
            $this->cost = 175;
        }
    }
    //creating public functions and to get output
    public function getProduct()
    {
        return $this->product;
    }

    public function getcost()
    {
        return $this->cost;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function setAmount($amount)
    {
        $this->amount = $amount;
    }
}