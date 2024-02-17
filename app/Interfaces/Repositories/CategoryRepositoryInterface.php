<?php

namespace App\Interfaces\Repositories;

use App\Models\Category;
use Illuminate\Http\Request;

interface CategoryRepositoryInterface {
  public function insert(Category $category);
  public function getById($id);
  public function getAll();
  public function update(Request $request, $id);
  public function delete($id);
}