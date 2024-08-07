<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Kullanıcıların listesini göster.
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Yeni kullanıcı oluşturma formunu göster.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Yeni kullanıcıyı veritabanına kaydet.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required|in:Admin,Creator,Member',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'role' => $validatedData['role'],
        ]);

        return redirect()->route('users.index')->with('success', 'Kullanıcı başarıyla oluşturuldu.');
    }

    /**
     * Belirli bir kullanıcının detaylarını göster.
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Kullanıcı düzenleme formunu göster.
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Veritabanında kullanıcı bilgilerini güncelle.
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:Admin,Creator,Member',
        ]);

        $user->update($validatedData);

        return redirect()->route('users.index')->with('success', 'Kullanıcı başarıyla güncellendi.');
    }

    /**
     * Belirtilen kullanıcıyı veritabanından sil.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Kullanıcı başarıyla silindi.');
    }
}