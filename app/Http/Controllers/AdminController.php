<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;
use App\Models\Category;
use App\Models\Supplier;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.Dashboard.index', [
    'medicineCount' => Medicine::count(),
    'categoryCount' => Category::count(),
    'supplierCount' => Supplier::count(),
    'lowStockCount' => Medicine::where('quantity', '<', 10)->count(),
  ]);
 }
}
