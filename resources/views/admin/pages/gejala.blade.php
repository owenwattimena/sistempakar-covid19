@extends('admin.app')


@section('style')
    <!-- DataTables -->
    {{-- <link rel="stylesheet" href="{{asset('assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}"> --}}
@endsection


@section('page', 'Gejala')


@section('main')

@if (session('msg'))
<div class="alert {!! session('type') !!} alert-dismissible fade show" role="alert">
    {!! session('msg') !!}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="alert alert-info" role="alert">
    Tabel gejala Covid-19  
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
          {{-- <div class="card-header">
            <h3 class="card-title">DataTable with minimal features & hover style</h3>
          </div> --}}
          <!-- /.card-header -->
                <div class="card-body">
                    <div class="ml-auto text-right mb-3">
                        <button type="button" data-toggle="modal" id="btn-create" data-target="#exampleModalCenter" class="btn btn-primary rounded-0 btn-store"> <i class="fa fa-plus"></i> TAMBAH</button>
                    </div>
                    <div class="table-responsive">
                        <table id="table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Gejala</th>
                                    <th>Deskripsi</th>
                                    <th>Nilai MB</th>
                                    <th>Nilai MD</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 0;
                                @endphp
                                 @forelse ($gejala as $data)
                                    <tr>
                                        <td>{{ ++$no }}</td>
                                        <td>{{ $data->gejala }}</td>
                                        <td>{{ $data->deskripsi }}</td>
                                        <td>{{ $data->nilai_mb }}</td>
                                        <td>{{ $data->nilai_md }}</td>
                                        <td>
                                            <button type="button" data-id="{{$data->id}}" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-warning btn-xs rounded-0 btn-update">UBAH</button>
                                            <form class="d-inline" method="POST" action="{{route('destroy_gejala', ['id' => $data->id])}}">
                                                @csrf
                                                @method('delete')
                                                <button onclick="return confirm('Ingin menghapus data?')" type="submit" class="btn btn-danger btn-xs rounded-0">HAPUS</button>
                                            </form>

                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-danger">Tidak ada data!</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
          <!-- /.card-body -->
            </div>
        <!-- /.card -->
        </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form" method="POST" action="" class="needs-validation" novalidate>
                <div class="modal-body">
                    @csrf
                    <input type="hidden" id="method" name="_method" value="post">
                    {{-- <input type="hidden" id="id" name="id" value="0"> --}}

                    <div class="form-group">
                        <div class="form-check pl-0">
                            <label for="gejala" class="bt-caption">Gejala</label>
                            <input type="text" class="rounded form-control" name="gejala" id="gejala"
                                placeholder="Gejala" required>
                            <div class="invalid-feedback">
                                gejala tidak boleh kosong
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check pl-0">
                            <label for="deskripsi" class="bt-caption">Deskripsi</label>
                            <textarea placeholder="Deskripsi" class="rounded form-control" name="deskripsi" id="deskripsi" rows="3"></textarea>
                            <div class="invalid-feedback">
                                gejala tidak boleh kosong
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="form-check pl-0">
                            <label for="nilai_mb" class="bt-caption">Nilai Meansure of Belive (MB)</label>
                            <input type="number" step="0.01" min="0.0" max="1.0" class="rounded form-control" name="nilai_mb" id="nilai_mb"
                                placeholder="MB" required>
                            <div class="invalid-feedback">
                                Nilai MB tidak boleh kosong
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="form-check pl-0">
                            <label for="nilai_md" class="bt-caption">Nilai Meansure of Disbelive (MD)</label>
                            <input type="number" step="0.01" min="0.0" max="1.0" class="rounded form-control" name="nilai_md" id="nilai_md"
                                placeholder="MD" required>
                            <div class="invalid-feedback">
                                Nilai MD tidak boleh kosong
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger rounded-0" data-dismiss="modal"><i class="fa fa-times"></i> BATAL</button>
                    <button type="submit" class="btn btn-primary rounded-0"><i class="fa fa-check"></i> SIMPAN</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


@section('script')
    {{-- <!-- DataTables -->
    <script src="{{asset('assets/admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script> --}}
    <script>
        (function () {
            'use strict';
            window.addEventListener('load', function () {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();

        window.onload = function(){
            let el_form = document.querySelector('#form');
            let modal_title = document.querySelector('#modalTitle');
            let el_gejala = document.querySelector('#gejala');
            let el_deskripsi = document.querySelector('#deskripsi');
            let el_nilai_mb = document.querySelector('#nilai_mb');
            let el_nilai_md = document.querySelector('#nilai_md');
            let el_method = document.querySelector('#method');
            
            let create_btn = document.querySelector('#btn-create');
            create_btn.addEventListener('click', function(e){
                el_method.value = 'post';
                el_form.action = `{{ route('create_gejala') }}`;
                modal_title.innerHTML = 'Tambah gejala';
                el_gejala.value = '';
                el_deskripsi.value = '';
                el_nilai_mb.value = '';
                el_nilai_md.value = '';
            });
            
            let btns_update = document.querySelectorAll('.btn-update');
            Array.prototype.filter.call(btns_update, function(btn_update){
                btn_update.addEventListener('click', function(e){
                    let id = this.dataset.id;
                    modal_title.innerHTML = 'Ubah gejala';
                    el_method.value = 'put';
                    el_form.action = `{{ url('/admin/gejala/ubah') }}/${id}`;
                    let el_parent = this.parentElement.parentElement;
                    let gejala = el_parent.children[1].textContent;
                    let deskripsi = el_parent.children[2].textContent;
                    let nilai_mb = el_parent.children[3].textContent;
                    let nilai_md = el_parent.children[4].textContent;

                    el_gejala.value = gejala;
                    el_deskripsi.value = deskripsi;
                    el_nilai_mb.value = nilai_mb;
                    el_nilai_md.value = nilai_md;
                });
            });
            
        }
    </script>
@endsection