<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProductModel;

class Product extends BaseController
{
    public function create()
    {
        $productModel = new ProductModel();

        if (strtolower($this->request->getMethod()) === 'post') {
            // Get the uploaded file
            $productImg = $this->request->getFile('productImg');
            $filePath = null;

            if ($productImg && $productImg->isValid()) {
                // Generate a random name and move the file to writable/uploads
                $newName = $productImg->getRandomName();
                $filePath = $newName;

                if (!$productImg->move(FCPATH . 'uploads', $newName)) {
                    return view('admin/product/create', [
                        'error' => 'Failed to upload the file.',
                    ]);
                }
            }

            // Collect form data
            $data = [
                'productName' => $this->request->getPost('productName'),
                'productQty' => $this->request->getPost('productQty'),
                'productPrice' => $this->request->getPost('productPrice'),
                'categoryID' => $this->request->getPost('categoryID'),
                'productImg' => $filePath, // Store relative path in the database
            ];

            $result = $productModel->saveProduct($data);
            $products = $productModel->getProductsWithCategories();
            $rowcount = count($products);

            if ($result['status'] === 'success') {
                // Pass success message via flash data
                return redirect()->to(base_url('admin/product/manage'))
                                 ->with('success', 'Product created successfully.');
            } else {
                // Pass error message via flash data
                return redirect()->to(base_url('admin/product/manage'))
                                 ->with('errors', ['Failed to create product.']);
            }
        }

        return view('admin/product/create');
    }

    public function manage()
    {
        $productModel = new ProductModel();

        // Fetch products with category details
        $products = $productModel->getProductsWithCategories();
        $rowcount = count($products);

        return view('admin/product/manage', [
            'products' => $products,
            'rowcount' => $rowcount,
        ]);
    }
    
    public function edit($id)
    {
        $productModel = new ProductModel();
        $product = $productModel->find($id);

        if (!$product) {
            return redirect()->to(base_url('admin/product/manage'))->with('error', 'Product not found');
        }

        return view('admin/product/edit', ['product' => $product]);
    }

    public function update($id)
    {
        $productModel = new ProductModel();
        $product = $productModel->find($id);

        if (!$product) {
            return redirect()->to(base_url('admin/product/manage'))->with('error', 'Product not found');
        }

        // Handle form submission
        if ($this->request->getMethod() === 'POST') {
            $data = [
                'productName' => $this->request->getPost('productName'),
                'productQty' => $this->request->getPost('productQty'),
                'productPrice' => $this->request->getPost('productPrice'),
                'categoryID' => $this->request->getPost('categoryID'),
            ];

            // If a new image is uploaded
            if ($this->request->getFile('productImg')->isValid()) {
                $file = $this->request->getFile('productImg');
                $newName = $file->getRandomName();
                $file->move(FCPATH . 'uploads', $newName);
                $data['productImg'] = $newName;

                // Delete the old image
                if ($product['productImg']) {
                    unlink(FCPATH . 'uploads/' . $product['productImg']);
                }
            }

            if ($productModel->update($id, $data)) {
                return redirect()->to(base_url('admin/product/manage'))->with('success', 'Product updated successfully');
            } else {
                return view('admin/product/edit', [
                    'product' => $product,
                    'validation' => $this->validator,
                ]);
            }
        }
    }

    public function delete($productID)
    {
        $productModel = new ProductModel();
        $product = $productModel->find($productID);

        if ($product) {
            // Remove associated file
            $imagePath = FCPATH . 'uploads/' . $product['productImg'];
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            // Delete the product
            if ($productModel->delete($productID)) {
                return redirect()->to(base_url('admin/product/manage'))->with('success', 'Product deleted successfully.');
            }
        }

        return redirect()->to(base_url('admin/product/manage'))->with('error', 'Failed to delete the product.');
    }
}
