@extends('layouts.admin_master')
@section('content')


<div class="col-md-12">
    <div class="card  mb-3">
        <div class="card-header">
            <div class="container">
                <div class="row justify-content-between">
                    <span><i class="fa fa-picture-o"></i> Albums</span>
                    <a href="#" class="btn btn-sm btn-primary add-modal" >Ajouter un album <i class="fa fa-plus"></i></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-sm  table-bordered ">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>


                </tr>
                </thead>
                <tbody id="albumTable">
                <!-- Formations -->
                @forelse($albums as $album)
                    <tr class="item{{$album->id}}">
                        <th>{{$album->id}}</th>
                        <th>{{$album->name}}</th>
                        <td>{{$album->description}}</td>
                        <td>
                            <a class='show-modal btn btn-sm btn-outline-success' href="{{route('imagesalbum.show',$album->id)}}" data-id='{{$album->id}}' data-name='{{$album->name}}' data-description='{{$album->description}}'><i class='fa fa-eye'></i> Show</a>
                            <button class='edit-modal btn btn-sm btn-outline-info' data-route="{{route('album.update',$album->id)}}" data-id='{{$album->id}}' data-name='{{$album->name}}' data-description='{{$album->description}}'><i class='fa fa-edit'></i> Edit</button>
                            <button class='delete-modal btn btn-sm btn-outline-danger' data-id='{{$album->id}}' data-name='{{$album->name}}' data-description='{{$album->description}}'><i class='fa fa-trash'></i> Delete</button>

                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">
                            <p>-- aucun album pour l'instant --</p>
                        </td>
                    </tr>
                @endforelse

                </tbody>
            </table>
        </div>
    </div>


</div>


<!-- MODALS -->
<!-- create modal -->
<div id="addModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="name">Title:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" autofocus>
                            <small>Min: 2, Max: 32, only text</small>
                            <p class="errorTitle text-center alert alert-danger hidden"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="description">Desccripton:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="description" name="description" placeholder="Description">
                            <p class="errorContent text-center alert alert-danger hidden"></p>
                        </div>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success add" data-dismiss="modal">
                        <span id="" class='glyphicon glyphicon-check'></span> Add
                    </button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                        <span class='glyphicon glyphicon-remove'></span> Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- edit modal-->
