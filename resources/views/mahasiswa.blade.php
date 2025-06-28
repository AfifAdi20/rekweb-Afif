@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-gradient-primary text-white py-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-user-graduate fa-2x mr-3"></i>
                            <h2 class="mb-0">Data Mahasiswa</h2>
                        </div>
                        <button class="btn btn-light" data-bs-toggle="modal" id="btn-tambah" data-bs-target="#modal-mahasiswa">
                            <i class="fas fa-plus-circle mr-2"></i>Tambah Mahasiswa
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="table-mahasiswa">
                            <thead class="bg-light">
                                <tr>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jurusan</th>
                                    <th>Alamat</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> 

    <!-- Modal Tambah Mahasiswa -->
    <div class="modal fade" id="modal-mahasiswa" tabindex="-1" aria-labelledby="modal-mahasiswaLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-gradient-primary text-white">
                    <h5 class="modal-title" id="modal-mahasiswaLabel">
                        <i class="fas fa-user-plus mr-2"></i>Tambah Mahasiswa
                    </h5>
                    <button type="button" class="btn p-0 ms-3" data-dismiss="modal" aria-label="Close" style="background:transparent; border:none; box-shadow:none;">
                        <i class="fas fa-times" style="color:#e74c3c; font-size:2rem;"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-tambah-mahasiswa">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nim" class="form-label">NIM</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                        <input type="text" placeholder="Masukkan NIM" class="form-control" id="nim" name="nim" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        <input type="text" placeholder="Masukkan Nama" class="form-control" id="nama" name="nama" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="jk" class="form-label">Jenis Kelamin</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                                        <select class="form-select" id="jk" name="jk" required>
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="jurusan" class="form-label">Jurusan</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                                        <select class="form-select" id="jurusan" name="jurusan" required>
                                            <option value="">Pilih Jurusan</option>
                                            <option value="Teknik Informatika">Teknik Informatika</option>
                                            <option value="Sistem Informasi">Sistem Informasi</option>
                                            <option value="Manajemen">Manajemen</option>
                                            <option value="Akuntansi">Akuntansi</option>
                                            <option value="Ekonomi">Ekonomi</option>
                                            <option value="Sosial">Sosial</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                        <textarea placeholder="Masukkan Alamat" class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                <i class="fas fa-times mr-2"></i>Close
                            </button>
                            <button type="submit" class="btn btn-primary" id="btn-simpan">
                                <i class="fas fa-save mr-2"></i>Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Hapus Mahasiswa -->
    <div class="modal fade" id="hapusMahasiswa" tabindex="-1" aria-labelledby="hapusMahasiswaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="hapusMahasiswaLabel">
                        <i class="fas fa-trash-alt mr-2"></i>Hapus Mahasiswa
                    </h5>
                    <button class="btn-close btn-close-white" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-4">
                        <i class="fas fa-exclamation-triangle fa-3x text-danger mb-3"></i>
                        <p>Kamu yakin ingin menghapus data <b id="nama-hapus"></b>?</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times mr-2"></i>Close
                    </button>
                    <button type="button" class="btn btn-danger" data-nim="" id="hapus">
                        <i class="fas fa-trash-alt mr-2"></i>Hapus
                    </button>
                </div>
            </div>
        </div>
    </div>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
        }
        
        .bg-gradient-primary {
            background: linear-gradient(45deg, #4e73df 0%, #224abe 100%);
        }
        
        .table {
            border-collapse: separate;
            border-spacing: 0;
        }
        
        .table thead th {
            border-bottom: 2px solid #e3e6f0;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
        }
        
        .table tbody tr:hover {
            background-color: #f8f9fc;
            transition: all 0.2s ease;
        }
        
        .btn {
            border-radius: 5px;
            padding: 0.5rem 1rem;
            font-weight: 500;
            transition: all 0.2s ease;
        }
        
        .btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 6px rgba(50, 50, 93, 0.11), 0 1px 3px rgba(0, 0, 0, 0.08);
        }

        .btn-sm {
            padding: 0.4rem 0.8rem;
            font-size: 0.875rem;
        }

        .btn-warning {
            background-color: #f6c23e;
            border-color: #f6c23e;
            color: #fff;
        }

        .btn-warning:hover {
            background-color: #f4b619;
            border-color: #f4b619;
            color: #fff;
        }

        .btn-danger {
            background-color: #e74a3b;
            border-color: #e74a3b;
        }

        .btn-danger:hover {
            background-color: #d52a1a;
            border-color: #d52a1a;
        }

        .gap-2 {
            gap: 0.5rem !important;
        }
        
        .input-group-text {
            background-color: #f8f9fc;
            border-right: none;
        }
        
        .form-control, .form-select {
            border-left: none;
        }
        
        .form-control:focus, .form-select:focus {
            box-shadow: none;
            border-color: #d1d3e2;
        }
        
        .modal-content {
            border: none;
            border-radius: 10px;
        }
        
        .modal-header {
            border-radius: 10px 10px 0 0;
        }
        
        .btn-close-white {
            filter: brightness(0) invert(1);
        }
        
        .table-responsive {
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
        }

        /* Tooltip styling */
        [title] {
            position: relative;
            cursor: pointer;
        }

        [title]:hover::after {
            content: attr(title);
            position: absolute;
            bottom: 100%;
            left: 50%;
            transform: translateX(-50%);
            padding: 0.5rem;
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
            border-radius: 4px;
            font-size: 0.75rem;
            white-space: nowrap;
            z-index: 1000;
        }
    </style>
