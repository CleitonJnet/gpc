@extends('layout.admin')
@section('title','Lista de imóveis')
@section('content')
    <div class="row rounded" style="background-color: var(--bright">
        <div class="col">
            <div class="pt-4 pb-2 d-flex justify-content-between align-items-center">
                <h4 class="text-start">Comentários</h4>
                <div><button class="btn btn-blue-dark" data-bs-toggle="modal" data-bs-target="#addCommentModal">Cadastrar</button></div>
            </div>
            <hr>
            <table class="table table-hover" style="vertical-align: middle">
                <thead>
                <tr>
                    <th class="text-center">Foto</th>
                    <th>Autor</th>
                    <th class="d-none d-lg-table-cell" style="width: 600px;">Comentário</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($comments as $comment)
                    <tr>
                        <td style="width: 90px">
                            <button class="btn btn-blue-light" style="margin: -6px -2px" data-bs-toggle="modal" data-bs-target="#addAvatarModal" data-bs-id="{{ $comment->id }}">
                                <img src="{{ asset((file_exists('img/avatar_author/'.$comment->id.'.jpg'))?'img/avatar_author/'.$comment->id.'.jpg':'img/avatar_author/default.jpg') }}" class="rounded-circle" height="45" width="45" alt="...">
                            </button>
                        </td>
                        <th>{{ $comment->author }}</th>
                        <td class="d-none d-lg-table-cell text-truncate fst-italic" style="max-width: 650px;">{{ $comment->comment }}</td>
                        <td class="text-center" style="max-width: 180px;">
                            <button type="button" class="btn btn-sm btn-blue-dark" data-bs-toggle="modal" data-bs-target="#viewCommentModal"
                                    data-bs-id="{{ $comment->id }}"
                                    data-bs-author="{{ $comment->author }}"
                                    data-bs-comment="{{ $comment->comment }}"
                            ><i style="font-size: 1rem;color: var(--bright);" class="px-2 far fa-comment-dots"></i></button>
                            <button type="button" class="btn btn-sm btn-warning my-1 my-xl-0" data-bs-toggle="modal" data-bs-target="#editCommentModal"
                                    data-bs-id="{{ $comment->id }}"
                                    data-bs-author="{{ $comment->author }}"
                                    data-bs-comment="{{ $comment->comment }}"
                            ><i style="font-size: 1rem;color: var(--bright);" class="px-2 fas fa-pen-square"></i></button>
                            <form action="{{ route('admin.comment.destroy',$comment->id) }}" class="d-inline" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-sm btn-danger" type="submit"><i style="font-size: 1rem;color: var(--bright);" class="px-2 fas fa-eraser"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot></tfoot>
            </table>
            <div class="my-3 ">{{ $comments->links() }}</div>
        </div>
    </div>

    <div class="modal fade" id="addCommentModal" tabindex="-1" aria-labelledby="addCommentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-xxl-down modal-xl modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('admin.comment.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" class="form-control" id="comment_id" name="id">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addCommentModalLabel">Novo comentário</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-12 mb-3">
                            <label for="comment_author" class="form-label">Autor do comentário</label>
                            <input type="text" class="form-control" id="comment_author" name="author" placeholder="Autor do comentário">
                        </div>
                        <div class="col-12">
                            <label for="comment_comment" class="form-label">Comentário</label>
                            <textarea class="form-control" id="comment_comment" name="comment" rows="3" placeholder="Comentário"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="avatar" class="form-label">Selecione a foto</label>
                            <input class="form-control" type="file" id="avatar" name="path" required>
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

    <div class="modal fade" id="viewCommentModal" tabindex="-1" aria-labelledby="viewCommentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-xxl-down modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewCommentModalLabel">Pré-visualização</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container-xxl">
                    <div id="index">

                        <section class="content" id="comments">
                            <h2 >Comentários</h2>
                            <div id="comment-header"><i class="fas fa-pencil-alt"></i></div>
                            <div class="container-fluid mt-4 mt-md-0">
                                <div id="carouselComment" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <blockquote class="container">
                                                        <i class="fas fa-quote-left"></i>
                                                        <span id="view_comment"></span>
                                                        <i class="fas fa-quote-right"></i>
                                                    </blockquote>
                                                    <cite class="author" id="view_author"></cite>
                                                </div>
                                                <div class="col-md-3">
                                                    <img id="avatar_src" src="{{ asset('img/avatar_author/default.jpg') }}" class="rounded-circle" height="150" width="150" alt="...">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </section>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editCommentModal" tabindex="-1" aria-labelledby="editCommentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-xxl-down modal-xl modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('admin.comment.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" class="form-control" id="comment_id" name="id">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editCommentModalLabel">Edição de comentário</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-12 mb-3">
                            <label for="comment_author" class="form-label">Autor do comentário</label>
                            <input type="text" class="form-control" id="comment_author" name="author" placeholder="Autor do comentário">
                        </div>
                        <div class="col-12">
                            <label for="comment_comment" class="form-label">Comentário</label>
                            <textarea class="form-control" id="comment_comment" name="comment" rows="3" placeholder="Comentário"></textarea>
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

    <div class="modal fade" id="addAvatarModal" tabindex="-1" aria-labelledby="addAvatarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.comment.avatar') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="avatar_id" id="avatar_id">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addAvatarModalLabel">Alterar foto de perfil</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="avatar" class="form-label">Selecione a foto</label>
                            <input class="form-control" type="file" id="avatar" name="path" required>
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
        var editCommentModal = document.getElementById('editCommentModal')
        editCommentModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget

            var id = button.getAttribute('data-bs-id')
            var author = button.getAttribute('data-bs-author')
            var comment = button.getAttribute('data-bs-comment')

            var comment_id = editCommentModal.querySelector('#comment_id')
            var comment_author = editCommentModal.querySelector('#comment_author')
            var comment_comment = editCommentModal.querySelector('#comment_comment')

            comment_id.value = id
            comment_author.value = author
            comment_comment.value = comment
        })

        var viewCommentModal = document.getElementById('viewCommentModal')
        viewCommentModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget

            var id = button.getAttribute('data-bs-id')
            var author = button.getAttribute('data-bs-author')
            var comment = button.getAttribute('data-bs-comment')

            var view_author = viewCommentModal.querySelector('#view_author')
            var view_comment = viewCommentModal.querySelector('#view_comment')
            var img = document.querySelector("#avatar_src");

            $.ajax({
                url:`{{ asset('/') }}`+'img/avatar_author/'+id+'.jpg',
                type:'HEAD',
                beforeSend: function() {
                    img.setAttribute('src', `{{ asset('/') }}`+'img/avatar_author/default.jpg');
                },
                success: function() {
                    img.setAttribute('src', `{{ asset('/') }}`+'img/avatar_author/'+id+'.jpg');
                },
                error: function() {
                    img.setAttribute('src', `{{ asset('/') }}`+'img/avatar_author/default.jpg');
                },
            });

            view_author.textContent = author
            view_comment.textContent = comment

        })

        var addAvatarModal = document.getElementById('addAvatarModal')
        addAvatarModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget
            var id = button.getAttribute('data-bs-id')
            var avatar_id = addAvatarModal.querySelector('#avatar_id')
            avatar_id.value = id
        })

    </script>
@endsection
