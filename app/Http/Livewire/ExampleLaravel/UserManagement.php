<?php

namespace App\Http\Livewire\ExampleLaravel;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;

class UserManagement extends Component
{
    use WithPagination;

    public $name, $email, $phone, $location, $about, $password;
    public $teacher_name, $class_code, $is_teacher;
    public $isEditing = false;
    public $editingUserId;

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email|unique:users,email',
        'phone' => 'nullable',
        'location' => 'nullable',
        'about' => 'nullable',
        'teacher_name' => 'nullable',
        'class_code' => 'nullable',
        'is_teacher' => 'boolean',
        'password' => 'required|min:6',
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
            'phone' => $this->phone,
            'location' => $this->location,
            'about' => $this->about,
            'teacher_name' => $this->teacher_name,
            'class_code' => $this->class_code,
            'is_teacher' => $this->is_teacher,
            'password' => Hash::make($this->password),
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
        $this->phone = $user->phone;
        $this->location = $user->location;
        $this->about = $user->about;
        $this->teacher_name = $user->teacher_name;
        $this->class_code = $user->class_code;
        $this->is_teacher = $user->is_teacher;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,' . $this->editingUserId,
            'phone' => 'nullable',
            'location' => 'nullable',
            'about' => 'nullable',
            'teacher_name' => 'nullable',
            'class_code' => 'nullable',
            'is_teacher' => 'boolean',
        ]);

        $user = User::findOrFail($this->editingUserId);
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'location' => $this->location,
            'about' => $this->about,
            'teacher_name' => $this->teacher_name,
            'class_code' => $this->class_code,
            'is_teacher' => $this->is_teacher,
        ]);

        $this->resetForm();
        session()->flash('message', 'Kullanıcı başarıyla güncellendi.');
    }

    public function resetForm()
    {
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->location = '';
        $this->about = '';
        $this->teacher_name = '';
        $this->class_code = '';
        $this->is_teacher = false;
        $this->password = '';
        $this->isEditing = false;
        $this->editingUserId = null;
    }
}