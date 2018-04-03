@extends('layouts.master')

@section('content')
    <div class="m-0 section-description">
        <div class="container ">
            <h2>HADDAR Mohamed Elhedi</h2>
            <img src="{{asset('images/logo_w_r.png')}}" width="350px" alt="logo">
            <div class="col-md-8 offset-md-2 ">
                <p>Passionné par l'informatique et notamment par le développement qui me permet de créer et d'innover
                    comme bon me semble,je souhaite vous faire partager mes connaissances dans ces domaines pour que vous puissiez
                    vous plaire à développer.</p>
            </div>
            <a href="#" class="btn btn-outline-info ">En savoir plus <i class="fa fa-user"></i></a>
        </div>
    </div>



        <div class="section experience" id="aboutme">
            <div class="container">
                <h2 class="title-section ta-center">Experience</h2>
                <div class="timeline">

                    @forelse($experiences as $experience)
                        <div class="item">
                            <div class="item-content">
                                <span class="date-item">{{date('Y', strtotime($experience->start_date))}}</span>
                                <span class="item-title">{{$experience->title}}</span>
                                <p>
                                    {{$experience->description}}
                                </p>
                                <p class="etablissement">
                                    {{$experience->etablissement}}
                                </p>
                            </div>
                        </div>
                    @empty
                        <p> aucune experience</p>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- education -->
        <div class="section education">
            <div class="container">
                <h2 class="title-section ta-center">Education</h2>
                <div class="timeline">
                    @forelse($educations as $education)
                    <div class="item">
                        <div class="item-content">
                            <span class="date-item">{{date('Y', strtotime($education->start_date))}}</span>
                            <span class="item-title">{{$education->title}}</span>
                            <p>
                                {{$education->description}}
                            </p>
                            <p class="etablissement">
                                {{$education->etablissement}}
                            </p>

                        </div>
                    </div>
                    @empty
                        <p> aucune formation</p>
                    @endforelse
                </div>
            </div>
        </div>
@endsection