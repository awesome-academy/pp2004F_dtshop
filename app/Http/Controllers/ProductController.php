<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Components\Recusive;
use App\Traits\StorageImageTrait;
use App\Product;
use App\Product_Image;
use App\Tag;
use App\product_tag;
use DB;
use Log;

class ProductController extends Controller
{
    use StorageImageTrait;
    private $category;
    private $product;
    private $product_image;
    public function __construct(
        Category $category,
        Product $product,
        Product_Image $product_image,
        Tag $tag,
        product_tag $product_tag
    ) {
        $this->category = $category;
        $this->product = $product;
        $this->product_image = $product_image;
        $this->tag = $tag;
        $this->product_tag = $product_tag;
    }

    public function getCategory($parentId)
    {
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }
    public function index()
    {
        $products = $this->product->paginate(5);
        return view('admin.products.index', compact('products'));
    }

    public function create($parentId='')
    {
        $htmlOption =$this->getCategory($parentId);
        return view('admin.products.create', compact('htmlOption'));
    }
    
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $dataProductCreate = [
                'name'=>$request->name,
                'price'=>$request->price,
                'content'=>$request->contents,
                'user_id'=>auth()->id(),
                'category_id'=>$request->category_id
            ];
            $dataUpload = $this->storageUploadFile($request, 'image_path', 'product');
            if (!empty($dataUpload)) {
                $dataProductCreate['image_name'] = $dataUpload['file_name'];
                $dataProductCreate['image_path'] = $dataUpload['file_path'];
            }
            $product = $this->product->create($dataProductCreate);
            
            //Insert Ảnh chi tiết to Product
            if ($request->hasFile('images')) {
                foreach ($request->images as $fileItem) {
                    $dataProductImages = $this->storageUploadMultiple($fileItem, 'product');
                    //dd($dataProductImages);
                    //Eloquent one to many->create
                    $product->product_images()->create([
                        'image_path'=> $dataProductImages['file_path'],
                        'image_name'=> $dataProductImages['file_name'],
                    ]);
                }
            }
            //Insert tags to Product
            foreach ($request->tags as $tagItem) {
                //insert to Tags
                $tagInstance = $this->tag->firstOrCreate(['name'=>$tagItem]);
                $tagsId[] = $tagInstance->id;
            }
            //Eloquent insert in many to many
            $product->tags()->attach($tagsId);
            DB::commit();
            return redirect()->route('product.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Messeage: '. $exception->getMessage() . ' Line: ' . $exception->getLine());
        }
    }

    public function edit($id)
    {
        $product = $this->product->find($id);
        $htmlOption =$this->getCategory($product->category_id);
        return view('admin.products.edit', compact('product', 'htmlOption'));
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $dataProductUpdate = [
                'name'=>$request->name,
                'price'=>$request->price,
                'content'=>$request->contents,
                'user_id'=>auth()->id(),
                'category_id'=>$request->category_id
            ];
            $dataUpload = $this->storageUploadFile($request, 'image_path', 'product');
            if (!empty($dataUpload)) {
                $dataProductUpdate['image_name'] = $dataUpload['file_name'];
                $dataProductUpdate['image_path'] = $dataUpload['file_path'];
            }
            $this->product->find($id)->update($dataProductUpdate);
            $product=$this->product->find($id);
            
            //Insert Ảnh chi tiết to Product
            if ($request->hasFile('images')) {
                $this->product_image->where('product_id', $id)->delete();
                foreach ($request->images as $fileItem) {
                    $dataProductImages = $this->storageUploadMultiple($fileItem, 'product');
                    //dd($dataProductImages);
                    //Eloquent one to many->create
                    $product->product_images()->create([
                        'image_path'=> $dataProductImages['file_path'],
                        'image_name'=> $dataProductImages['file_name'],
                    ]);
                }
            }
            //Insert tags to Product
            foreach ($request->tags as $tagItem) {
                //insert to Tags
                $tagInstance = $this->tag->firstOrCreate(['name'=>$tagItem]);
                $tagsId[] = $tagInstance->id;
            }
            //Eloquent insert in many to many
            $product->tags()->sync($tagsId);
            DB::commit();
            return redirect()->route('product.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Messeage: '. $exception->getMessage() . ' Line: ' . $exception->getLine());
        }
    }

    public function destroy($id)
    {
        try {
            $this->product->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success',
            ], 200);
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: '. $exception->getMessage() . ' Line: ' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail',
            ], 500);
        }
    }
}
