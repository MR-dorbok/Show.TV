<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Show;
use App\Models\Episode;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

       
     public function index()
     {
         $users = User::query()->paginate(10); // استخدم query() لتكوين استعلام يمكن تطبيق paginate عليه
         return view('admin.users.index', compact('users'));
     }
       
   


    // UserController.php

public function showProfile()
{
    $user = Auth::user(); // احصل على بيانات المستخدم المسجل الحالي
    return view('auth.profile', compact('user'));
}
public function show($id)
{
    $user = User::findOrFail($id); // ابحث عن المستخدم باستخدام المعرف الممرر
    return view('auth.profile', compact('user'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'avatar' => 'nullable|image',
            'phone' => 'nullable|string|max:255',
            'edit' => 'nullable|boolean',
            'delete' => 'nullable|boolean',
            'role' => 'required|integer',
        ]);
    
        // Store the user's avatar if it's included in the request
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars');
        }
    
        // Create a new user instance
        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'avatar' => $avatarPath ?? null,
            'phone' => $request->input('phone'),
            'edit' => $request->input('edit', false),
            'delete' => $request->input('delete', false),
            'role' => $request->input('role'),
        ]);
    
        // Save the user to the database
        $user->save();


        // Redirect the user back to the index page with a success message
        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }
    

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // البحث عن المستخدم باستخدام الهوية المميزة
        $user = User::find($id);

        // التحقق مما إذا كان المستخدم موجودًا
        if (!$user) {
            abort(404); // عندما لا يتم العثور على المستخدم، أرجع 404
        }

        // إرجاع عرض التحرير مع بيانات المستخدم
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        // تحقق من وجود قيمة لحقل الباسورد
        if (!empty($request->password)) {
            $request->validate([
                'password' => 'required|min:8',
            ]);
            $user->password = Hash::make($request->password);
        }
    
        // تحديث باقي الحقول
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->edit = $request->edit ?? 0;
        $user->delete = $request->delete ?? 0;
    
        $user->save();
    
        return redirect()->route('admin.users.index')->with('success', 'User updated successfully');
    }
    


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
