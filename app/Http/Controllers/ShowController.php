<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Show;
use App\Models\Episode;
use App\Models\category;
class ShowController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    
    

    
     public function index()
     {
         // جلب العروض مع الفئات المرتبطة بها
         $showsByCategory = Show::with('categories')->get()->groupBy(function ($show) {
             // استرجاع الفئات المرتبطة بالعرض
             $categories = $show->categories;
             
             // إذا كانت هناك فئات مرتبطة بالعرض، قم بإرجاع أول فئة، وإلا قم بإرجاع قيمة افتراضية
             return $categories->isNotEmpty() ? $categories->first()->name : 0;
         });
     
         return view('shows.index', compact('showsByCategory'));
     }
     
    
    /**
     * Show the form for creating a new resource.
     */
    
    public function episodes($id)
    {
        $show = Show::findOrFail($id);
        $episodes = $show->episodes()->paginate(10);
        
        return view('shows.episodes', compact('show', 'episodes'));
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function create()
    {
        return view('shows.create');
    }

// ShowController.php

public function store(Request $request)
{
    // استخراج معلومات المسلسل من الطلب
    $showData = [
        'title' => $request->input('show_title', ''),
        'description' => $request->input('show_description', ''),
        'thumbnail' => $request->input('show_thumbnail', ''),
    ];

    // إنشاء مسلسل جديد
    $show = Show::create($showData);

    // ربط المسلسل بالقسم المحدد
    $show->categories()->attach($request->input('category_id'));

    return redirect()->route('admin.series.index')->with('success', 'Show created successfully!');
}




    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
