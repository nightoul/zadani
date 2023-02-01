<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function create()
    {
        return view('create');
    }

    public function list()
    {
        $brands = Brand::all();

        return view('list', ['brands' => $brands]);
    }

    public function store(Request $request)
    {
        $newBrand = new Brand();
        $newBrand->name = $request->input('chatgpt_prompt');
        $newBrand->description = $request->input('chatgpt_response');
        $newBrand->save();

        return redirect('/')->with('message', 'Entry saved');
    }
}