@endsection

@section('scripts')
    <script>
        var table;
        $(document).ready(function() {
            table = $('#table-mahasiswa').DataTable({
                ajax: "api/mahasiswa",
                order: [[0, 'desc']],
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'copy',
                        className: 'btn btn-light',
                        text: '<i class="fas fa-copy mr-2"></i>Copy'
                    },
                    {
                        extend: 'csv',
                        className: 'btn btn-light',
                        text: '<i class="fas fa-file-csv mr-2"></i>CSV'
                    },
                    {
                        extend: 'excel',
                        className: 'btn btn-light',
                        text: '<i class="fas fa-file-excel mr-2"></i>Excel'
                    },
                    {
                        extend: 'pdf',
                        className: 'btn btn-light',
                        text: '<i class="fas fa-file-pdf mr-2"></i>PDF'
                    },
                    {
                        extend: 'print',
                        className: 'btn btn-light',
                        text: '<i class="fas fa-print mr-2"></i>Print'
                    }
                ],
                columns: [
                    {data: 'nim', name: 'nim'},
                    {data: 'nama', name: 'nama'},
                    {data: 'jk', name: 'jk'},
                    {data: 'tgl_lahir', name: 'tgl_lahir'},
                    {data: 'jurusan', name: 'jurusan'},
                    {data: 'alamat', name: 'alamat'},
                    {data:'nim', render: function(data) {
                        return '<div class="d-flex justify-content-center gap-2">'+
                                    '<button type="button" class="btn btn-warning btn-sm d-flex align-items-center" id="editMahasiswa" data-bs-toggle="modal" data-target="#modal-mahasiswa" data-nim="'+data+'" title="Edit Data">'+
                                        '<i class="fas fa-edit me-1"></i> Edit'+
                                    '</button>'+
                                    '<button type="button" class="btn btn-danger btn-sm d-flex align-items-center" id="hapusModal" data-bs-toggle="modal" data-target="#hapusMahasiswa" data-nim="'+data+'" title="Hapus Data">'+
                                        '<i class="fas fa-trash-alt me-1"></i> Hapus'+
                                    '</button>'+
                                '</div>';
                    }},
                ]
            });

            $('#btn-tambah').click(function() {
                $('#btn-update').text('Simpan');
                $('#btn-update').attr('id', 'btn-simpan');
                $('#nim').val('');
                $('#nama').val('');
                $('#jk').val('');
                $('#tgl_lahir').val('');
                $('#jurusan').val('');
                $('#alamat').val('');
                $('#nim').prop('disabled', false);
                $('#modal-mahasiswa').modal('show');
            });

            var ambilData = function() {
                return {
                    nama: $('#nama').val(),
                    nim: $('#nim').val(),
                    jk: $('#jk').val(),
                    tgl_lahir: $('#tgl_lahir').val(),
                    jurusan: $('#jurusan').val(),
                    alamat: $('#alamat').val()
                }
            }

            $(document).on('click', '#btn-simpan', function(e) {
                e.preventDefault();
                var data = ambilData();
                $.ajax({
                    url: "api/mahasiswa",
                    type: "POST",
                     data: {
                        nama: data.nama,
                        nim: data.nim,
                        jk: data.jk,
                        tgl_lahir: data.tgl_lahir,
                        jurusan: data.jurusan,
                        alamat: data.alamat
                    },
                    success: function(response) {
                        table.ajax.reload();
                        $('#modal-mahasiswa').modal('hide');
                        $('#form-tambah-mahasiswa')[0].reset();
                        alert('Data berhasil ditambahkan');
                        toastr.success('Data berhasil ditambahkan');
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                        alert('Data gagal ditambahkan');
                        toastr.error('Data gagal ditambahkan');
                    }
                });
            });

            $(document).on('click', '#editMahasiswa', function(event) {
                var button = $(event.relatedTarget);
                var nim = $(this).data('nim');
                var modal = $(this);
                $('#btn-simpan').text('Update');
                $('#btn-simpan').attr('id', 'btn-update');
                $.ajax({
                    url: "api/mahasiswa/" + nim,
                    type: "GET",
                    success: function(response) {
                        console.log(response);
                        $('#nama').val(response.data.nama);
                        $('#nim').val(response.data.nim).prop('disabled', true);
                        $('#jk').val(response.data.jk);
                        $('#tgl_lahir').val(response.data.tgl_lahir);
                        $('#jurusan').val(response.data.jurusan);
                        $('#alamat').val(response.data.alamat);
                        $('#modal-mahasiswa').modal('show');
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                        alert('Data gagal diambil');
                        toastr.error('Data gagal diambil');
                    }
                });
            });

            $(document).on('click', '#btn-update', function(e) {
                e.preventDefault();
                var data = ambilData();
                $.ajax({
                    url: "api/mahasiswa/" + data.nim,
                    type: "PUT",
                    data: data,
                    success: function(response) {
                        table.ajax.reload();
                        $('#modal-mahasiswa').modal('hide');
                        $('#form-tambah-mahasiswa')[0].reset();
                        toastr.success('Data berhasil diupdate');
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                        $('#form-tambah-mahasiswa')[0].reset();
                        toastr.error('Data gagal diupdate');
                    }
                });
            });
            $(document).on('click', '#hapusModal', function(event) {
                $('#hapusMahasiswa').modal('show');
                var button = $(event.relatedTarget);
                var nim = $(this).data('nim');
                $('#hapus').data('nim', nim);
                $.ajax({    
                    url: "api/mahasiswa/" + nim,
                    type: "GET",
                    success: function(response) {
                        $('#nama-hapus').text(response.data.nama);
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                        alert('Data gagal diambil');
                        toastr.error('Data gagal diambil');
                    }
                });
            });

            $(document).on('click', '#hapus', function(event) {
                var nim = $(this).data('nim');
                console.log(nim);
                $.ajax({
                    url: "api/mahasiswa/" + nim,
                    type: "DELETE",
                    success: function(response) {
                        table.ajax.reload();
                        $('#hapusMahasiswa').modal('hide');
                        toastr.success('Data berhasil dihapus');
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                        alert('Data gagal dihapus');
                        toastr.error('Data gagal dihapus');
                    }
                });
            });
        });
    </script>
@endsection
