<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CategoryModel;

class CategoryController extends BaseController
{
    public function index()
    {
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->findAll();

        return view('admin/category/manage', ['categories' => $categories]);
    }

    public function create()
    {
        return view('admin/category/create');
    }

    public function store()
    {
        $categoryModel = new CategoryModel();

        // Validate input
        $validation = $this->validate([
            'categoryName' => 'required|min_length[3]',
            'categoryDesc' => 'required|min_length[5]',
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'categoryName' => $this->request->getPost('categoryName'),
            'categoryDesc' => $this->request->getPost('categoryDesc'),
        ];

        $categoryModel->insert($data);

        return redirect()->to(base_url('admin/category/manage'))->with('success', 'Category added successfully.');
    }

    public function edit($id)
    {
        $categoryModel = new CategoryModel();
        $category = $categoryModel->find($id);

        if (!$category) {
            return redirect()->to(base_url('admin/category/manage'))->with('error', 'Category not found.');
        }

        return view('admin/category/edit', ['category' => $category]);
    }

    public function update($id)
    {
        $categoryModel = new CategoryModel();

        $validation = $this->validate([
            'categoryName' => 'required|min_length[3]',
            'categoryDesc' => 'required|min_length[5]',
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'categoryName' => $this->request->getPost('categoryName'),
            'categoryDesc' => $this->request->getPost('categoryDesc'),
        ];

        $categoryModel->update($id, $data);

        return redirect()->to(base_url('admin/category/manage'))->with('success', 'Category updated successfully.');
    }

    public function delete($id)
    {
        $categoryModel = new CategoryModel();

        if (!$categoryModel->delete($id)) {
            return redirect()->to(base_url('admin/category/manage'))->with('error', 'Failed to delete the category.');
        }

        return redirect()->to(base_url('admin/category/manage'))->with('success', 'Category deleted successfully.');
    }
}
