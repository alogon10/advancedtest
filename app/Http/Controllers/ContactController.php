<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
// トップページを表示
    public function index()
    {
        return view('index');
    }

// トップページ -> 内容確認ページ
    public function confirm(ContactRequest $request)
    {
        $inputs = $request->all();
        $request->session()->put('form_input', $inputs);
        return view('confirm',['inputs'=>$inputs]);
	}
    

// 内容確認ページ -> 送信完了ページ
    public function send(Request $request)
    {
        $inputs=$request->session()->get("form_input");
	//セッションに値が無い時はフォームに戻る
		if(!$inputs){
			return redirect()->action("ContactController@index");
        }
    //戻るボタンが押された時
		if($request->has("back")){
			return view('index',['inputs'=>$inputs]);
		}
    // データベースに保存
        if($inputs['gender']=="男性"){
            $gender = "0";
        };
        if($inputs['gender']=="女性"){
            $gender = "1";
        };
        $item = [
            'fullname' => $inputs['family-name'] . $inputs['first-name'],
            'gender' => $gender,
            'email' => $inputs['email'],
            'postcode' => $inputs['postcode'],
            'address' => $inputs['address'],
            'building_name' => $inputs['building_name'],
            'opinion' => $inputs['opinion'],
        ];
        Contact::create($item);
        return view('thanks');
    }


// 管理者用ページを表示
    public function admin()
    {
        $inputs = Contact::Paginate(10);
        return view('admin',['inputs' => $inputs]);
    }
// 検索 
    public function search(Request $request)
    {
        //リセットボタンが押された時
		if($request->has("back")){
            $inputs=$request->session()->get("form_input");
			return redirect ('/admin');
		}
        // 検索
        if($request->gender ==="all"){
        $inputs = Contact::where('fullname','LIKE BINARY',"%{$request->fullname}%")
        -> where('email','LIKE BINARY',"%{$request->email}%")
        -> Paginate(10);
        }else{
            $inputs = Contact::where('fullname','LIKE BINARY',"%{$request->fullname}%")
        -> where('email','LIKE BINARY',"%{$request->email}%")
        -> where('gender','LIKE BINARY',"%{$request->gender}%")
        // -> whereDate('created_at','>=',date($request->lowerDate))
        // -> whereDate('created_at','<=',date($request->upperDate))
        -> Paginate(10);
        }
        // echo $request->lowerDate;
        return view('admin',['inputs' => $inputs]);
    }
// 削除
    public function delete(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect ('/admin');
        
    }
}