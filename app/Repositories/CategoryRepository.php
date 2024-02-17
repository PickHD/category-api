<?php

namespace App\Repositories;
use App\Interfaces\Repositories\CategoryRepositoryInterface;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CategoryRepository implements CategoryRepositoryInterface
{
  public function __construct() {}

  public function insert(Category $category){
    $category->save();
    return $category;
  }

  public function getById($id){
    $category = Category::find($id);
    if (!empty($category)) {
        return $category;
    } else {
        throw new NotFoundHttpException("category not found");
    }
  }
  
  public function getAll(){
    return Category::all();
  }

  public function update(Request $request, $id){
    if (Category::where('id',$id)->exists()) {
        $category = Category::find($id);

        $category->name = is_null($request->name) ? $category->name : $request->name;
        $category->status= $request->status;
        $category->save();

        return $category;
    } else {
        throw new NotFoundHttpException("category not found");
    }
  }
  public function delete($id){
    $category = Category::find($id);
    if (!empty($category)) {
        $category->delete();  
        return $category;
    } else {
        throw new NotFoundHttpException("category not found");
    }
  }
}