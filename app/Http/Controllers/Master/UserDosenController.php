<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use App\Models\Master\DosenModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;

class UserDosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['user_dsn'] = User::where('role_id', 1)->get();
        // return $data;
        return view('pages.user.dosen.userdosen', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['dosen'] = DosenModel::whereNull('user_id')->get();
        return view('pages.user.dosen.tambahuserdosen', $data);
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
        // return $request->all();
        $validator = Validator::make($request->all(), [
            'dosen' => 'required',
            'username' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:8',

        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        $dsn = json_decode($request->dosen);
        $user = User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'uid' => Str::uuid(),
            'role_id' => 1,
        ]);

        DosenModel::where('uid', $dsn->uid)->update([
            'user_id' => $user['id']
        ]);
        return redirect('/user-dosen')->with('success', 'Berhasil tambah pengguna');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['dsn'] = User::where('uid', $id)->first();
        $data['dosen'] = DosenModel::get();
        return view('pages.user.dosen.edituserdosen', $data);
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
        // return $request->all();
        $validator = Validator::make($request->all(), [
            'email' => [
                'required',
                Rule::unique("App\Models\User", 'email')->where(
                    function ($query) use ($request) {
                        if ($request->userid) {
                            return $query
                                ->where('uid', '!=', $request->userid)
                                ->whereNull('deleted_at');
                        }

                        return $query
                            ->where('uid', $request->userid)
                            ->whereNull('deleted_at');
                    }
                ),
            ],
            'dosen' => 'required',
            'username' => 'required',
            // 'password' => 'min:8',
        ]);

        if ($validator->fails()) {
            // return response()->json($validator->errors(), 400);
            return Redirect::back()->withErrors($validator);
        }
        $dsn = json_decode($request->dosen);
        if ($request->dosen) {
            if ($request->password != null) {
                DosenModel::where('uid', $dsn->uid)->update([
                    'user_id' => null
                ]);
                User::where('uid', $id)->update([
                    'name' => $request->username,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);
                DosenModel::where('uid', $dsn->uid)->update([
                    'user_id' => $request->id
                ]);
            } else {
                DosenModel::where('uid', $dsn->uid)->update([
                    'user_id' => null
                ]);
                User::where('uid', $id)->update([
                    'name' => $request->username,
                    'email' => $request->email,
                    // 'password' => Hash::make($request->password),
                ]);
                DosenModel::where('uid', $dsn->uid)->update([
                    'user_id' => $request->id
                ]);
            }

            return redirect('/user-dosen')->with('success', 'Berhasil update data');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('uid', $id)->delete();
        return redirect('/user-dosen');
    }
}