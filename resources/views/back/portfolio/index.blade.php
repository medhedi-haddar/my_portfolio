@extends('layouts.admin_master')
@section('content')

<p><a class="btn btn-primary" href="{{route('portfolio.create')}}">Ajouter un parcour</a></p>

        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
<div class="card  mb-3">
    <div class="card-header">
        <i class="fa fa-archive"></i>
        Experiences
    </div>
    <div class="card-body">
        <table class="table table-bordered table-sm ">
            <thead>
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Type</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            <!-- experience -->
            @forelse($experiences as $experience)
            <tr>
                <th>{{date('Y',strtotime($experience->start_date))}}</th>
                <th>{{$experience->title}} </th>
                <td>{{$experience->description}}</td>
                <td>{{$experience->type}}</td>
                <td><a class="btn btn-success btn-sm" href="{{route('portfolio.edit', $experience->id)}}">
                        <i class="fa fa-edit "></i>
                            Modifier
                    </a>
                </td>
                <td>
                    <form class="delete" action="{{route('portfolio.destroy', $experience->id)}}" method="post">
                        {{ csrf_field() }}
                        {{method_field('DELETE')}}
                        <button type="submit" class="btn btn-danger btn-sm" >delete
                            <span class="glyphicon glyphicon-trash"></span>

                        </button>
                    </form>
                </td>
            </tr>
            @empty
                <tr></tr>
                @endforelse

            </tbody>
        </table>
    </div>
</div>
    <div class="card  mb-3">
        <div class="card-header">
            <i class="fa fa-university"></i>
            Formations
        </div>
        <div class="card-body">
        <table class="table table-sm  table-bordered ">
            <thead>
            <tr>
                <th scope="col">date</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Type</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            <!-- Formations -->
            @forelse($educations as $education)
                <tr>
                    <th>{{date('Y', strtotime($education->start_date))}}</th>
                    <th>{{$education->title}} </th>
                    <td>{{$education->description}}</td>
                    <td>{{$education->type}}</td>
                    <td><a class="btn btn-success btn-sm" href="{{route('portfolio.edit', $education->id)}}">
                            <i class="fa fa-edit "></i>
                            Modifier
                        </a>
                    </td>
                    <td>
                        <form class="delete" action="{{route('portfolio.destroy', $education->id)}}" method="post">
                            {{ csrf_field() }}
                            {{method_field('DELETE')}}
                            <button type="submit" class="btn btn-danger btn-sm" >delete
                                <span class="glyphicon glyphicon-trash"></span>

                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">
                        <p>-- aucune formation pour l'instant --</p>
                    </td>
                    </tr>
            @endforelse

            </tbody>
            </table>
    </div>
</div>
@endsection
@section('scripts')
    <script src="{{asset('js/app.js')}}"></script>

@show