<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home()
    {
        $users = User::all();
        $users = User::with(['units'])->get();
        return view('admin.users.user', compact('users'));
    }

    public function create()
    {
        $unit = Unit::get();
        return view('admin.users.create', compact('unit'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function store(Request $request)
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ];

        $customMessages = [
            'required' => 'The :attribute field is required.'
        ];

        $this->validate($request, $rules, $customMessages);

        try{

        event(new Registered($request));

            User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'unit_id' => $request['unit_id'],
                'type' => $request['tipe_id']
            ]);
            return redirect()->route('users')->with(['success' => 'Data Berhasil Disimpan!']);
        }
            catch(\Exception $e){
                return $e->getMessage();
                return redirect()->route('users_create')->with(['' => 'Data Tidak Berhasil Disimpan!']);
        }
    }

    public function destroy(Request $request)
    {
        $id=$request->id;
        $user=User::find($id);
        $user->delete();
        return redirect()->route('users')->with(['success' => 'Data Berhasil Dihapus!']);
    }


    public function edit(Request $request)
    {
        $user = User::find($request->id);
        $unit = Unit::get();
        return view('admin.users.edit', compact('user', 'unit'));
    }

    public function password_edit(Request $request)
    {
        $user = User::find($request->id);
        $unit = Unit::get();
        return view('admin.users.edit_password', compact('user', 'unit'));
    }

    public function password_update(Request $request)
    {

        $rules = [
            'password' => ['required', 'string', 'min:8'],
        ];

        $customMessages = [
            'required' => 'The :attribute field is required.'
        ];

        $this->validate($request, $rules, $customMessages);
        $id = $request->id;
        try{
            User::where('id', $request->id)->update([
                'password' => Hash::make($request['password']),
            ]);
            return redirect()->route('users')->with(['success' => 'Data Berhasil Disimpan!']);
            }
                catch(\Exception $e){
                    return $e->getMessage();
                    return redirect()->route('password_edit', $id)->with(['' => 'Data Tidak Berhasil Disimpan!']);
            }

    }

    public function update(Request $request)
    {

        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ];

        $customMessages = [
            'required' => 'The :attribute field is required.'
        ];

        $this->validate($request, $rules, $customMessages);

        try{
            User::where('id', $request->id)->update([
                'name' => $request['name'],
                'email' => $request['email'],
                'unit_id' => $request['unit_id'],
                'type' => $request['tipe_id'],

            ]);
            return redirect()->route('users')->with(['success' => 'Data Berhasil Disimpan!']);
            }
                catch(\Exception $e){
                    return $e->getMessage();
                    return redirect()->route('users_edit')->with(['' => 'Data Tidak Berhasil Disimpan!']);
            }

    }

}
