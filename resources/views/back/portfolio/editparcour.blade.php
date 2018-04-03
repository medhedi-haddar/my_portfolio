@extends('layouts.admin_master')
@section('content')
    <form action="{{route('portfolio.update',$parcour->id)}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{method_field('PUT')}}
        <div class="col-md-12">
            <div class="card  mb-3">
                <div class="card-header">
                    <i class="fa fa-file"></i> <span> Edit parcour :</span>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title"  name="title" value="{{$parcour->title}}">
                        @if($errors->has('title')) <span class="error">{{$errors->first('title')}}</span>@endif
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea  class="form-control" name="description" id="description">{{$parcour->description}}
                        </textarea>
                        @if($errors->has('description')) <span class="error">{{$errors->first('description')}}</span>@endif
                    </div>
                    <div class="form-group ">
                        <label for="inputState">type</label>
                        <select id="inputState" class="form-control" name="type">
                            <option {{is_null($parcour->type) ? 'selected' : ''}} value="">No type</option>
                            <option {{(!is_null($parcour->type) and $parcour->type == 'education') ? 'selected' : ''}} value="education">education</option>
                            <option {{(!is_null($parcour->type) and $parcour->type == 'experience') ? 'selected' : ''}} value="experience">experience</option>


                        </select>
                        </select>
                        @if($errors->has('type')) <span class="error">{{$errors->first('type')}}</span>@endif
                    </div>
                    <div class="form-group">
                        <label for="etablissement">Etablissement</label>
                        <input type="text" class="form-control" id="etablissement"  name="etablissement" value="{{$parcour->etablissement}}">
                        @if($errors->has('etablissement')) <span class="error">{{$errors->first('etablissement')}}</span>@endif
                    </div>
                    <div class="form-group">
                        <label for="start_date">Start date</label>
                        <input type="date" class="form-control" id="start_date" value="{{$parcour->start_date}}"  name="start_date">
                        @if($errors->has('start_date')) <span class="error">{{$errors->first('start_date')}}</span>@endif
                    </div>
                    <button type="submit" class="btn btn-success">Enregistrer <i class="fa fa-save"></i> </button>
                </div>
            </div>
        </div>
    </form>
@endsection