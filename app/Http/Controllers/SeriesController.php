<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Show;
use App\Models\Episode;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */






    public function index()
    {
        try {
            // استرجاع قائمة المسلسلات من قاعدة البيانات
            $series = Show::orderBy('created_at', 'desc')->paginate(10);
            
            // عرض قائمة المسلسلات في العرض
            return view('admin.series.index', compact('series'));
        } catch (\Exception $e) {
            // التعامل مع الأخطاء في حال حدوثها
            return back()->withError($e->getMessage())->withInput();
        }
    }
    
public function show($id)
{
    // استرجاع المسلسل المحدد
    $show = Show::findOrFail($id);

    // استرجاع الحلقات للمسلسل المحدد
    $episodes = $show->episodes()->paginate(10);

    // عرض صفحة الحلقات مع البيانات المسترجعة
    return view('admin.series.episodes', compact('show', 'episodes'));
}

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
 

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
    public function update(Request $request, $id)
    {
        $show = Show::findOrFail($id);
    
        $show->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'thumbnail' => $request->input('thumbnail'),
        ]);
    
        // إعادة توجيه المستخدم بعد التحديث إلى صفحة العرض مع رسالة نجاح
        return redirect()->route('admin.series.index')->with('success', 'Eiposed updated successfully!');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // تحويل قيمة المعرف إلى النوع المناسب (int) إذا لزم الأمر
        $id = (int)$id;
        
        // استعادة العنصر المراد حذفه
        $show = Show::findOrFail($id);
        
        // حذف العنصر
        $show->delete();
        
        // إعادة التوجيه بعد الحذف إلى الصفحة المناسبة مع رسالة نجاح
        return redirect()->route('admin.series.index')->with('success', 'Series deleted successfully!');
    }
    
}
