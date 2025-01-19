<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Home extends BaseController
{
    public function index()
    {
        $productModel = new ProductModel();

        // Fetch 5 best sellers (use category or tags to identify best sellers)
        $bestSellers = $productModel->where('isBestSeller', 1)->findAll(5);

        return view('home', [
            'bestSellers' => $bestSellers
        ]);
    }
}
