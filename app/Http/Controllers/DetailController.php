<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TravelPackage;

class DetailController extends Controller
{
    //Detail@Index
    public function index(Request $request, $slug)
    {
        $item = TravelPackage::with(['galleries'])
            ->where('slug', $slug)
            ->firstOrFail();
        return view('pages.detail', [
            'item' => $item
        ]);
    }
}
