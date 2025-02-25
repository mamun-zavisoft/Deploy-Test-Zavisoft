<?php

namespace App\Http\Controllers;

use App\Actions\FetchProduct;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = (new FetchProduct)->execute($request);
        if ($request->ajax()) {
            return view('components.products.table', ['entity' => $products])->render();
        }

        return view('backend.products.index', compact('products'));
    }

    public function create()
    {
        $brands = Brand::select('id', 'name')->get();
        $categories = Category::select('id', 'name')->get();

        return view('backend.products.create', compact('brands', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'nullable|integer|exists:categories,id',
            'brand_id' => 'nullable|integer|exists:brands,id',
            'name' => 'required|string|max:255|unique:products,name',
            'description' => 'nullable|string|max:4000',
            'purchase_price' => 'required|numeric|min:0',
            'sale_price' => 'required|numeric|min:0',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'images' => 'nullable|array',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        try {
            DB::beginTransaction();
            $product = Product::create([
                'name' => $request->name,
                'brand_id' => $request->brand_id,
                'category_id' => $request->category_id,
                'description' => $request->description,
                'purchase_price' => $request->purchase_price,
                'sale_price' => $request->sale_price,
                'zone_id' => auth()->user()?->zone_id,
            ]);

            $product->thumbnail = $request->file('thumbnail');

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $product->images = $image;
                }
            }

            $product->save();

            DB::commit();

            return response()->json(['message' => 'Product created successfully!', 'type' => 'success', 'redirectUrl' => route('admin.products.index')], 200);
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json(['message' => $th->getMessage(), 'type' => 'error']);
        }
    }

    public function edit(Product $product)
    {
        $brands = Brand::select('id', 'name')->get();
        $categories = Category::select('id', 'name')->get();

        return view('backend.products.edit', compact('brands', 'categories', 'product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'category_id' => 'nullable|integer|exists:categories,id',
            'brand_id' => 'nullable|integer|exists:brands,id',
            'name' => 'required|string|max:255|unique:products,name,' . $product->id,
            'description' => 'nullable|string|max:4000',
            'purchase_price' => 'required|numeric|min:0',
            'sale_price' => 'required|numeric|min:0',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'images' => 'nullable|array',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        try {
            DB::beginTransaction();
            $product->update([
                'name' => $request->name,
                'brand_id' => $request->brand_id,
                'category_id' => $request->category_id,
                'description' => $request->description,
                'purchase_price' => $request->purchase_price,
                'sale_price' => $request->sale_price,
                'zone_id' => auth()->user()?->zone_id,
            ]);

            $product->thumbnail = $request->file('thumbnail');

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $product->images = $image;
                }
            }

            $product->save();

            DB::commit();

            return response()->json(['message' => 'Product Updated successfully!', 'type' => 'success'], 200);
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json(['message' => $th->getMessage(), 'type' => 'error']);
        }
    }

    public function destroy(Product $product)
    {
        // if ($category->products()->exists()) {
        //     return response()->json(['message' => 'Category has products, cannot delete!'], 422);
        // }
        $product->delete();

        return redirect()->back()->with('success', 'Product deleted successfully!');
        // return response()->json(['message' => 'Brand deleted successfully!']);
    }
}
