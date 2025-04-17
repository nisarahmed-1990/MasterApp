<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UgsyllabusModel;
use App\Models\PgsyllabusModel;


class DashboardController extends Controller
{
    public function dashboard()
    {
        $NoPdf['nopdf'] = UgsyllabusModel::all()->count();
        $NoPGPdf['nopgpdf'] = PgsyllabusModel::all()->count();
        return view('panel.dashboard', $NoPdf,$NoPGPdf);
    }

}
