<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // عرض الأقسام
    public function index()
    {
        $categories = Category::paginate(10); // عدد الفئات لكل صفحة هو 10، يمكنك تغييره حسب الحاجة
        return view('admin.categories.index', compact('categories'));
    }
    

    public function nave()
    {
        $categories = Category::all();
        return view('layouts.app', compact('categories'));
    }
    


    // عرض النموذج لإنشاء قسم جديد
    public function create()
    {
        return view('admin.categories.create');
    }

    // حفظ القسم الجديد
    public function store(Request $request)
    {
        // التحقق من صحة البيانات المدخلة
        $validatedData = $request->validate([
           
            'name' => 'required|max:190',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'description' => 'required',
            // 'meta_description' => 'required',
        ]);
    
        // حفظ الصورة في الخادم
        //$imagePath = $request->image->store('category_images');
    
        // إنشاء فئة جديدة
        $category = new Category();
      
        $category->name = $request->name;
        // $category->image = $imagePath; // حفظ مسار الصورة
        // $category->description = $request->description;
        // $category->meta_description = $request->meta_description;
     $category->save();
    
        // إعادة توجيه المستخدم بعد إضافة الفئة بنجاح
        return redirect()->route('admin.categories.index')->with('success', 'تمت إضافة الفئة بنجاح!');
    }
    

    // عرض النموذج لتعديل قسم موجود
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    // تحديث قسم موجود
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());

        return redirect()->route('admin.categories.index');
    }
    public function show($id)
    {
        // استرجاع بيانات الفئة ذات المعرف المحدد
        $category = Category::findOrFail($id);
    
        // استرجاع العروض المرتبطة بالفئة
        $shows = $category->shows;
    
        // عرض بيانات الفئة والعروض في الصفحة
        return view('category.show', compact('category', 'shows'));
    }
    
    // حذف قسم موجود
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.categories.index');
    }
}
