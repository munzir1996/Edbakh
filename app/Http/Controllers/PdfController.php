<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Recipe;
use Lang;

class PdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF($id)
    {
        $recipe = Recipe::findOrFail($id);
        if (\Lang::getLocale() == 'en') {
            $data = ['title_en' => $recipe->title_en,
                    ];
            $pdf = PDF::loadView('pdf', $data);
    
            return $pdf->download('Edbakh.pdf');
        } else {
            # code...
        }
        
        
    }
}
