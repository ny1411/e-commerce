<?php

require_once __DIR__ . "/../models/ViewProducts.model.inc.php";

class ViewProductsController extends ViewProducts
{
    public function fetchAllProducts()
    {
        return $this->getAllProducts();
    }
}