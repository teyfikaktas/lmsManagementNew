@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white mx-3"><strong>Kullanıcı Yönetimi</strong> - Burada kullanıcılar için düzenlemeler yapabilirsiniz.</h6>
                    </div>
                </div>
                <div class="me-3 my-3 text-end">
                    <a class="btn bg-gradient-dark mb-0" href="javascript:;" onclick="openAddUserModal()"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Yeni Kullanıcı Ekle</a>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">FOTOĞRAF</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">İSİM</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">E-POSTA</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ROL</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">OLUŞTURMA TARİHİ</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <p class="mb-0 text-sm">1</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="{{ asset('assets/img/team-2.jpg') }}" class="avatar avatar-sm me-3 border-radius-lg" alt="kullanıcı1">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">Ahmet</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs text-secondary mb-0">ahmet@ornek.com</p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">Yönetici</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">22/03/18</span>
                                    </td>
                                    <td class="align-middle">
                                        <a rel="tooltip" class="btn btn-success btn-link" href="javascript:;" onclick="openEditUserModal(1)" data-original-title="" title="">
                                            <i class="material-icons">edit</i>
                                            <div class="ripple-container"></div>
                                        </a>
                                        <button type="button" class="btn btn-danger btn-link" onclick="openDeleteUserModal(1)" data-original-title="" title="">
                                            <i class="material-icons">close</i>
                                            <div class="ripple-container"></div>
                                        </button>
                                    </td>
                                </tr>
                                <!-- Daha fazla kullanıcı satırı buraya eklenebilir -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Kullanıcı Ekleme Modalı -->
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserModalLabel">Yeni Kullanıcı Ekle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Kapat"></button>
            </div>
            <div class="modal-body">
                <form id="addUserForm">
                    @csrf
                    <div class="mb-3">
                        <label for="userName" class="form-label">İsim</label>
                        <input type="text" class="form-control" id="userName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="userEmail" class="form-label">E-posta</label>
                        <input type="email" class="form-control" id="userEmail" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="userRole" class="form-label">Rol</label>
                        <select class="form-select" id="userRole" name="role">
                            <option value="admin">Yönetici</option>
                            <option value="user">Kullanıcı</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
                <button type="button" class="btn btn-primary" onclick="addUser()">Kullanıcı Ekle</button>
            </div>
        </div>
    </div>
</div>

<!-- Kullanıcı Silme Onay Modalı -->
<div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteUserModalLabel">Kullanıcı Silme Onayı</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Kapat"></button>
            </div>
            <div class="modal-body">
                Bu kullanıcıyı silmek istediğinizden emin misiniz?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
                <button type="button" class="btn btn-danger" onclick="deleteUser()">Sil</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function openAddUserModal() {
        var modal = new bootstrap.Modal(document.getElementById('addUserModal'));
        modal.show();
    }

    function openEditUserModal(userId) {
        // Burada düzenleme modalını açma ve kullanıcı bilgilerini yükleme işlemleri yapılabilir
        console.log('Kullanıcı düzenleme modalı açıldı, Kullanıcı ID:', userId);
    }

    function openDeleteUserModal(userId) {
        var modal = new bootstrap.Modal(document.getElementById('deleteUserModal'));
        modal.show();
        // Silme işlemi için kullanıcı ID'sini saklayabilirsiniz
        document.getElementById('deleteUserModal').setAttribute('data-user-id', userId);
    }

    function addUser() {
        // Kullanıcı ekleme işlemi burada yapılacak
        var name = document.getElementById('userName').value;
        var email = document.getElementById('userEmail').value;
        var role = document.getElementById('userRole').value;
        console.log('Yeni kullanıcı eklendi:', {name, email, role});
        // Modal'ı kapatma
        var modal = bootstrap.Modal.getInstance(document.getElementById('addUserModal'));
        modal.hide();
    }

    function deleteUser() {
        var userId = document.getElementById('deleteUserModal').getAttribute('data-user-id');
        console.log('Kullanıcı silindi, ID:', userId);
        // Silme işlemi burada yapılacak
        // Modal'ı kapatma
        var modal = bootstrap.Modal.getInstance(document.getElementById('deleteUserModal'));
        modal.hide();
    }
</script>
@endpush