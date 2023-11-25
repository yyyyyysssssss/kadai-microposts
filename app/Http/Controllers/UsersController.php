<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;                        
use App\Models\User; 

class UsersController extends Controller
{
    public function index()                                        
    {                                                       
        // ユーザ一覧をidの降順で取得
        $users = User::orderBy('id', 'desc')->paginate(10); 

        // ユーザ一覧ビューでそれを表示
        return view('users.index', [                        
            'users' => $users,                              
        ]);                                                 
    }                                                       
    
    public function show($id)                               
    {                     
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);
        
        // 関係するモデルの件数をロード
        $user->loadRelationshipCounts();
        
        // ユーザーの投稿一覧を作成日時の降順で取得
        $microposts = $user->microposts()->orderBy('created_at', 'desc')->paginate(10);

        // ユーザ詳細ビューでそれを表示
        return view('users.show', [
            'user' => $user,
            'microposts' => $microposts,
        ]);
    }
    
    public function followings($id)
    {
        $user = User::findOrFail ($id);
        $user->loadRelationshipCounts();
        $followings =$user->followings()->paginete(10);
        
        return view('users.followings', [
            'user' => $user,
            'user' => $followings,
        ]);
    }
    
    public function followers($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);

        // 関係するモデルの件数をロード
        $user->loadRelationshipCounts();

        // ユーザのフォロワー一覧を取得
        $followers = $user->followers()->paginate(10);

        // フォロワー一覧ビューでそれらを表示
        return view('users.followers', [
            'user' => $user,
            'users' => $followers,
        ]);
    }
}
