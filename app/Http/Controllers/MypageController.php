<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Health;
use App\Models\Meal;
use Cloudinary;
use Carbon\Carbon;

class MypageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Health $health, Meal $meal)
    {
        $healths = $health->orderBy('created_at', 'desc')->take(7)->get();
        $meals = $meal->get();
        return view("mypage.index")->with(["healths" => $healths, "meals" => $meals]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("mypage.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function weight_store(Request $request, Health $health)
    {
        // 一日1回の投稿制限
        $check_daypost = $health->whereDate('created_at', Carbon::today())->exists();
        if($check_daypost) {
            return redirect()->back()->with('error', '本日は投稿済みです。');
        }
        $user = auth()->user();
        $input = $request["health"];
        $health->user_id = $user->id;
        $health->fill($input)->save();
        return redirect()->route('mypage.index');
    }
    
    public function weight_edit(Health $health) {
        // 体重記録更新ページ表示処理
        return view("mypage.edit")->with(["health" => $health]);
    }
    
    public function weight_update(Request $request,Health $health) {
        // 体重記録更新の処理
        $input = $request["health"];
        $health->fill($input)->save();
        return redirect('/mypage/weight/edit/' . $health->id);
        
    }
    
    // 月単位の体重記録を表示
    public function weight_month(Health $health)
    {
        $healths = $health->orderBy('created_at', 'desc')->take(31)->get();

        return view("mypage.month")->with(["healths" => $healths]);
    }
    
     public function meal_store(Request $request, Meal $meal)
     {
         
         if($request->file('image')){ //画像ファイルが送られた時だけ処理が実行される
            $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
            $meal->image_url = $image_url;
        }
        $meal->save();

        // リダイレクトまたは適切な応答を返す
        return redirect()->route('mypage.index');
    
         
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
}
