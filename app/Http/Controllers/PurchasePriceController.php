<?php

namespace App\Http\Controllers;

use App\Models\PurchasePrice;
use Illuminate\Http\Request;

class PurchasePriceController extends Controller
{
    //

    public function index(){
        return view('erp.pvd.purchase-price.index');
    }
}
