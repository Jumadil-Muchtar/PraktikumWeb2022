@extends('layout-index')

@section('tabel')
    
<thead>
    <tr>
        <th>No</th>
        <th class="text-center">@sortablelink('nim','NIM')</th>
        <th class="text-center">@sortablelink('nama','Nama')</th>
        <th class="text-center">@sortablelink('alamat','Alamat')</th>
        <th class="text-center">@sortablelink('fakultas','Fakultas')</th>
    </tr>
</thead>
<tbody class="table-group-divider">
    @foreach ($mahasiswa as $index=>$m)
        <tr>
            <td>{{($mahasiswa->firstItem()-1) + $loop->iteration}}</td>
            <td>{{$m->nim}}</td>
            <td>{{$m->nama}}</td>
            <td>{{$m->alamat}}</td>
            <td>{{$m->fakultas}}</td>
        </tr>
    @endforeach
</tbody>
@endsection