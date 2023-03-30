@extends('layout.admin')
@section('title','Galeria')
@section('content')

    <style>
        .card-bkg-img {
            background-size: cover;
            background-position: top;
            background-repeat: no-repeat;
            height: 270px;
            box-shadow: 1px 1px 2px #000;
        }
    </style>
    <section class="rounded container-fluid container-xl p-2" style="background-color: var(--bright)">
        <div class="d-flex justify-content-between align-items-center">
            <h4 class="py-4 text-start">Galeria de fotos</h4>
            <div>
                <a href="{{ route('admin.tenancy.show',$tenancy) }}" class="btn btn-blue-dark">Ir para imóvel</a>
                <button class="btn btn-blue-dark" data-bs-toggle="modal" data-bs-target="#addPhotoModal">Nova foto</button>
            </div>
        </div>
        <div class="row g-2 p-1 rounded" style="background-color: var(--grey)">
            @foreach($gallery as $photo)
                <div class="col-lg-4 col-md-6 position-relative">
                    <button type="button" class="w-100 p-0 card-bkg-img rounded" style="background-image: url({{ asset($photo->path) }})" data-bs-toggle="modal" data-bs-target="#EditPhotoModal" data-bs-id="{{ $photo->id }}"></button>
                    <form action="{{ route('admin.gallery.destroy',$photo->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="position-absolute btn btn-sm btn-danger" style="z-index: 100;top:5px; right: 10px;">
                            <i class="fas fa-trash-alt" style="color: var(--bright) !important; font-size: 1.5rem"></i>
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    </section>

    <div class="modal fade" id="addPhotoModal" tabindex="-1" aria-labelledby="addPhotoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="tenancy_id" value="{{ $tenancy->id }}">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addPhotoModalLabel">Adicionar foto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="pathAdd" class="form-label">Selecione a foto</label>
                            <input class="form-control" type="file" id="pathAdd" name="path">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-blue-dark">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="EditPhotoModal" tabindex="-1" aria-labelledby="EditPhotoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.gallery.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="tenancy_id" value="{{ $tenancy->id }}">
                    <input type="hidden" name="id" id="gallery_id">

                    <div class="modal-header">
                        <h5 class="modal-title" id="EditPhotoModalLabel">Trocar foto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="pathAdd" class="form-label">Selecione a foto</label>
                            <input class="form-control" type="file" id="pathAdd" name="path">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-blue-dark">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        var EditPhotoModal = document.getElementById('EditPhotoModal')
        EditPhotoModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget

            var id = button.getAttribute('data-bs-id')

            var gallery_id = EditPhotoModal.querySelector('#gallery_id')

            gallery_id.value = id
        })
    </script>
@endsection
