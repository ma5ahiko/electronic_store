<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Files\File;

class ProductModel extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'productID'; //default CI4 uses id, (use id in database table so no need to write this line)
    protected $allowedFields = ['productName', 'productImg', 'categoryID', 'productQty', 'productPrice'];

    // Validation rules
    protected $validationRules = [
        'productName' => 'required|min_length[3]',
        'productImg' => 'required|string', // File name stored in DB should be a string
        'categoryID' => 'required|integer',
        'productQty' => 'required|is_natural',
        'productPrice' => 'required|decimal'
    ];

    /**
     * Insert product data into the database.
     *
     * @param array $data
     * @return array Result of the operation.
     */
    public function saveProduct(array $data)
    {
        // Validate the data
        if (!$this->validate($data)) {
            // Return validation errors
            return [
                'status' => 'error',
                'errors' => $this->errors(),
            ];
        }

        // Attempt to insert the data
        if ($this->insert($data)) {
            return [
                'status' => 'success',
                'message' => 'Product successfully saved to the database.',
            ];
        } else {
            return [
                'status' => 'error',
                'message' => 'Failed to save product to the database.',
            ];
        }
    }

    // Fetch products with category details
    public function getProductsWithCategories()
    {
        return $this->db->table($this->table)
            ->select('product.productID as productID, product.productName, product.productImg, product.productQty, product.productPrice, 
                      category.categoryID as categoryID, category.categoryName')
            ->join('category', 'product.categoryID = category.categoryID')
            ->orderBy('product.productID', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function getProductsByCategory(?int $categoryID = null)
    {
        if ($categoryID && $categoryID !== 0) {
            return $this->where('categoryID', $categoryID)->findAll();
        }

        return $this->findAll();
    }
}
