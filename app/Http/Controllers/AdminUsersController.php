<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UsersRequest;


use App\User;
use App\Role;
use App\Photo;
use App\Post;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::all();

        $roles_list = [];

        foreach ($roles as $role) {
            
            $roles_list[$role->id] =  $role->name;

        }


        
        return view('admin.users.create',compact('roles_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        //

        $input = $request->all();

        //gettype($request->file('photos_id'));
     

       if($file = $request->file('photo_id')){
            
            
            $name = time().$file->getClientOriginalName();

            $file->move('image',$name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;

        }

    
        $input['password'] = bcrypt($request->password);

        User::create($input);
        
        return redirect('/admin/users');
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
        $user = User::findorfail($id);

        //Roles list
        $roles = Role::lists('name','id')->all();

        return view('admin.users.edit',compact('user','roles'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersRequest $request, $id)
    {
        //

        $user = User::findOrFail($id);
        

        if( $request->password == '' ){
            $input = $request->except('password');
        }else{
            $input = $request->all();
            
        }

        //Traitement photo

        if($file = $request->file('photo_id')){
            
            
            $name = time().$file->getClientOriginalName();

            $file->move('image',$name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;

        }
        
        

        $user->update($input);

        return redirect('/admin/users');
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
        
        $posts = Post::where('user_id',$id)->get();

        foreach ($posts as $post) {
            $image_path = public_path($post->photo->file);

            if(File::exists($image_path)) {
                    File::delete($image_path);
                }



        };


        $user = User::findOrFail($id)->delete();


        Session::flash('deleted_user','The user has been deleted');

        return redirect('/admin/users');
    }
}
