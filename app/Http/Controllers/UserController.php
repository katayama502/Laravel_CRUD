<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // ユーザーモデルを使用

class UserController extends Controller
{
    /**
     * 会員一覧を表示する
     */
    public function index()
    {
        $users = User::all(); // すべてのユーザーを取得
        return view('index', compact('users')); // ビューにユーザーを渡す
    }

    /**
     * 会員登録フォームを表示する
     */
    public function create()
    {
        return view('create'); // 登録フォームのビューを表示
    }

    /**
     * 新しい会員を保存する
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData); // ユーザーを作成

        return redirect('/users')->with('success', '新しいユーザーが登録されました。');
    }

    /**
     * 会員編集フォームを表示する
     */
    public function edit(User $user)
    {
        return view('edit', compact('user')); // 編集フォームのビューを表示
    }

    /**
     * 会員情報を更新する
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            // 'password' => 'sometimes|min:6', // パスワード更新が必要な場合はコメントを解除
        ]);

        // パスワードが入力されている場合は更新
        // if ($request->filled('password')) {
        //     $validatedData['password'] = bcrypt($request->password);
        // }

        $user->update($validatedData); // ユーザー情報を更新

        return redirect('/users')->with('success', 'ユーザー情報が更新されました。');
    }
    /**
     * 会員情報を削除する
     */    
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/users')->with('success', 'ユーザーが削除されました。');
    }

}

