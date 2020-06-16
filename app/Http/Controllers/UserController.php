<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
use DB;




class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = User::orderBy('created_at', 'DESC')->paginate(10);

        return view('users.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //mengambil data role untuk select box
        $role = Role::orderBy('name', 'ASC')->get();

        return view('users.create', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required|string|max:30',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required|string|unique:role,name'
        ]);

        $user = User::firstOrCreate([

            'email' => $request->email
        ], [

            'name' => $request->name,
            'password' => bcrypt($request->password),
            'status' => true
        ]);

        $user->assignRole($request->role);

        return redirect(route('user.index'))->with(['simpan', 'Data User '.$user->name . ' Berhasil Ditambahkan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::findOrFail($id);

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [

            'name' => 'required|string|max:30',
            'email' => 'required|email|exists:users,email',
            'password' => 'nullable|min:6'
        ]);

        $user = User::findOrFail($id);
        $password = !empty($request->password) ? bcrypt($request->password): $user->password;

        $user->update([

            'name' => $request->name,
            'password' => $password
        ]);

        return redirect(route('user.index'))->with(['ubah' => 'User Dengan Nama ' .$user->name.' Berhasil Dirubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with(['simpan' => 'Data User Atas Nama' .$user->name. ' Berhasil Dihapus']);
    }

    public function rolepermission(Request $request)
    {
        $role = $request->get('role');
        $permission = null;
        $haspermission = null;

        $roles = Role::all()->pluck('name');

        if (!empty($role)) {
           
           $getnamerole = Role::findByName($role);
           $haspermission = DB::table('role_has_permissions')
                            ->select('permissions.name')
                            ->join('permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                            ->where('role_id', $getnamerole->id)->get()->pluck('name')->all(); 

            $permissions = Permission::all()->pluck('name');
        }

        return view('users.rolepermission', compact('roles', 'haspermission', 'permissions'));
    }

    public function addpermission(Request $request){

        $this->validate($request, [
            'name' => 'required|string|unique:permissions'
        ]);

        $permission = Permission::firstOrCreate([

            'name' => $request->name
        ]);

        return redirect()->back();
    }

    public function setrolepermission(Request $request, $role)
    {
        $role = Role::findByName($role);
        dd($role);

        
        $role->syncPermissions($request->permission);

        return redirect()->back()->with(['simpan' => 'Permission to Role Saved!']);
    }
}
