<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;use Illuminate\Support\Facades\File;use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{

    public function index()
    {
        return view('products.index');
    }


    public function store()
    {
        $tmpRequestData = request()->all();
        $tmpRequestData['date_added'] = date("Y-m-d H:i:s");

        $newData[] = $tmpRequestData;
        $existingData = json_decode(Storage::disk('local')->get('products.json'),true);

        if (!empty($existingData)) {
            $combinedData = array_merge($newData,$existingData);
        }
        else {
            $combinedData = $newData;
        }


        Storage::disk('local')->put('products.json', json_encode($combinedData));
    }

    public function getallproducts()
    {
        $products['products'] = json_decode(Storage::disk('local')->get('products.json'),true);

        return json_encode($products);
    }
}
