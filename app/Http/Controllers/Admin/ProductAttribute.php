<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Attributes;
use App\Models\ProductAttribute;

class ProductAttributeController extends Controller
{
    //

    public function loadAttributes() {
        $attribute = Attribute::all();
        return response()->json($attribute);
    }

    public function productAttributes(Request $request) {
        $product = Product::findOrFail($request->id);
    }

    public function addAttribute(Request $request) {
        $productAttribute = ProductAttribute::create($request->data);
        if ($productAttribute) {
            return response->json(['message' => 'Product attribute added successfully.']);
        }else{
            return response()->json(['message' => 'Something went wrong while submitting product']);
        }
    }

    public function deleteAttribute(Request $request) {
        $productAttribute = ProductAttribute::findOrFail($request->id);
        $productAttribute->delete();
        return response()->json(['statut' => 'success', 'message' => 'Product attribute deleted successfully']);
    }

}
