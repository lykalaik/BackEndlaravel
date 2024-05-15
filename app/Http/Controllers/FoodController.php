<?php

namespace App\Http\Controllers;

use App\Http\Requests\BeverageRequest;
use App\Models\Beverage;
use Illuminate\Http\Request;
use App\Http\Requests\FoodsRequest;
use App\Models\Foods;
use Illuminate\Support\Facades\Storage;

class FoodController extends Controller
{
    public function createfood(FoodsRequest $request)
    {
        $imagePath = null;
        if ($request->hasFile('image_link')) {
            $imagePath = $request->file('image_link')->store('public');
        }
        $imageUrl = $imagePath ? Storage::url($imagePath) : null;
        $foods = new Foods();
        $foods->food_category = $request->input('food_category');
        $foods->food_name = $request->input('food_name');
        $foods->price = $request->input('price');
        $foods->image_link = $imagePath;
        $foods->save();
    
        return response()->json(['message' => 'Food Added Successfully'], 201);
    }
    public function createbeverage(BeverageRequest $request)
    {
        $imagePath = null;
        if ($request->hasFile('image_link')) {
            $imagePath = $request->file('image_link')->store('public');
        }
        $imageUrl = $imagePath ? Storage::url($imagePath) : null;
        $foods = new Beverage();
        $foods->beverage_name = $request->input('beverage_name');
        $foods->price = $request->input('price');
        $foods->image_link = $imagePath;
        $foods->save();
    
        return response()->json(['message' => 'Beverage Added Successfully'], 201);
    }
    public function viewfoods()
    {
        $foods = Foods::all()->map(function ($foods) {
            $foods['image_link'] = str_replace('public/', '', $foods['image_link']);
            return $foods;
        });
        return $foods;
    }
    public function viewbeverage()
    {
        $beverage = Beverage::all()->map(function ($beverage) {
            $beverage['image_link'] = str_replace('public/', '', $beverage['image_link']);
            return $beverage;
        });
        return $beverage;
    }
    public function getfood($food_id)
    {
        
        $foods = Foods::where('food_id', $food_id)->first();
    
        if (!$foods) {
          
            return response()->json(['error' => 'Food not found'], 404);
        }
    
       
        $foods['image_link'] = str_replace('public/', '', $foods['image_link']);
    
        return $foods;
    }

    public function getbeverage($beverage_id)
    {
        
        $beverage = Beverage::where('beverage_id', $beverage_id)->first();
    
        if (!$beverage) {
          
            return response()->json(['error' => 'Beverage not found'], 404);
        }
    
       
        $beverage['image_link'] = str_replace('public/', '', $beverage['image_link']);
    
        return $beverage;
    }
    
}