<div id="editModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form" >
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="edit_id" >
                        <label class="control-label col-sm-2" for="name">name:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="edit_name" autofocus>
                            <small>Min: 2, Max: 32, only text</small>
                            <p class="errorTitle text-center alert alert-danger hidden"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="description">Desccripton:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="edit_description" name="edit_description">
                            <p class="errorContent text-center alert alert-danger hidden"></p>
                        </div>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success edit" data-dismiss="modal">
                        <i id="" class='fa fa-check'></i> Edit
                    </button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                        <span class='glyphicon glyphicon-remove'></span> Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="deleteModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                <h3 class="text-center">Are you sure you want to delete the following post?</h3>
                <input type="hidden" class="form-control" id="id_delete" disabled>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger delete" data-dismiss="modal">
                        <span id="" class='glyphicon glyphicon-trash'></span> Delete
                    </button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                        <span class='glyphicon glyphicon-remove'></span> Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script_page')
    <script type="text/javascript">

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // add a new post
        $(document).on('click', '.add-modal', function() {
            $('.modal-title').text('Add');
            $('#addModal').modal('show');
        });

        $('.modal-footer').on('click', '.add', function() {
            var url = "<?php route('album.store')?>";
            $.ajax({
                type: 'POST',
                url: url,
                data: {
                    '_token': $('input[name=_token]').val(),
                    'name': $('#name').val(),
                    'description': $('#description').val()
                },
                success: function(data) {
                    $('.errorTitle').addClass('hidden');
                    $('.errorContent').addClass('hidden');

                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#addModal').modal('show');
                            toastr.error('Validation error!', 'Error Alert', {timeOut: 5000});
                        }, 500);

                        if (data.errors.title) {
                            $('.errorTitle').removeClass('hidden');
                            $('.errorTitle').text(data.errors.name);
                        }
                        if (data.errors.content) {
                            $('.errorContent').removeClass('hidden');
                            $('.errorContent').text(data.errors.description);
                        }
                    } else {
                        toastr.success('Successfully added Post!', 'Success Alert', {timeOut: 5000});
                        $('#albumTable').append("<tr class='item" + data.id + "'>"
                            +"<td>" + data.id + "</td>"
                            +"<td>" + data.name + "</td>"
                            +"<td>" + data.description + "</td>"
                            +"<td>"
                            +"<button class='show-modal btn btn-sm btn-outline-success' data-id='" + data.id + "' data-name='" + data.name + "' data-description='" + data.description + "'><i class='fa fa-eye'></i> Show</button> "
                            +"<button class='edit-modal btn btn-sm btn-outline-info' data-id='" + data.id + "' data-name='" + data.name + "' data-description='" + data.description + "'><i class='fa fa-edit'></i> Edit</button> "
                            +"<button class='delete-modal btn btn-sm btn-outline-danger' data-id='" + data.id + "' data-name='" + data.name + "' data-description='" + data.description + "'><i class='fa fa-trash'></i> Delete</button> "
                            +"</td>"
                            +"</tr>");

                    }
                }
            });
        });

        // Edit an album
        $(document).on('click', '.edit-modal', function() {
            $('.modal-title').text('Edit');
            $('#edit_id').val($(this).data('id'));
            $('#edit_name').val($(this).data('name'));
            $('#edit_description').val($(this).data('description'));
            id = $('#edit_id').val();
            urlroute = $(this).data('route');

            $('#editModal').modal('show');
        });
        $('.modal-footer').on('click', '.edit', function() {
            $.ajax({
                type: 'PUT',
                url: 'album/' + id,
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id' : $('#edit_id').val(),
                    'name': $('#edit_name').val(),
                    'description': $('#edit_description').val()
                },
                success: function(data) {
                    $('.errorTitle').addClass('hidden');
                    $('.errorContent').addClass('hidden');

                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#editModal').modal('show');
                            toastr.error('Validation error!', 'Error Alert', {timeOut: 5000});
                        }, 500);

                        if (data.errors.title) {
                            $('.errorTitle').removeClass('hidden');
                            $('.errorTitle').text(data.errors.title);
                        }
                        if (data.errors.content) {
                            $('.errorContent').removeClass('hidden');
                            $('.errorContent').text(data.errors.content);
                        }
                    } else {
                        toastr.success('Successfully updated Post!', 'Success Alert', {timeOut: 5000});
                        $('.item' + data.id).replaceWith(
                            "<tr class='item" + data.id + "'>"
                            +"<td>" + data.id + "</td>"
                            +"<td>" + data.name + "</td>"
                            +"<td>" + data.description + "</td>"
                            +"<td>"
                            +"<button class='show-modal btn btn-sm btn-outline-success' data-id='" + data.id + "' data-title='" + data.name + "' data-content='" + data.description + "'><i class='fa fa-eye'></i> Show</button> "
                            +"<button class='edit-modal btn btn-sm btn-outline-info' data-id='" + data.id + "' data-title='" + data.name + "' data-content='" + data.description + "'><i class='fa fa-edit'></i> Edit</button> "
                            +"<button class='delete-modal btn btn-sm btn-outline-danger' data-id='" + data.id + "' data-title='" + data.name + "' data-content='" + data.description + "'><i class='fa fa-trash'></i> Delete</button> "
                            +"</td>"
                            +"</tr>"
                        );
                    }
                }
            });
        });

        // delete an album
        $(document).on('click', '.delete-modal', function() {
            $('.modal-title').text("Dlete : "+$(this).data('name'));
            $('#id_delete').val($(this).data('id'));
            $('#deleteModal').modal('show');
            id = $('#id_delete').val();
        });
        $('.modal-footer').on('click', '.delete', function() {
            $.ajax({
                type: 'DELETE',
                url: 'album/' + id,
                data: {
                    '_token': $('input[name=_token]').val(),
                },
                success: function(data) {
                    toastr.success('Successfully deleted Post!', 'Success Alert', {timeOut: 5000});
                    $('.item' + data['id']).remove();
                }
            });
        });
    </script>
    @endsection
