<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSlider;
use App\Models\SliderImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Mockery\Exception;

class FrontendComponentsController extends Controller
{
    public function heroSliderList() {
        $heroSliders = HeroSlider::all();
        return view('admin.heroSlider.list')->with(compact('heroSliders'));
    }

    public function heroSliderAdd() {
        return view('admin.heroSlider.add');
    }

    public function heroSliderCreate(Request $request) {
        $request->validate([
            'slider_title' => 'required',
            'slider_button_text' => 'required',
            'slider_button_url' => 'required',
            'slider_image' => 'required'
        ]);
        try {
            $requestData = $request->all();
            if ($request->file())  {
                $fileName = time() . '_' . $request->slider_image->getClientOriginalName();
                $filePath = $request->file('slider_image')->storeAs('uploads', $fileName, 'public');
                $requestData['slider_image'] = '/storage/' . $filePath;
            }
            HeroSlider::create($requestData);
        }catch (Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }
        return redirect()->route('heroSliders')->with('success', 'Slider added Successfully!');
    }

    public function heroSliderEdit(HeroSlider $heroSlider) {
        return view('admin.heroSlider.edit')->with(compact('heroSlider'));
    }

    public function heroSliderUpdate(HeroSlider $heroSlider, Request $request) {
        $request->validate([
            'slider_title' => 'required',
            'slider_button_text' => 'required',
            'slider_button_url' => 'required',
            'slider_image' => 'required'
        ]);
        $requestData = $request->all();
        if ($request->file('slider_image')) {
            if (Storage::disk('public')->exists(str_replace('/storage/', '', $heroSlider->slider_image))) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $heroSlider->slider_image));
            }
            $fileName = time() . '_' . $request->slider_image->getClientOriginalName();
            $filePath = $request->file('slider_image')->storeAs('uploads', $fileName, 'public');
            $requestData['slider_image'] = '/storage/' . $filePath;
        }
        $heroSlider->update($requestData);
        return redirect()->route('heroSliders')->with('success', 'Hero Slider Added Successfully!');
    }

    public function heroSliderDelete(HeroSlider $heroSlider) {
        if (Storage::disk('public')->exists(str_replace('/storage/', '', $heroSlider->slider_image))) {
            Storage::disk('public')->delete(str_replace('/storage/', '', $heroSlider->slider_image));
        }
        $heroSlider->delete();
        return redirect()->route('heroSliders')->with('success', 'Slider Deleted successfully');
    }

    public function sliderImageList() {
        $sliderImages = SliderImage::all();
        return view('admin.sliderImages.list')->with(compact('sliderImages'));
    }

    public function sliderImageAdd() {
        return view('admin.sliderImages.add');
    }

    public function sliderImageStore(Request $request) {
        $request->validate(['image' => 'required']);
        $requestData = $request->all();
        foreach ($requestData['image'] as $requestDatum) {
            $fileName = time() . '_' . $requestDatum->getClientOriginalName();
            $storeArr['image'] = $requestDatum->storeAs('uploads', $fileName, 'public');
            SliderImage::create($storeArr);
        }
        return redirect()->route('sliderImages')->with('success','Successfully Added');
    }

    public function sliderImageDelete(SliderImage $sliderImage) {
        if (Storage::disk('public')->exists($sliderImage->image)) {
            Storage::disk('public')->delete($sliderImage->image);
        }
        $sliderImage->delete();
        return redirect()->route('sliderImages')->with('success','Successfully Deleted');
    }
}
