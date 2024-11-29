<?php
// controllers/ProductController.php

require_once 'models/ProductModel.php';

class ProductController {
    private $productModel;

    public function __construct() {
        $this->productModel = new ProductModel();
    }

    public function index() {
        $products = $this->productModel->getAllProducts();
        require_once 'views/product/index.php';
    }

    public function detail($id) {
        $product = $this->productModel->getProductById($id);
        require_once 'views/product/detail.php';
    }
}
?>
