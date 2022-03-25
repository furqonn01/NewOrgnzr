<div class="modal fade" id="buat" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content card-style">
            <div class="modal-header px-0 border-0">
                <h5 class="text-bold">
                    Buat User Baru
                </h5>
            </div>
            <form action="{{route('user.post')}}" method="POST">
                @csrf
                <div class="modal-body px-0">
                    <div class="content mb-30">
                        <div class="input-style-1">
                            <label>Nama User</label>
                            <input type="text" name="nama" placeholder="Nama User" />
                        </div>
                        <div class="input-style-1">
                            <label>Email User</label>
                            <input type="email" name="email" placeholder="Email User" />
                        </div>
                        <div class="select-style-1">
                            <label>Level</label>
                            <div class="select-position">
                                <select name="level">
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="action d-flex flex-wrap justify-content-end">
                        <button data-bs-dismiss="modal" type="button" class="main-btn danger-btn-outline btn-hover m-1">
                            Batal
                        </button>
                        <button class="main-btn primary-btn btn-hover m-1">
                            Simpan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
