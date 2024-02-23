<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use Cloudinary;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
        $posts = $post->orderBy('created_at','desc')->get();
        return view("posts.index")->with(['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        // 送られてきたデータの中身を見たいときはdd()を使う。
        // dd($request->body);
        // $request->validate([
        //     'post.body' => 'required|string',
        //     'image_url' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // 画像のバリデーション
        // ]);

        // データベースに保存
        $input = $request['post'];
        if($request->file('image')){ //画像ファイルが送られた時だけ処理が実行される
            $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
            $input += ['image_url' => $image_url];
        }
        $input += ['user_id' => auth()->user()->id];
        $post->fill($input)->save();

        // リダイレクトまたは適切な応答を返す
        return redirect()->route('posts.index')->with('success', '投稿が成功しました！');
    
        
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
    
    // 編集ページを表示する処理
    public function edit(Post $post)
    {
        return view('posts.edit')->with(['post' => $post]);
    }

    // 編集する処理
    public function update(Post $post, Request $request)
    {
        // データベースに保存
        $input = $request['post'];
        if($request->file('image')){ //画像ファイルが送られた時だけ処理が実行される
            $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
            $input += ['image_url' => $image_url];
        }
        $post->fill($input)->save();// データベースに保存
        return redirect('/');
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
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
    
}
