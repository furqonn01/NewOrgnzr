@extends('layouts.app')

@section('content')
<!-- ========== title-wrapper start ========== -->
<div class="title-wrapper pt-30">
    <div class="row align-items-center">
        <div class="col-md-6">
            <div class="title mb-30">
                <h2>{{ __('Daftar User') }}</h2>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
</div>
<!-- ========== title-wrapper end ========== -->

@include('sertifikat.components.modal-create')
@include('components.alert')
<div class="card-styles">
    <div class="card-style-3 mb-30">
        <div class="d-flex">
            <div class="p-1 mb-10">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#buat">
                    <i class="lni lni-plus"></i> Tambah
                </button>
            </div>
        </div>
        <div class="card-content">
            <div class="table-responsive">
                @include('sertifikat.components.table')
            </div>
            {{ $sertifs->links() }}
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $('.hapus').click(function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        var text = "{{route('sertifs.hapus', ':id')}}";
        var url = text.replace(":id", id);

        swal({
             title: "Apakah Anda yakin?",
             text: "Jika sudah terhapus, Anda tidak dapat mengembalikannya!",
             icon: "warning",
             buttons: ["Tidak", 'Ya'],
             dangerMode: true,
             cancelButtonText: "Tidak",
           }).then((willDelete) => {
               if (willDelete) {
                    $.get(url,function (data, textStatus, jqXHR) {
                        swal(data).then(()=>{
                            location.reload();
                        });
                        },
                    );
               } else {
                    swal("Sertifikat tidak jadi dihapus!");
           }
        });
    });
</script>
@endsection
