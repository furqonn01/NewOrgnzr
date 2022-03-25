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
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center p-3">
                                <h6>No</h6>
                            </th>
                            <th class="text-center p-3">
                                <h6>Nama</h6>
                            </th>
                            <th class="text-center p-3">
                                <h6>Email</h6>
                            </th>
                            <th class="text-center p-3">
                                <h6>Level</h6>
                            </th>
                            <th class="text-center p-3">
                                <h6>Aksi</h6>
                            </th>
                        </tr>
                        <!-- end table row-->
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td class="text-center p-2">
                                {{($users->currentPage() - 1)  * $users->links()->paginator->perPage() + $loop->iteration}}
                            </td>
                            <td class="text-center p-2">
                                <p>{{ $user->name }}</p>
                            </td>
                            <td class="text-center p-2">
                                <p>{{ $user->email }}</p>
                            </td>
                            <td class="text-center p-2">
                                <p>{{ $user->level }}</p>
                            </td>
                            <td class="text-center p-2">
                                {{-- <button class="btn btn-warning edit mb-1" data-id="{{$user->id}}" data-bs-toggle="modal"
                                    data-bs-target="#edit"><i class="lni lni-pencil"></i></button> --}}
                                <button class="btn btn-danger hapus mb-1" data-id="{{$user->id}}"><i
                                        class="lni lni-trash-can"></i></button>
                            </td>
                        </tr>
                        @endforeach
                        <!-- end table row -->
                    </tbody>
                </table>
                <!-- end table -->
                {{ $users->links() }}
                @include('users.modal-create')
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $('.hapus').click(function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        var text = "{{route('users.hapus', ':id')}}";
        var url = text.replace(":id", id);

        swal({
             title: "Apakah Anda yakin?",
             text: "Jika sudah terhapus, Anda tidak dapat mengembalikannya!",
             icon: "warning",
             buttons: ["Tidak", 'Ya'],
             dangerMode: true,
             cancelButtonText: "Tidak",
           })
          .then((willDelete) => {
               if (willDelete) {
                    $.get(url,function (data, textStatus, jqXHR) {
                        swal(data).then(()=>{
                            location.reload();
                        });
                        },
                    );
               } else {
                    swal("Akun tidak jadi dihapus!");
           }
        });
    });
</script>
@endsection
