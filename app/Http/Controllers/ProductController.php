<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Components\Recusive;
use App\Traits\StorageImageTrait;
use App\Product;
use App\Product_Image;

class ProductController extends Controller
{
    use StorageImageTrait;
    private $category;
    private $product;
    private $product_image;
    public function __construct(Category $category, Product $product, Product_Image $product_image)
    {
        $this->category = $category;
        $this->product = $product;
        $this->$product_image = $product_image;

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
        return view('admin.products.index');
    }

    public function create($parentId='')
    {
        $htmlOption =$this->getCategory($parentId);
        return view('admin.products.create', compact('htmlOption'));
    }
    
    public function store(Request $request)
    {
        //dd($request->images); check ->Illuminate..../UploadFile
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
                // $this->product_image->create([
                //     'product_id'=> $product->id,
                //     'image_path'=> $dataProductImages['file_path'],
                //     'image_name'=> $dataProductImages['file_name'],
                //     ]);
            }
        }
            
        // $fileNameOrigin = $request->image_path->getClientOriginalName();
        // $file = $request->image_path;
        // $fileNameHash = Str::random(20). $file->getClientOriginalExtension();
        // $pathFile = $request->file('image_path')->storeAs('public/product/'.auth()->id(), $fileNameHash);
        // $data=[
        //     'file_name'=>$fileNameOrigin,
        //     'file_path'=>Storage::url($pathFile)
        // ];
        // dd($data);
    }
}
