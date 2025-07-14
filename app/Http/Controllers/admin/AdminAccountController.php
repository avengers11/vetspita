<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Utils\Utils;
use App\Models\Pet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminAccountController extends Controller
{
    //login
    public function login()
    {
        // return $password = Hash::make('00000000');

        return view('admin.account.login');
    }
    public function loginStore(Request $request)
    {
        // authenticate
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/admin')->with('success', 'You are now logged in.');
        }

        // authentication
        return back()->withErrors(['error' => 'The provided credentials do not match our records.'])->withInput();
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->regenerateToken();

        return redirect()->intended('/admin')->with('success', 'You are now logout.');
    }

    /*
    ===========================
            user
    ===========================
    */
    function user(){
        $users = User::latest()->where('user_type', 'manager')->get();

        return view('admin.account.user.index')->with(compact('users'));
    }
    function create(){
        $roles = Role::latest()->get();

        return view('admin.account.user.create')->with(compact('roles'));
    }
    function store(Request $req){
        $req->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        try {
            $user = new User;
            $user->name = $req->name;
            $user->email = $req->email;
            $user->image = !empty($req->image) ? Utils::processFile($req->file('image'), 'users') : "placeholder.png";
            $user->password = Hash::make($req->password);
            $user->user_id = $this->generateUniqueUserId();
            $user->user_type = 'manager';
            $user->save();

            $user->assignRole($req->role);

            return redirect(route('admin.user.index'))->with(['status' => true, 'msg' => 'You are successfully created a user!']);
        } catch (\Throwable $th) {
            return redirect(route('admin.user.index'))->with(['status' => false, 'msg' => 'Error Type: '.$th]);
        }
    }
    function edit(User $user){
        $roles = Role::latest()->get();
        $roleName = count($user->getRoleNames()) > 0 ? $user->getRoleNames()[0] : "";

        return view('admin.account.user.edit')->with(compact('user', 'roles', 'roleName'));
    }
    function update(Request $req, User $user){
        $req->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'nullable',
            'role' => 'required',
        ]);


        try {
            $imgName = "";
            if(!empty($req->image)){
                $imgName = Utils::processFile($req->file('image'), 'users');
                Storage::delete($user->image);
            }else{
                $imgName = $user->image;
            }

            $user->name = $req->name;
            $user->email = $req->email;
            $user->password = empty($req->password) ? $user->password : Hash::make($req->password);
            $user->image = $imgName;
            $user->save();

            $user->syncRoles($req->role);

            return redirect(route('admin.user.index'))->with(['status' => true, 'msg' => 'You are successfully updated a user!']);
        } catch (\Throwable $th) {
            return redirect(route('admin.user.index'))->with(['status' => false, 'msg' => 'Error Type: '.$th]);
        }
    }

    // delete
    function delete(User $user)
    {
        Storage::delete($user->image);
        $user->syncRoles([]);
        $user->delete();

        return redirect(route('admin.user.index'))->with(['status' => true, 'msg' => 'You are successfully deleted a user!']);
    }

    // profile
    function profile(){
        $user = Auth::user();

        return view('admin.account.user.profile')->with(compact('user'));
    }
    function profileSubmit(Request $req){
        $user = Auth::user();

        try {
            $imgName = "";
            if(!empty($req->image)){
                $imgName = Utils::processFile($req->file('image'), 'users');
                // Storage::delete($user->image);
            }else{
                $imgName = $user->image;
            }

            $user->name = $req->name;
            $user->email = $req->email;
            $user->password = empty($req->password) ? $user->password : Hash::make($req->password);
            $user->image = $imgName;
            $user->save();

            return back()->with(['status' => true, 'msg' => 'You are successfully updated a user!']);
        } catch (\Throwable $th) {
            return back()->with(['status' => false, 'msg' => 'Error Type: '.$th]);
        }
    }



    /*
    ===========================
            ROLE
    ===========================
    */
    // role
    public function role(){
        $roles = Role::latest()->get();

        return view('admin.account.role.index')->with(compact('roles'));
    }
    public function roleCreate(){
        $permissions = Permission::get();
        $groupedPermissions = $permissions->groupBy('page_name');

        return view('admin.account.role.create')->with(compact('groupedPermissions'));
    }
    public function roleStore(Request $req){
        $req->validate([
            'name' => 'required',
            'permission' => 'required',
        ]);


        try {
            $role = Role::create(['name' => $req->name]);
            $role->syncPermissions($req->permission);

            return redirect(route('admin.role.index'))->with(['status' => true, 'msg' => 'You are successfully created a role!']);
        } catch (\Throwable $th) {
            return redirect(route('admin.role.index'))->with(['status' => false, 'msg' => 'Error Type: '.$th]);
        }
    }
    public function roleEdit(Role $role){
        $permissions = Permission::get();
        $groupedPermissions = $permissions->groupBy('page_name');

        $activePermissions = $role->permissions->pluck('name')->toArray();

        return view('admin.account.role.edit')->with(compact('groupedPermissions', 'activePermissions', 'role'));
    }
    public function roleUpdate(Request $req, Role $role){
        $req->validate([
            'name' => 'required',
            'permission' => 'required',
        ]);

        try {
            $role->name =  $req->name;
            $role->save();

            $role->syncPermissions($req->permission);

            return redirect(route('admin.role.index'))->with(['status' => true, 'msg' => 'You are successfully created a role!']);
        } catch (\Throwable $th) {
            return redirect(route('admin.role.index'))->with(['status' => false, 'msg' => 'Error Type: '.$th]);
        }
    }
    public function roleDelete(Role $role){
        try {
            if(count($role->users) > 0){
                return redirect(route('admin.role.index'))->with(['status' => false, 'msg' => 'Please remove your all users from this role & try again.!']);
            }
            $role->delete();
            return redirect(route('admin.role.index'))->with(['status' => false, 'msg' => 'You are successfully deletes a role!']);
        } catch (\Throwable $th) {
            return redirect(route('admin.role.index'))->with(['status' => false, 'msg' => 'Error Type: '.$th]);
        }
    }





    /*
    ===========================
            patient
    ===========================
    */
    public function patient(){
        $dataTypes = User::latest()->where('user_type', 'patient')->get();

        return view('admin.account.patient.index')->with(compact('dataTypes'));
    }
    public function patientCreate(){
        return view('admin.account.patient.add');
    }
    public function patientStore(Request $req){
        $req->validate([
            'name' => 'required',
            'email' => 'required',
            'number' => 'required',
            'password' => 'required',
        ]);

        try {
            $user = new User;
            $user->name = $req->name;
            $user->email = $req->email;
            $user->number = $req->number;
            $user->address = $req->address;
            $user->password = Hash::make($req->password);
            $user->image = !empty($req->image) ? Utils::processFile($req->file('image'), 'users') : "placeholder.png";
            $user->user_id = $this->generateUniqueUserId();
            $user->user_type = 'patient';
            $user->save();

            return redirect(route('admin.patient.index'))->with(['status' => true, 'msg' => 'You are successfully created a patient!']);
        } catch (\Throwable $th) {
            return redirect(route('admin.patient.index'))->with(['status' => false, 'msg' => 'Error Type: '.$th]);
        }
    }
    function generateUniqueUserId() {
        do {
            $uniqueId = mt_rand(1000000000, 9999999999);
        } while (\App\Models\User::where('user_id', $uniqueId)->exists());
    
        return $uniqueId;
    }
    public function patientEdit(User $patient){
        return view('admin.account.patient.edit')->with(compact('patient'));
    }
    public function patientUpdate(Request $req, User $patient)
    {
        try {
            $patient->name = $req->name;
            $patient->email = $req->email;
            $patient->number = $req->number;
            $patient->address = $req->address;
            $patient->password = Hash::make($req->password);
            $patient->image = !empty($req->image) ? Utils::processFile($req->file('image'), 'users') : "placeholder.png";
            $patient->save();
    
            return redirect(route('admin.patient.index'))->with(['status' => true, 'msg' => 'You are successfully created a patient!']);
        } catch (\Throwable $th) {
            return redirect(route('admin.patient.index'))->with(['status' => false, 'msg' => 'Error Type: '.$th]);
        }
    }
    public function patientDelete(User $patient){
        try {
            if (Storage::exists($patient->image)) {
                Storage::delete($patient->image);
            }
            $patient->delete();
            return redirect(route('admin.patient.index'))->with(['status' => false, 'msg' => 'You are successfully deletes a patient!']);
        } catch (\Throwable $th) {
            return redirect(route('admin.patient.index'))->with(['status' => false, 'msg' => 'Error Type: '.$th]);
        }
    }
}
