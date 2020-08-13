<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\StorageImageTrait;
use DB;
use Log;
use App\Slider;
use App\Http\Requests\SliderFormRequest;


class SliderController extends Controller
{
    use StorageImageTrait;
    public function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }

    public function index()
    {
        $sliders = $this->slider->paginate(5);
        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function store(SliderFormRequest $request)
    {
        try {
            $dataSliderCreate = [
                'name'=>$request->name,
                'description'=>$request->description,
            ];
            $dataUpload = $this->storageUploadFile($request, 'image_path', 'slider');
            if (!empty($dataUpload)) {
                $dataSliderCreate['image_name'] = $dataUpload['file_name'];
                $dataSliderCreate['image_path'] = $dataUpload['file_path'];
            }
            $slider = $this->slider->create($dataSliderCreate);
            return redirect()->route('slider.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: '. $exception->getMessage() . ' Line: ' . $exception->getLine());
        }
    }

    public function edit($id)
    {
        $slider = $this->slider->find($id);
        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        try {
            $dataSliderUpdate = [
                'name'=>$request->name,
                'description'=>$request->description,
            ];
            $dataUpload = $this->storageUploadFile($request, 'image_path', 'slider');
            if (!empty($dataUpload)) {
                $dataSliderUpdate['image_name'] = $dataUpload['file_name'];
                $dataSliderUpdate['image_path'] = $dataUpload['file_path'];
            }
            $slider = $this->slider->find($id)->update($dataSliderUpdate);
            return redirect()->route('slider.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: '. $exception->getMessage() . ' Line: ' . $exception->getLine());
        }
    }
    
    public function destroy($id)
    {
        try {
            $this->slider->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success',
            ], 200);
        } catch (\Exception $exception) {
            Log::error('Message: '. $exception->getMessage() . ' Line: ' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail',
            ], 500);
        }
    }
}
