<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th class="text-center">
                <h6>Name Sertifikat</h6>
            </th>
            <th class="text-center">
                <h6>Keterangan</h6>
            </th>
            <th class="text-center">
                <h6>Sertifikat</h6>
            </th>
            <th class="text-center">
                <h6>Tanggal Upload</h6>
            </th>
            <th class="text-center">
                <h6>Aksi</h6>
            </th>
        </tr>
        <!-- end table row-->
    </thead>
    <tbody>
        @foreach($sertifs as $sertif)
        <tr>
            <td class="text-center"><b>{{$sertif->nama}}</b></td>
            <td class="text-center">{{$sertif->ket}}</td>
            <td class="text-center">
                <a href="{{url('sertif/' . auth()->user()->id . '/'. $sertif->nama_file) }}" target="blank"><i
                        class="lni lni-download"></i></a>
            </td>
            <td class="text-center">{{date('Y-m-d', strtotime($sertif->created_at))}}</td>
            <td class="text-center">
                <button class="btn btn-danger hapus" data-id="{{$sertif->id}}"><i
                        class="lni lni-trash-can"></i></button>
            </td>
        </tr>
        @endforeach
        @if ($sertifs->count() == 0)
        <td colspan="5" class="text-center"><span class=" badge bg-danger-500 mb-20">Data Kosong</span></td>
        @endif
        <!-- end table row -->
    </tbody>
</table>
<!-- end table -->
