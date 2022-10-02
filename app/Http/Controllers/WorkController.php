<?php

namespace App\Http\Controllers;

use App\Work;
use App\Category;
use App\Chat;
use App\Http\Requests\WorkRequest; 
use Illuminate\Http\Request;

class WorkController extends Controller
{
    public function user(){
        return view('works/user');
        // return view('works/user')->with(['works' => Auth::user()->work()]);
    }
    
    public function index(Work $work){
        return view('works/index')->with(['works' => $work->getPaginateByLimit()]);  
    }
    
    public function show(Work $work){
        return view('works/show')->with(['work' => $work]);
    }
    
    public function create(Category $category){
        return view('works/create')->with(['categories' => $category->get()]);
    }
    
    public function store(WorkRequest $request, Work $work){
        $input = $request['work'];
        $work->fill($input)->save();
        return redirect('/works/' . $work->id);
    }
    
    public function edit(Work $work,Category $category)
    {
        return view('works/edit')->with(['work' => $work,'categories' => $category->get()]);
    }
    
    public function bookmark_register(Request $request, Work $work)
    {
        $user_id = $request['user_id'];
        $work_id = $request['work_id'];
        
        //attachメソッドを使って中間テーブルにデータを保存
        $work = Work::find($work_id);
        $work->users()->attach($user_id); 
        return redirect('/');
    }
    
    public function bookmark_delete(Request $request, Work $work)
    {
        $user_id = $request['user_id'];
        $work_id = $request['work_id'];
        
        //attachメソッドを使って中間テーブルにデータを保存
        $work = Work::find($work_id);
        $work->users()->detach($user_id); 
        return redirect('/');
    }

    public function upload(Request $request,Work $work)
    {
        // ディレクトリ名
        $dir = 'sample';

        // アップロードされたファイル名を取得
        $file_name = $request->file('image')->getClientOriginalName();

        // 取得したファイル名で保存
        $request->file('image')->storeAs('public/' . $dir, $file_name);

        // ファイル情報をDBに保存
        $work->image = 'storage/' . $dir . '/' . $file_name;
        $work->save();

        return redirect('/works/'.$work->id);
    }
    
    // public function chat(Work $work)
    // {
    //     $chats = $work->chats()->get();
    //     return view('works/chat')->with(['work' => $work,'chats' => $chats]);  
    // }
    
    public function chat(Work $work)
    {
        $chats = $work->chats()->get();
        return view('works/chat')->with(['work' => $work]);  
    }

    public function chat_save(Request $request ,Work $work ,Chat $chat){
        $input = $request['chat'];
        $chat->fill($input)->save();
        return redirect('/works/'.$work->id.'/chat');
    }    
    
}
?>
