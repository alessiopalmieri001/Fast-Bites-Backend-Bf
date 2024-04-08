<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Database\Eloquent\ModelNotFoundException;
class CategoryController extends Controller
{
    public function index ()
    {
        $categories = Category::with(['restaurants'])->paginate(8);

      return response()-> json([
          'success' => true,
          'payload' => $categories
      ]);
    }
    public function show($id)
    {
        try {
            $category = Category::with(['restaurants'])->findOrFail($id);

            return response()->json([
                'success' => true,
                'payload' => $category
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Categoria non trovata'
            ], 404);
        }
    }

}
