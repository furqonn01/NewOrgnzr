<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th class="text-center p-3">
                <h6>No</h6>
            </th>
            <th class="text-center p-3">
                <h6>Nama Sertifikat</h6>
            </th>
            <th class="text-center p-3">
                <h6>Keterangan</h6>
            </th>
            <th class="text-center p-3">
                <h6>Sertifikat</h6>
            </th>
            <th class="text-center p-3">
                <h6>Tanggal Upload</h6>
            </th>
            <th class="text-center p-3">
                <h6>Aksi</h6>
            </th>
        </tr>
        <!-- end table row-->
    </thead>
    <tbody>
        @foreach($sertifs as $sertif)
        <tr>
            <td class="text-center p-2">{{$sertif->no}}</td>
            <td class="text-center p-2"><b>{{$sertif->nama}}</b></td>
            <td class="text-center p-2">{{$sertif->ket}}</td>
            <td class="text-center p-2">
                <a href="{{url('sertif/' . auth()->user()->id . '/'. $sertif->nama_file) }}" target="blank"><i
                        class="lni lni-download"></i></a>
            </td>
            <td class="text-center p-2">{{date('Y-m-d', strtotime($sertif->created_at))}}</td>
            <td class="text-center p-2">
                <button class="btn btn-danger hapus" data-id="{{$sertif->id}}"><i
                        class="lni lni-trash-can"></i></button>
            </td>
        </tr>
        @endforeach
        @if ($sertifs->count() == 0)
        <td colspan="6" class="text-center p-2"><span class=" badge bg-danger-500 mb-20">Data Kosong</span></td>
        @endif
        <!-- end table row -->
    </tbody>
</table>
<!-- end table -->
