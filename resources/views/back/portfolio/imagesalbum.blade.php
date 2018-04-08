@extends('layouts.admin_master')
@section('content')


    <div class="col-md-12">
        <div class="card  mb-3">
            <div class="card-header">
                <div class="container">
                    <div class="row justify-content-between">
                        <span><i class="fa fa-picture-o"></i> Albums</span>
                        <a href="#" class="btn btn-sm btn-primary add-images" >Ajouter des images <i class="fa fa-picture"></i></a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <!-- imafges uploaded -->
                <div class="container">

                        @forelse($images as $image)

                            <img class="img-thumbnail" width="150px" height="auto" src="{{asset(''.$image->link)}}" alt="{{$image->name}}">

                                @empty
                            <p>aucune images pour l'instant</p>
                        @endforelse

                </div>
            </div>
        </div>
    </div>


    <div id="add-images-modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ajout des images</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <form action="{{ route('images.upload') }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="container">

                            {{ csrf_field() }}
                            <input type="hidden" id="id_album" name="id_album" value="{{$albumID}}">
                            <input type="file" id="uploadFile" name="uploadFile[]" multiple/>
                    </div>
                    <div class="container">
                        <div id="image_preview"> <!-- images for upload --></div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-success" name='submitImage' value="Upload Image"/>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>

                    </div>

                </form>
            </div>
            </div>
        </div>
    </div>
@endsection
@section('script_page')
    <script type="text/javascript">

        $(document).on('click', '.add-images', function() {

            $('#add-images-modal').modal('show');
        });

        $("#uploadFile").change(function(){

            $('#image_preview').html("");

            var total_file=document.getElementById("uploadFile").files.length;

            for(var i=0;i<total_file;i++)

            {
                $('#image_preview').append("<img  class='img-thumbnail' src='"+URL.createObjectURL(event.target.files[i])+"' width='100px' height='auto'>");
            }
        });
    </script>
@endsection
