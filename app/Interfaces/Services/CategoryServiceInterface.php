<?php

namespace App\Interfaces\Services;

use Illuminate\Http\Request;

interface CategoryServiceInterface {
  public function create(Request $request);
  public function getDetail($id);
  public function getList();
  public function update(Request $request, $id);
  public function delete($id);
}