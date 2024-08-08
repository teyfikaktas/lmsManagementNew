<?php

namespace App\Http\Livewire\ExampleLaravel;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserManagement extends Component
{
    use WithPagination;

    public $name, $email, $role;
    public $isEditing = false;
    public $editingUserId;

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email|unique:users,email',
        'role' => 'required|in:Admin,Creator,Member',
    ];

    public function render()
    {
        $users = User::paginate(10);
        return view('livewire.example-laravel.user-management', [
            'users' => $users
        ]);
    }

    public function create()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
            'password' => bcrypt('default_password'), // Güvenlik için gerçek uygulamada bu kısmı değiştirin
        ]);

        $this->resetForm();
        session()->flash('message', 'Kullanıcı başarıyla oluşturuldu.');
    }

    public function edit($id)
    {
        $this->isEditing = true;
        $this->editingUserId = $id;
        $user = User::findOrFail($id);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->role;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,' . $this->editingUserId,
            'role' => 'required|in:Admin,Creator,Member',
        ]);

        $user = User::findOrFail($this->editingUserId);
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
        ]);

        $this->resetForm();
        session()->flash('message', 'Kullanıcı başarıyla güncellendi.');
    }

    public function delete($id)
    {
        User::findOrFail($id)->delete();
        session()->flash('message', 'Kullanıcı başarıyla silindi.');
    }

    private function resetForm()
    {
        $this->name = '';
        $this->email = '';
        $this->role = '';
        $this->isEditing = false;
        $this->editingUserId = null;
    }
}