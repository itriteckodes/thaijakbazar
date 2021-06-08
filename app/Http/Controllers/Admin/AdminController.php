<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Validate;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\AssingRole;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins= Admin::where('id','!=',1)->where('id','!=',Auth::user()->id)->get();
        return view('admin.add_admin.index')->with('admins',$admins); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $credentials = Validate::Adminregister($request, Admin::class, true);
        $admin = Admin::create($credentials);
        if($request->roles){
            foreach($request->roles as $role){
                AssingRole::create([
                    'admin_id' => $admin->id,
                    'role_id' => $role
                ]);
            }
        }
        toastr()->success('Admin Added');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        $roles = Role::all();
        return view('admin.add_admin.edit')->with('admin',$admin)->with('roles',$roles);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        $admin->update($request->all());
        
        if($request->roles){
            $roles = AssingRole::where('admin_id',$admin->id)->delete();
            foreach($request->roles as $role){
                AssingRole::create([
                    'admin_id' => $admin->id,
                    'role_id' => $role
                ]);
            }
        }
        toastr()->success('Admin Updated', 'Done');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();
        toastr()->success('Admin Deleted', 'Done');
        return redirect()->back();
    }
}
