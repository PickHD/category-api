<?php

namespace App\Services;

use App\Interfaces\Services\CategoryServiceInterface;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class CategoryService implements CategoryServiceInterface
{
  private $categoryRepository;

  public function __construct(protected CategoryRepository $repository) {
    $this->categoryRepository = $repository;
  }

  public function create(Request $request) {
    $category = new Category;
    $category->name = $request->name;
    $category->status = "ACTIVE";

    return $this->repository->insert($category);
  }
  
  public function getDetail($id) {
    return $this->categoryRepository->getById($id); 
  }
  
  public function getList() {
    return $this->categoryRepository->getAll();
  }

  public function update(Request $request, $id) {
    return $this->categoryRepository->update($request, $id);
  }

  public function delete($id) {
    return $this->categoryRepository->delete($id);
  }
}