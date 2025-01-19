<?php

namespace App\Controllers;

use App\Models\ProductModel;

class PortfolioController extends BaseController
{
    public function index()
    {
        $productModel = new ProductModel();
        $products = $productModel->findAll(); // Fetch all products

        return view('products', ['products' => $products]);
    }
}

?>