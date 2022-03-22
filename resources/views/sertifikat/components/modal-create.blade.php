<div class="modal fade" id="buat" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content card-style">
            <div class="modal-header px-0 border-0">
                <h5 class="text-bold">
                    Upload Sertifikat Baru
                </h5>
            </div>
            <form action="{{route('sertifs.post')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body px-0">
                    <div class="content mb-30">
                        <div class="input-style-1">
                            <label>Nama Sertifikat</label>
                            <input type="text" name="nama" placeholder="Nama Sertifikat" />
                        </div>
                        <div class="input-style-1">
                            <label>Keterangan Sertifikat</label>
                            <input type="text" name="ket" placeholder="Keterangan dari Sertifikat" />
                        </div>
                        <div class="input-style-1">
                            <label>File Sertifikat</label>
                            <input type="file" name="file" />
                        </div>
                    </div>
                    <div class="action d-flex flex-wrap justify-content-end">
                        <button data-bs-dismiss="modal" type="button" class="main-btn danger-btn-outline btn-hover m-1">
                            Batal
                        </button>
                        <button data-bs-dismiss="modal" class="main-btn primary-btn btn-hover m-1">
                            Simpan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
