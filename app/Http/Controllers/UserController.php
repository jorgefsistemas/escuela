<?php
 namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
// use Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;



class UserController extends Controller

{
    function __construct()
    {
        // set permission
        //  $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','show']]);
        //  $this->middleware('permission:user-create', ['only' => ['create','store']]);
        //  $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
        //  $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $data = User::where('id', '!=' , 1)->orderBy('id','DESC')->paginate(5);
        return view('users.index',compact('data'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {

        $input = $request->all();
        dd($input);
        // $roles = Role::pluck('name','name')->all();
        // return view('users.create',compact('roles'));
        // Validator::make($input, [
        //     'name' => ['required', 'string', 'max:255'],
        //     'curp' => ['required', 'string', 'max:18', 'min:18', 'unique:users' ],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => $this->passwordRules(),
        //     // 'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        // ])->validate();

        return User::create([
            'name' => $input['name'],
            'curp' => $input['curp'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'curp' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            // 'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        // $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')->with('success','User created successfully');

    }
    public function store1(Request $request)
    {
        dd("llegando");
        // $this->validate($request, [
        //     'name' => 'required',
        //     'curp' => 'required',
        //     'email' => 'required|email|unique:users,email',
        //     'password' => 'required|same:confirm-password',
        //     'roles' => 'required'
        // ]);

        // $input = $request->all();
        // $input['password'] = Hash::make($input['password']);

        // $user = User::create($input);
        // $user->assignRole($request->input('roles'));

        // return redirect()->route('users.index')->with('success','User created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::where('id', '!=' , 1)->pluck('name','name')->all();
        // $array[] = $rolesint;



        $userRole = $user->roles->where('id', '!=' , 1)->pluck('name','name')->all();

        return view('users.edit',compact('user','roles','userRole'));
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);


        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')->with('success','User updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')->with('success','User deleted successfully');
    }

    public function rolesAssign(Request $request)
    {
        $id= $request->all();
        $usuario_id= intval($request['usuario']);
        $id3= $request->get('_token');
        $roles=$request->input('roles');

        $rolesint = array();

        foreach ($roles as $rol){
            //dd($rol);
            array_push($rolesint,intval($rol));
        }

       //dd("Lllegando a assignroles", $id, $usuario_id,$id3);
       $usuario = User::find($usuario_id);

       DB::table('model_has_roles')->where('model_id', $usuario_id)->delete();

       foreach($roles as $roleint){
       $usuario->assignRole([$roleint]);
       }
       return redirect()->route('users.index')->with('success','Usuario actualizado exitosamente');


       //dd($usuario);

    }

}
