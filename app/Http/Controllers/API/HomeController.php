<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function index()
    {
        return view('admin');
    }

    public function countUsers()
    {
        return DB::table('users')->count();
    }
    public function countMenara()
    {
        return DB::table('menaras')->count();
    }
    public function countBelum()
    {
        return DB::table('tagihans')->where('status', 'Belum Lunas')->count();
    }
    public function countSudah()
    {
        return DB::table('tagihans')->where('status', 'Lunas')->count();
    }
}
