@extends('layouts.app')
@section('title', 'Jenis Barang Non-PC')
@section('content')
<x-head-datatable/>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card w-100">
                <div class="card-header row">
                    <div class="d-flex justify-content-end align-items-center w-100">
                        @if(Auth::user()->role->name != 'staff')
                            <button class="btn btn-success" type="button" data-toggle="modal" data-target="#TambahDataNonPC" id="modal-tambah-button">Tambah Perangkat</button>
                        @endif
                    </div>
                </div>

                <!-- Modal Form untuk Menambah Perangkat Non-PC -->
                <div class="modal fade" id="TambahDataNonPC" tabindex="-1" aria-labelledby="TambahDataNonPCModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="TambahDataNonPCModalLabel">Tambah Jenis Barang Non-PC</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Form untuk Tambah Non-PC -->
                                <div id="tambah-non-pc-form">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="tambah_kode_inventaris">Kode Inventaris</label>
                                            <input type="text" class="form-control" id="tambah_kode_inventaris" autocomplete="off">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="tambah_jenis_barang">Jenis Barang</label>
                                            <input type="text" class="form-control" id="tambah_jenis_barang" readonly value="Non-PC">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tambah_serial_number">Serial Number</label>
                                        <input type="text" class="form-control" id="tambah_serial_number" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="tambah_merk_type">Merk/Type</label>
                                        <input type="text" class="form-control" id="tambah_merk_type" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="tambah_tanggal_registrasi">Tanggal Registrasi</label>
                                        <input type="date" class="form-control" id="tambah_tanggal_registrasi" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="tambah_tipe_barang">Tipe Barang</label>
                                        <input type="text" class="form-control" id="tambah_tipe_barang" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="tambah_pengguna">Pengguna</label>
                                        <input type="text" class="form-control" id="tambah_pengguna">
                                    </div>
                                    <div class="form-group">
                                        <label for="tambah_divisi">Divisi</label>
                                        <input type="text" class="form-control" id="tambah_divisi">
                                    </div>
                                    <div class="form-group">
                                        <label for="tambah_lokasi">Lokasi</label>
                                        <input type="text" class="form-control" id="tambah_lokasi">
                                    </div>
                                    <div class="form-group">
                                        <label for="tambah_name">Nama</label>
                                        <input type="text" class="form-control" id="tambah_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="tambah_description">Keterangan</label>
                                        <input type="text" class="form-control" id="tambah_description">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                <button type="button" class="btn btn-success" id="simpanTambahNonPC">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Form untuk Mengubah Perangkat Non-PC -->
                <div class="modal fade" id="EditDataNonPC" tabindex="-1" aria-labelledby="EditDataNonPCModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="EditDataNonPCModalLabel">Ubah Jenis Barang Non-PC</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Form untuk Edit Non-PC -->
                                <div id="edit-non-pc-form">
                                    <input type="hidden" name="id" id="edit_id">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="edit_kode_inventaris">Kode Inventaris</label>
                                            <input type="text" class="form-control" id="edit_kode_inventaris" autocomplete="off">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="edit_jenis_barang">Jenis Barang</label>
                                            <input type="text" class="form-control" id="edit_jenis_barang" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="edit_serial_number">Serial Number</label>
                                        <input type="text" class="form-control" id="edit_serial_number" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="edit_merk_type">Merk/Type</label>
                                        <input type="text" class="form-control" id="edit_merk_type" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="edit_tanggal_registrasi">Tanggal Registrasi</label>
                                        <input type="date" class="form-control" id="edit_tanggal_registrasi" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="edit_tipe_barang">Tipe Barang</label>
                                        <input type="text" class="form-control" id="edit_tipe_barang" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="edit_pengguna">Pengguna</label>
                                        <input type="text" class="form-control" id="edit_pengguna">
                                    </div>
                                    <div class="form-group">
                                        <label for="edit_divisi">Divisi</label>
                                        <input type="text" class="form-control" id="edit_divisi">
                                    </div>
                                    <div class="form-group">
                                        <label for="edit_lokasi">Lokasi</label>
                                        <input type="text" class="form-control" id="edit_lokasi">
                                    </div>
                                    <div class="form-group">
                                        <label for="edit_name">Nama</label>
                                        <input type="text" class="form-control" id="edit_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="edit_description">Keterangan</label>
                                        <input type="text" class="form-control" id="edit_description">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                <button type="button" class="btn btn-success" id="simpanEditNonPC">Simpan Perubahan</button>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    $(document).ready(function() {
                        // Modal Tambah
                        $('#modal-tambah-button').click(function() {
                            $('#TambahDataNonPC').modal('show');
                        });

                        // Simpan data baru
                        $('#simpanTambahNonPC').on('click', function() {
                            if (validateForm('#tambah-non-pc-form')) {
                                simpan();
                            }
                        });

                        // Modal Edit
                        $(document).on("click", ".ubah", function() {
                            let id = $(this).attr('id');
                            $.ajax({
                                url: "{{ route('barang.jenis.detail') }}",
                                type: "post",
                                data: {
                                    id: id,
                                    "_token": "{{ csrf_token() }}"
                                },
                                success: function({ data }) {
                                    $("#edit_id").val(data.id);
                                    $("#edit_kode_inventaris").val(data.kode_inventaris);
                                    $("#edit_jenis_barang").val(data.jenis_barang);
                                    $("#edit_serial_number").val(data.serial_number);
                                    $("#edit_merk_type").val(data.merk_type);
                                    $("#edit_tanggal_registrasi").val(data.tanggal_registrasi);
                                    $("#edit_tipe_barang").val(data.tipe_barang);
                                    $("#edit_pengguna").val(data.pengguna);
                                    $("#edit_divisi").val(data.divisi);
                                    $("#edit_lokasi").val(data.lokasi);
                                    $("#edit_name").val(data.name);
                                    $("#edit_description").val(data.description);
                                    $('#EditDataNonPC').modal('show');
                                },
                                error: function(err) {
                                    console.log("Error: ", err);
                                }
                            });
                        });

                        // Simpan perubahan
                        $('#simpanEditNonPC').on('click', function() {
                            if (validateForm('#edit-non-pc-form')) {
                                ubah();
                            }
                        });

                        function validateForm(formId) {
                            let valid = true;
                            $(formId + ' input').each(function() {
                                if ($(this).val() === '') {
                                    valid = false;
                                    $(this).css('border-color', 'red');
                                } else {
                                    $(this).css('border-color', '');
                                }
                            });

                            if (!valid) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Semua field harus diisi!',
                                    confirmButtonColor: '#6FB98F'
                                });
                            }

                            return valid;
                        }

                        function simpan() {
                            let data = {
                                kode_inventaris: $("#tambah_kode_inventaris").val(),
                                jenis_barang: $("#tambah_jenis_barang").val(),
                                serial_number: $("#tambah_serial_number").val(),
                                merk_type: $("#tambah_merk_type").val(),
                                tanggal_registrasi: $("#tambah_tanggal_registrasi").val(),
                                tipe_barang: $("#tambah_tipe_barang").val(),
                                pengguna: $("#tambah_pengguna").val(),
                                divisi: $("#tambah_divisi").val(),
                                lokasi: $("#tambah_lokasi").val(),
                                name: $("#tambah_name").val(),
                                description: $("#tambah_description").val(),
                                "_token": "{{ csrf_token() }}"
                            };
                            console.log(data);

                            $.ajax({
                                url: `{{ route('barang.jenis.save') }}`,
                                type: "post",
                                data: data,
                                success: function(res) {
                                    Swal.fire({
                                        position: "center",
                                        icon: "success",
                                        title: res.message,
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                    $('#TambahDataNonPC').modal('hide');
                                    $('#data-jenis').DataTable().ajax.reload();
                                },
                                error: function(err) {
                                    console.log(err);
                                }
                            });
                        }

                        function ubah() {
                            let data = {
                                id: $("#edit_id").val(),
                                kode_inventaris: $("#edit_kode_inventaris").val(),
                                jenis_barang: $("#edit_jenis_barang").val(),
                                serial_number: $("#edit_serial_number").val(),
                                merk_type: $("#edit_merk_type").val(),
                                tanggal_registrasi: $("#edit_tanggal_registrasi").val(),
                                tipe_barang: $("#edit_tipe_barang").val(),
                                pengguna: $("#edit_pengguna").val(),
                                divisi: $("#edit_divisi").val(),
                                lokasi: $("#edit_lokasi").val(),
                                name: $("#edit_name").val(),
                                description: $("#edit_description").val(),
                                "_token": "{{ csrf_token() }}"
                            };
                            console.log("Ubah Data: ", data);

                            $.ajax({
                                url: `{{ route('barang.jenis.update') }}`,
                                type: "put",
                                data: data,
                                success: function(res) {
                                    Swal.fire({
                                        position: "center",
                                        icon: "success",
                                        title: res.message,
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                    $('#EditDataNonPC').modal('hide');
                                    $('#data-jenis').DataTable().ajax.reload();
                                },
                                error: function(err) {
                                    console.log(err);
                                }
                            });
                        }

                        function isi() {
                            $('#data-jenis').DataTable({
                                responsive: true, lengthChange: true, autoWidth: false,
                                processing: true,
                                serverSide: true,
                                ajax: `{{ route('barang.jenis.list') }}`,
                                columns: [
                                    {
                                        "data": null, "sortable": false,
                                        render: function(data, type, row, meta) {
                                            return meta.row + meta.settings._iDisplayStart + 1;
                                        }
                                    },
                                    { data: 'kode_inventaris', name: 'kode_inventaris' },
                                    { 
                                        data: null, name: 'jenis_barang',
                                        render: function() {
                                            return 'Non-PC';
                                        }
                                    },
                                    { data: 'serial_number', name: 'serial_number' },
                                    { data: 'merk_type', name: 'merk_type' },
                                    { data: 'tanggal_registrasi', name: 'tanggal_registrasi' },
                                    { data: 'tipe_barang', name: 'tipe_barang' },
                                    { data: 'pengguna', name: 'pengguna' },
                                    { data: 'divisi', name: 'divisi' },
                                    { data: 'lokasi', name: 'lokasi' },
                                    { data: 'name', name: 'name' },
                                    { data: 'description', name: 'description' },
                                    @if(Auth::user()->role->name != 'staff')
                                    {
                                        data: null, name: 'tindakan',
                                        render: function(data, type, row) {
                                            return `
                                                <button class="btn btn-warning ubah" id="${row.id}" style="background-color: #28A745; border-color: #28A745; color:white;">Ubah</button>
                                                <button class="btn btn-danger hapus" id="${row.id}">Hapus</button>
                                            `;
                                        }
                                    }
                                    @endif
                                ]
                            }).buttons().container();
                        }

                        $(document).on("click", ".hapus", function() {
                            let id = $(this).attr('id');
                            const swalWithBootstrapButtons = Swal.mixin({
                                customClass: {
                                    confirmButton: "btn btn-success m-1",
                                    cancelButton: "btn btn-danger m-1"
                                },
                                buttonsStyling: false
                            });
                            swalWithBootstrapButtons.fire({
                                title: "Anda Yakin?",
                                text: "Data Ini Akan Di Hapus",
                                icon: "warning",
                                showCancelButton: true,
                                confirmButtonText: "Ya, Hapus",
                                cancelButtonText: "Tidak, Kembali!",
                                reverseButtons: true
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    $.ajax({
                                        url: "{{ route('barang.jenis.delete') }}",
                                        type: "delete",
                                        data: {
                                            id: id,
                                            "_token": "{{ csrf_token() }}"
                                        },
                                        success: function(res) {
                                            Swal.fire({
                                                position: "center",
                                                icon: "success",
                                                title: res.message,
                                                showConfirmButton: false,
                                                timer: 1500
                                            });
                                            $('#data-jenis').DataTable().ajax.reload();
                                        }
                                    });
                                }
                            });
                        });

                        isi();
                    });
                </script>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="data-jenis" width="100%" class="table table-bordered text-nowrap border-bottom dataTable no-footer dtr-inline collapsed">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0" width="8%">No</th>
                                    <th class="border-bottom-0">Kode Inventaris</th>
                                    <th class="border-bottom-0">Jenis Barang</th>
                                    <th class="border-bottom-0">Serial Number</th>
                                    <th class="border-bottom-0">Merk/Type</th>
                                    <th class="border-bottom-0">Tanggal Registrasi</th>
                                    <th class="border-bottom-0">Tipe Barang</th>
                                    <th class="border-bottom-0">Pengguna</th>
                                    <th class="border-bottom-0">Divisi</th>
                                    <th class="border-bottom-0">Lokasi</th>
                                    <th class="border-bottom-0">Nama</th>
                                    <th class="border-bottom-0">Keterangan</th>
                                    @if(Auth::user()->role->name != 'staff')
                                    <th class="border-bottom-0" width="1%">Tindakan</th>
                                    @endif
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<x-data-table/>
@endsection
