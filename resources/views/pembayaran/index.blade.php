@extends('template.main')


@section('konten')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Pembayaran</h1>
        <p class="mb-4">Manajemen Spp | Inventory Spp</p>


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">CRUD Laravel
                    <button class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#tambahData">Tambah
                        Data</button>
                </h6>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th>Tanggal Pembayaran</th>
                                <th>Jumlah</th>
                                <th>Aksi</th>
                        </thead>
                        <tbody>
                            @php
                            $no = 1; @endphp
                            @foreach ($pembayaran as $row)
                                <tr>
                                    <td width="5%">{{ $no++ }}</td>
                                    <td>{{ $row->nama }}</td>
                                    <td>{{ $row->tgl_bayar }}</td>
                                    <td>{{ $row->jumlah }}</td>
                                    <td>
                                        <form action="{{ route('pembayaran.delete', $row->id) }}" method="post" class="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger delete-button" onclick="return confirmDelete(event)">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>


                                        <a href="#" class="btn btn-sm btn-warning mt-2" data-toggle="modal"
                                            data-target="#editModal{{ $row->id }}"><i class="fas fa-pencil-alt"></i></a>

                                        <!-- Edit Modal -->
                                        <div class="modal fade" id="editModal{{ $row->id }}" tabindex="-1"
                                            role="dialog" aria- labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog modal-dialog-centered modal- dialog-scrollable"
                                                role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Siswa</h5>
                                                        <button class="close" type="button" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('pembayaran.update', $row->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="form-group">
                                                                <label for="nama">Nama Siswa</label>
                                                                <input type="text" class="form-control" id="nama"
                                                                    name="nama" value="{{ $row->nama }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="tanggal">Tanggal Pembayaran</label>
                                                                <input type="date" class="form-control" id="tgl_bayar"
                                                                    name="tgl_bayar" value="{{ $row->tgl_bayar }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="jumlah">Jumlah</label>
                                                                <input type="number" class="form-control" id="jumlah"
                                                                    name="jumlah" value="{{ $row->jumlah }}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary" type="button" data-
                                                                    dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-primary">Save
                                                                    Changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Tambah Data Modal -->
    <div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria- labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-dialog-centered modal- dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('pembayaran/save') }}" method="POST"> @csrf
                        <div class="form-group">
                            <label for="nama">Nama Siswa</label>
                            <input type="text" class="form-control" id="nama" aria-describedby="nama"
                                name="nama">


                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal Pembayaran</label>
                            <input type="date" class="form-control" id="tgl_bayar" name="tgl_bayar">
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="number" class="form-control" id="jumlah" name="jumlah">
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data- dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-primary" value="Simpan" name="simpan">
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')

<script>
    function confirmDelete(event) {
        event.preventDefault(); // Prevent the default form submission behavior
        const form = event.target.closest('.delete-form');

        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: 'Anda tidak akan dapat mengembalikan data ini!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus saja!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit(); // If confirmed, proceed with form submission
            }
        });
    }
</script>

    <script>
        @if ($message = Session::get('dataTambah'))
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.kdEventListener('mouseleave', Swal.resumeTImer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: 'Data Barang Berhasil Ditambah'
            })
        @endif
    </script>
    <script>
        @if ($message = Session::get('dataDelete'))
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer);
                    toast.addEventListener('mouseleave', Swal.resumeTimer);
                }
            });

            Toast.fire({
                icon: 'error',
                title: 'Data Berhasil Dihapus'
            });
        @endif

        @if ($message = Session::get('dataEdit'))
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer);
                    toast.addEventListener('mouseleave', Swal.resumeTimer);
                }
            });

            Toast.fire({
                icon: 'success',
                title: 'Data Berhasil Diperbarui'
            });
        @endif
    </script>


@endsection
