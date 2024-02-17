<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use function App\Helpers\ResponseJSONHelper;

class CategoryController extends Controller
{
    private $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        try {
            $results = $this->categoryService->getList();

            return ResponseJSONHelper("Success Get List Category", $results, 200, null);
        } catch (NotFoundHttpException $e) {
            return ResponseJSONHelper($e->getMessage(), $e, 404, $e->getMessage());
        } catch (\Exception $e) {
            return ResponseJSONHelper($e->getMessage(), $e, 500, $e->getMessage());
        } 
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|unique:categories|max:255'
            ]);

            $result = $this->categoryService->create($request);

            return ResponseJSONHelper("Success Create Category", $result->id, 201, null);
        } catch (NotFoundHttpException $e) {
            return ResponseJSONHelper($e->getMessage(), $e, 404, $e->getMessage());
        } catch (\Exception $e) {
            return ResponseJSONHelper($e->getMessage(), $e, 500, $e->getMessage());
        } 
    }

    public function show($id)
    {
        try {
            $result = $this->categoryService->getDetail($id);

            return ResponseJSONHelper("Success Get Detail Category", $result, 200, null);
        } catch (NotFoundHttpException $e) {
            return ResponseJSONHelper($e->getMessage(), $e, 404, $e->getMessage());
        } catch (\Exception $e) {
            return ResponseJSONHelper($e->getMessage(), $e, 500, $e->getMessage());
        } 
    }

    public function update(Request $request, $id)
    {
        try {
            $result = $this->categoryService->update($request, $id);

            return ResponseJSONHelper("Success Update Category", null, 200, null);
        } catch (NotFoundHttpException $e) {
            return ResponseJSONHelper($e->getMessage(), $e, 404, $e->getMessage());
        } catch (\Exception $e) {
            return ResponseJSONHelper($e->getMessage(), $e, 500, $e->getMessage());
        } 
    }

    public function destroy($id)
    {
        try {
            $result = $this->categoryService->delete($id);

            return ResponseJSONHelper("Success Delete Category", null, 200, null);
        } catch (NotFoundHttpException $e) {
            return ResponseJSONHelper($e->getMessage(), $e, 404, $e->getMessage());
        } catch (\Exception $e) {
            return ResponseJSONHelper($e->getMessage(), $e, 500, $e->getMessage());
        } 
    }
}
