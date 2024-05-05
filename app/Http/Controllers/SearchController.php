<?php

namespace App\Http\Controllers;

use App\Models\Show;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
    
        $results = Show::where('title', 'like', "%$query%")
                        ->orWhere('description', 'like', "%$query%")
                        ->get();
    
        return view('shows.search_results', ['results' => $results]);
    }
    
}
