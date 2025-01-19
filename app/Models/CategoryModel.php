<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'categoryID'; // If your table uses a custom primary key
    protected $allowedFields = ['categoryName', 'categoryDesc', 'createDate'];

    // Validation rules
    protected $validationRules = [
        'categoryName' => 'required|min_length[3]',
        'categoryDesc' => 'required|string'
    ];

    /**
     * Insert a new category.
     *
     * @param array $data The data to insert (must include 'categoryName' and 'categoryDesc').
     * @return int|bool Returns the ID of the inserted row, or false on failure.
     */
    public function createCategory(array $data)
    {
        // Validate the data
        if (!$this->validate($data)) {
            return false;
        }

        // Add the current date to 'createDate'
        $data['createDate'] = date('Y-m-d H:i:s');

        // Insert the data into the database
        return $this->insert($data, true); // Returns the ID of the new row
    }

    /**
     * Update an existing category.
     *
     * @param int $id The ID of the category to update.
     * @param array $data The updated data (must include 'categoryName' and 'categoryDesc').
     * @return bool Returns true on success, or false on failure.
     */
    public function updateCategory(int $id, array $data)
    {
        // Validate the data
        if (!$this->validate($data)) {
            return false;
        }

        // Perform the update
        return $this->update($id, $data);
    }

    /**
     * Delete a category by its ID.
     *
     * @param int $id The ID of the category to delete.
     * @return bool Returns true on success, or false on failure.
     */
    public function deleteCategory(int $id)
    {
        return $this->delete($id);
    }
}
