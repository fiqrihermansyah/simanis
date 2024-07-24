@extends('layouts.app')
@section('title','Jenis Barang PC')
@section('content')
<x-head-datatable/>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card w-100">
                <div class="card-header row">
                    <div class="d-flex justify-content-end align-items-center w-100">
                        @if(Auth::user()->role->name != 'staff')
                            <button class="btn btn-success" type="button" data-toggle="modal" data-target="#TambahDataPC" id="modal-tambah-button">Tambah Perangkat</button>
                        @endif
                    </div>
                </div>

                <!-- Modal Form untuk Menambah Perangkat -->
                <div class="modal fade" id="TambahDataPC" tabindex="-1" aria-labelledby="TambahDataPCModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="TambahDataPCModalLabel">Tambah Jenis Barang PC</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Form untuk Tambah PC -->
                                <div id="tambah-pc-form">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="tambah_kode_inventaris">Kode Inventaris</label>
                                            <input type="text" class="form-control" id="tambah_kode_inventaris" autocomplete="off">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="tambah_jenis_barang">Jenis Barang</label>
                                            <input type="text" class="form-control" id="tambah_jenis_barang" readonly value="PC">
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
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="tambah_processor">Processor</label>
                                            <input type="text" class="form-control" id="tambah_processor" autocomplete="off">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="tambah_ram">RAM</label>
                                            <input type="text" class="form-control" id="tambah_ram">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="tambah_disk">Hardisk</label>
                                            <input type="text" class="form-control" id="tambah_disk">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="tambah_os">OS</label>
                                            <input type="text" class="form-control" id="tambah_os">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tambah_vga">VGA</label>
                                        <input type="text" class="form-control" id="tambah_vga">
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
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                <button type="button" class="btn btn-success" id="simpanTambahPC">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Form untuk Mengubah Perangkat -->
                <div class="modal fade" id="EditDataPC" tabindex="-1" aria-labelledby="EditDataPCModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="EditDataPCModalLabel">Ubah Jenis Barang PC</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Form untuk Edit PC -->
                                <div id="edit-pc-form">
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
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="edit_processor">Processor</label>
                                            <input type="text" class="form-control" id="edit_processor" autocomplete="off">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="edit_ram">RAM</label>
                                            <input type="text" class="form-control" id="edit_ram">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="edit_disk">Hardisk</label>
                                            <input type="text" class="form-control" id="edit_disk">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="edit_os">OS</label>
                                            <input type="text" class="form-control" id="edit_os">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="edit_vga">VGA</label>
                                        <input type="text" class="form-control" id="edit_vga">
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
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                <button type="button" class="btn btn-success" id="simpanEditPC">Simpan Perubahan</button>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    $(document).ready(function() {
                        // Modal Tambah
                        $('#modal-tambah-button').click(function() {
                            $('#TambahDataPC').modal('show');
                        });

                        // Simpan data baru
                        $('#simpanTambahPC').on('click', function() {
                            if (validateForm('#tambah-pc-form')) {
                                simpan();
                            }
                        });

                        // Modal Edit
                        $(document).on("click", ".ubah", function() {
                            let id = $(this).attr('id');
                            $.ajax({
                                url: "{{ route('barang.satuan.detail') }}",
                                type: "post",
                                data: {
                                    id: id,
                                    "_token": "{{ csrf_token() }}"
                                },
                                success: function({ data }) {
                                    $("#edit_id").val(data.id);
                                    $("#edit_kode_inventaris").val(data.inventory_code);
                                    $("#edit_jenis_barang").val(data.item_type);
                                    $("#edit_serial_number").val(data.serial_number);
                                    $("#edit_merk_type").val(data.brand);
                                    $("#edit_tanggal_registrasi").val(data.registration_date);
                                    $("#edit_processor").val(data.processor);
                                    $("#edit_ram").val(data.ram);
                                    $("#edit_disk").val(data.hard_disk);
                                    $("#edit_os").val(data.os);
                                    $("#edit_vga").val(data.vga);
                                    $("#edit_pengguna").val(data.pengguna);
                                    $("#edit_divisi").val(data.divisi);
                                    $("#edit_lokasi").val(data.lokasi);
                                    $('#EditDataPC').modal('show');
                                },
                                error: function(err) {
                                    console.log("Error: ", err);
                                }
                            });
                        });

                        // Simpan perubahan
                        $('#simpanEditPC').on('click', function() {
                            if (validateForm('#edit-pc-form')) {
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
                                inventory_code: $("#tambah_kode_inventaris").val(),
                                item_type: $("#tambah_jenis_barang").val(),
                                serial_number: $("#tambah_serial_number").val(),
                                brand: $("#tambah_merk_type").val(),
                                registration_date: $("#tambah_tanggal_registrasi").val(),
                                processor: $("#tambah_processor").val(),
                                ram: $("#tambah_ram").val(),
                                hard_disk: $("#tambah_disk").val(),
                                os: $("#tambah_os").val(),
                                vga: $("#tambah_vga").val(),
                                pengguna: $("#tambah_pengguna").val(),
                                divisi: $("#tambah_divisi").val(),
                                lokasi: $("#tambah_lokasi").val(),
                                "_token": "{{ csrf_token() }}"
                            };
                            console.log(data);

                            $.ajax({
                                url: `{{ route('barang.satuan.save') }}`,
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
                                    $('#TambahDataPC').modal('hide');
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
                                inventory_code: $("#edit_kode_inventaris").val(),
                                item_type: $("#edit_jenis_barang").val(),
                                serial_number: $("#edit_serial_number").val(),
                                brand: $("#edit_merk_type").val(),
                                registration_date: $("#edit_tanggal_registrasi").val(),
                                processor: $("#edit_processor").val(),
                                ram: $("#edit_ram").val(),
                                hard_disk: $("#edit_disk").val(),
                                os: $("#edit_os").val(),
                                vga: $("#edit_vga").val(),
                                pengguna: $("#edit_pengguna").val(),
                                divisi: $("#edit_divisi").val(),
                                lokasi: $("#edit_lokasi").val(),
                                "_token": "{{ csrf_token() }}"
                            };
                            console.log("Ubah Data: ", data);

                            $.ajax({
                                url: `{{ route('barang.satuan.update') }}`,
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
                                    $('#EditDataPC').modal('hide');
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
                                ajax: `{{ route('barang.satuan.list') }}`,
                                columns: [
                                    {
                                        "data": null, "sortable": false,
                                        render: function(data, type, row, meta) {
                                            return meta.row + meta.settings._iDisplayStart + 1;
                                        }
                                    },
                                    { data: 'inventory_code', name: 'inventory_code' },
                                    { 
                                        data: null, name: 'item_type',
                                        render: function() {
                                            return 'PC';
                                        }
                                    },
                                    { data: 'serial_number', name: 'serial_number' },
                                    { data: 'brand', name: 'brand' },
                                    { data: 'registration_date', name: 'registration_date' },
                                    { data: 'processor', name: 'processor' },
                                    { data: 'ram', name: 'ram' },
                                    { data: 'hard_disk', name: 'hard_disk' },
                                    { data: 'os', name: 'os' },
                                    { data: 'vga', name: 'vga' },
                                    { data: 'pengguna', name: 'pengguna' },
                                    { data: 'divisi', name: 'divisi' },
                                    { data: 'lokasi', name: 'lokasi' },
                                    @if(Auth::user()->role->name != 'staff')
                                    {
                                        data: null, name: 'tindakan',
                                        render: function(data, type, row) {
                                            return `
                                                <button class="btn btn-warning ubah" id="${row.id}" style="background-color: #28A745; border-color: #28A745; color:white;">Ubah</button>
                                                <button class="btn btn-danger hapus" id="${row.id}">Hapus</button>
                                                <button class="btn btn-info ubah-pengguna" id="${row.id}" style="background-color: #0275D8; border-color: #0275D8; color:white;">Ubah Pengguna</button>
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
                                        url: "{{ route('barang.satuan.delete') }}",
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

                        $(document).on("click", ".ubah-pengguna", function() {
                            let id = $(this).attr('id');
                            $("#UbahPenggunaModal").modal('show');
                            $.ajax({
                                url: "{{ route('barang.satuan.detail') }}",
                                type: "post",
                                data: {
                                    id: id,
                                    "_token": "{{ csrf_token() }}"
                                },
                                success: function({ data }) {
                                    $("#edit_id").val(data.id);
                                    $("#edit_pengguna").val(data.pengguna);
                                    $("#edit_divisi").val(data.divisi);
                                    $("#edit_lokasi").val(data.lokasi);
                                }
                            });
                        });

                        $('#simpan-perubahan-pengguna').on('click', function() {
                            let id = $("#edit_id").val();
                            let pengguna = $("#edit_pengguna").val();
                            let divisi = $("#edit_divisi").val();
                            let lokasi = $("#edit_lokasi").val();
                            $.ajax({
                                url: `{{ route('barang.satuan.update') }}`,
                                type: "put",
                                data: {
                                    id: id,
                                    pengguna: pengguna,
                                    divisi: divisi,
                                    lokasi: lokasi,
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
                                    $('#UbahPenggunaModal').modal('hide');
                                    $('#data-jenis').DataTable().ajax.reload();
                                },
                                error: function(err) {
                                    console.log(err.responseJSON.text);
                                },
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
                                    <th class="border-bottom-0">Processor</th>
                                    <th class="border-bottom-0">Ram</th>
                                    <th class="border-bottom-0">Hardisk</th>
                                    <th class="border-bottom-0">OS</th>
                                    <th class="border-bottom-0">VGA</th>
                                    <th class="border-bottom-0">Pengguna</th>
                                    <th class="border-bottom-0">Divisi</th>
                                    <th class="border-bottom-0">Lokasi</th>
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
