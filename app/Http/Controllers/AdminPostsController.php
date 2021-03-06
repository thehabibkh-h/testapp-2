<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\PostsRequest;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

use App\Post as Post;
use App\Photo as Photo;
use App\Category as Category;
use App\Comment as Comment;



class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $posts = Post::all();

       

        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories_list = Category::lists('name','id')->all();

        return view('admin.posts.create',compact('categories_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsRequest $request)
    {
        //

        $user = Auth::user();

        $input = $request->all();
        
        if($file = $request->file('photo_id')){
            
            
            $name = time().$file->getClientOriginalName();

            $file->move('image',$name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;

        }

        $user->post()->create($input);



        return redirect('admin/posts');

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
        $post = Post::findOrFail($id);
        $categories_list = Category::lists('name','id')->all();

        return view('admin.posts.edit',compact('post','categories_list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostsRequest $request, $id)
    {
        //
        $post = Post::findOrFail($id);
        $input = $request->all();

        if($file = $request->file('photo_id')){
            $name = time().$file->getClientOriginalName();

            $file->move('image',$name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;
        }

        $post->update($input);

        return redirect('/admin/posts');

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
        $post = Post::findOrFail($id);

        $photo_path = public_path($post->photo->file);

        if(File::exists($photo_path)) {
          
            File::delete($photo_path);
        }
      
        $post->photo()->delete();

        $post->delete();

        Session::flash('deleted_post','The post has been deleted');

        return redirect('/admin/posts');
    }


    public function post($id){

        $post = Post::findOrFail($id);
        $comments = Comment::where('post_id',$id)->whereIsActive(1)->get();
      
        return view('post',compact('post','comments','replies'));

    }

}
