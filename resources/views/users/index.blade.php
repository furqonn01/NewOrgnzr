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

<div class="card-styles">
    <div class="card-style-3 mb-30">
        <div class="card-content">

            @include('components.alert')

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">
                                <h6>Name</h6>
                            </th>
                            <th class="text-center">
                                <h6>Email</h6>
                            </th>
                            <th class="text-center">
                                <h6>Level</h6>
                            </th>
                            <th class="text-center">
                                <h6>Aksi</h6>
                            </th>
                        </tr>
                        <!-- end table row-->
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td class="text-center">
                                <p>{{ $user->name }}</p>
                            </td>
                            <td class="text-center">
                                <p>{{ $user->email }}</p>
                            </td>
                            <td class="text-center">
                                <p>{{ $user->level }}</p>
                            </td>
                            <td class="text-center">
                                <button class="btn btn-danger hapus" data-id="{{$user->id}}"><i
                                        class="lni lni-trash-can"></i></button>
                            </td>
                        </tr>
                        @endforeach
                        <!-- end table row -->
                    </tbody>
                </table>
                <!-- end table -->

                {{ $users->links() }}
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
