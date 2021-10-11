<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }


    public function create()
    {
       return view('users.create');
    }


    public function store(UserStoreRequest $request)
    {
        User::create([
            'username' => $request['username'],
            'surname' => $request['surname'],
            'name' => $request['name'],
            'patronymic' => $request['patronymic'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->route('users.index')->with('message', 'Пользователь успешно создан!');
    }


    public function show($id)
    {

    }


    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }


    public function update(UserUpdateRequest $request, User $user)
    {
        $user->update([
            'username' => $request['username'],
            'surname' => $request['surname'],
            'name' => $request['name'],
            'patronymic' => $request['patronymic'],
            'email' => $request['email'],
        ]);
        return redirect()->route('users.index')->with('message', 'Пользователь успешно обновлен!');
    }


    public function destroy(User $user)
    {
        if(auth()->user()->id == $user->id){
            return redirect()->route('users.index')->with('message', 'Вы удаляете себя. Осторожней!');
        }
        $user->delete();
        return redirect()->route('users.index')->with('message', 'Удаление прошло успешно!');
    }
}
