@extends('layouts.admin_master')
@section('content')
    <form action="{{route('portfolio.store')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="col-md-12">
            <div class="card  mb-3">
            <div class="card-header">
                <i class="fa fa-file"></i> <span> create parcour :</span>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title"  name="title" placeholder="entre title">
                    @if($errors->has('title')) <span class="error">{{$errors->first('title')}}</span>@endif
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea  class="form-control" name="description" id="description" placeholder="Description..."></textarea>
                    @if($errors->has('description')) <span class="error">{{$errors->first('description')}}</span>@endif
                </div>
                <div class="form-group ">
                    <label for="inputState">type</label>
                    <select id="inputState" class="form-control" name="type">
                        <option selected value="">No type</option>
                            <option value="education">education</option>
                            <option value="experience">experience</option>
                    </select>
                    @if($errors->has('type')) <span class="error">{{$errors->first('type')}}</span>@endif
                </div>
                <div class="form-group">
                    <label for="etablissement">Etablissement</label>
                    <input type="text" class="form-control" id="etablissement"  name="etablissement" placeholder="etablissement">
                    @if($errors->has('etablissement')) <span class="error">{{$errors->first('etablissement')}}</span>@endif
                </div>
                <div class="form-group">
                    <label for="start_date">Start date</label>
                    <input type="date" class="form-control" id="start_date"  name="start_date">
                    @if($errors->has('start_date')) <span class="error">{{$errors->first('start_date')}}</span>@endif
                </div>
                <button type="submit" class="btn btn-success">Enregistrer <i class="fa fa-archive"></i> </button>
            </div>
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    <script src="{{asset('js/app.js')}}"></script>
@show