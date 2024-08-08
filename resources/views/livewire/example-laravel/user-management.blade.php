<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white mx-3">Kullanıcı Yönetimi</h6>
                    </div>
                </div>

                @if (session()->has('message'))
                    <div class="alert alert-success mx-3">
                        {{ session('message') }}
                    </div>
                @endif

                @if (auth()->check() && auth()->user()->is_teacher)
                    <div class="alert alert-info mx-3">
                        Öğretmensiniz
                    </div>
                @endif
                
                @if($isEditing && auth()->user()->is_teacher)
                <div class="card-body">
                    <form wire:submit.prevent="{{ $editingUserId ? 'update' : 'create' }}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="my-3">
                                    <label class="form-label">Ad:</label>
                                    <div class="input-group input-group-outline">
                                        <input type="text" class="form-control" wire:model="name">
                                    </div>
                                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="my-3">
                                    <label class="form-label">E-posta:</label>
                                    <div class="input-group input-group-outline">
                                        <input type="email" class="form-control" wire:model="email">
                                    </div>
                                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="my-3">
                                    <label class="form-label">Telefon:</label>
                                    <div class="input-group input-group-outline">
                                        <input type="text" class="form-control" wire:model="phone">
                                    </div>
                                    @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="my-3">
                                    <label class="form-label">Konum:</label>
                                    <div class="input-group input-group-outline">
                                        <input type="text" class="form-control" wire:model="location">
                                    </div>
                                    @error('location') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="my-3">
                                    <label class="form-label">Öğretmen Adı:</label>
                                    <div class="input-group input-group-outline">
                                        <input type="text" class="form-control" wire:model="teacher_name">
                                    </div>
                                    @error('teacher_name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="my-3">
                                    <label class="form-label">Sınıf Kodu:</label>
                                    <div class="input-group input-group-outline">
                                        <input type="text" class="form-control" wire:model="class_code">
                                    </div>
                                    @error('class_code') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="my-3">
    <label class="form-label">Öğretmen mi?</label>
    <div class="form-check">
    <input class="form-check-input" type="checkbox" wire:model="is_teacher">
                <label class="form-check-label">Evet</label>
    </div>
    @error('is_teacher') <span class="text-danger">{{ $message }}</span> @enderror
</div>


                        <div class="my-3">
                            <label class="form-label">Hakkında:</label>
                            <div class="input-group input-group-outline">
                                <textarea class="form-control" wire:model="about" rows="3"></textarea>
                            </div>
                            @error('about') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        @if(!$editingUserId)
                        <div class="my-3">
                            <label class="form-label">Şifre:</label>
                            <div class="input-group input-group-outline">
                                <input type="password" class="form-control" wire:model="password">
                            </div>
                            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        @endif
                        <button type="submit" class="btn btn-primary">{{ $editingUserId ? 'Güncelle' : 'Oluştur' }}</button>
                        <button type="button" class="btn btn-secondary" wire:click="resetForm">İptal</button>
                    </form>
                </div>
                @elseif(auth()->user()->is_teacher)
                    <div class="me-3 my-3 text-end">
                        <a class="btn bg-gradient-dark mb-0" href="javascript:;" wire:click="$set('isEditing', true)">
                            <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Yeni Kullanıcı Ekle
                        </a>
                    </div>
                @endif

                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ad</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">E-posta</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Telefon</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Konum</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Öğretmen Adı</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sınıf Kodu</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Öğretmen mi?</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Oluşturulma Tarihi</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <p class="mb-0 text-sm">{{ $user->id }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $user->name }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs text-secondary mb-0">{{ $user->email }}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs text-secondary mb-0">{{ $user->phone }}</p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{ $user->location }}</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{ $user->teacher_name }}</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{ $user->class_code }}</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{ $user->is_teacher ? 'Evet' : 'Hayır' }}</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{ $user->created_at->format('d/m/y') }}</span>
                                    </td>
                                    <td class="align-middle">
                                        @if(auth()->user()->is_teacher)
                                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" wire:click="edit({{ $user->id }})">
                                            Düzenle
                                        </a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>