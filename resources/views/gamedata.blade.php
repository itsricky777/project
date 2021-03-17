@extends('layouts.app')

@section('content')

	<section class="page-section bg-light" id="portfolio">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Game</h2>
                    <h3 class="section-subheading text-muted">
                    	@if(Route::has('search'))
                    		{{"You Search About "}}<b>{{ strtoupper($search) }}</b>
                    	@else
                    		{{"Enjoy Your Time"}}
                    	@endif
                    </h3>
                </div>
                <div class="row">
               @if(count($game) >= 1)
                @foreach($game as $info)
                    <div class="col-lg-4 col-sm-6" style="display: flex; align-items: center; flex-direction: column; margin: 0 auto";>
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-toggle="modal" href="#modal{{$info->id}}">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="/storage/image/{{$info->image}}" alt="" style="width: 295px ; height: 167px;" />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">{{$info->name}}</div>
                                <div class="portfolio-caption-subheading text-muted">{{$info->genre}}</div>
                            </div>
                        </div>
                    </div>

        <div class="portfolio-modal modal fade" id="modal{{$info->id}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="width: 80%; margin:auto;">
                    <div class="close-modal" data-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project Details Go Here-->
                                    <h2 class="text-uppercase">{{$info->name}}</h2>
                                    <p class="item-intro text-muted">{{ $info->genre }}</p>
                                    <img class="img-fluid d-block mx-auto" style="width:500px; height: 500px;" src="/storage/image/{{$info->image}}" alt="" />
                                    <h3 style="text-align: center;">Description</h3>
                                    <p>{{ $info->desc }}</p>
                                <div style="margin-bottom: 20px;" >
                                    	@php
                                    	$minim = $min->where('name' , '=' , $info->name );
                                    	$recom = $rec->where('name' , '=' , $info->name ) ;
                                    	@endphp
                                    <div style=" display: inline-block; margin-right: 80px; border-style: solid; border-radius: 10px; padding: 10px 10px 10px 10px; width: 40%">
                                    	<h5>Minimum</h5>
                                    @foreach($minim as $m)
                                    <ul class="list-inline" style="text-align: left;">
                                        <li>OS		 : {{$m->OS}}</li>
                                        <li>Processor: {{$m->processor}}</li>
                                        <li>Memory	 : {{$m->memory}}</li>
                                        <li>Graphic	 : {{$m->graphic}}</li>
                                        <li>Storage  : {{$m->storage}}</li>
                                    </ul>
                                    @endforeach
                                    @foreach($recom as $r)
                                    </div>
                                    <div style="display: inline-block;border-style: solid; border-radius: 10px; padding: 10px 10px 10px 10px; width: 40%">
                                    	<h5>Recommended</h5>
                                    <ul class="list-inline" style="text-align: left;">
                                        <li>OS		 : {{$r->OS}}</li>
                                        <li>Processor: {{$r->processor}}</li>
                                        <li>Memory	 : {{$r->memory}}</li>
                                        <li>Graphic	 : {{$r->graphic}}</li>
                                        <li>Storage  : {{$r->storage}}</li>
                                    </ul>
                                    @endforeach
                                    </div>
                                </div>
                                    <a class="btn btn-primary" href="{{ route('download' , ['id'=>$info->id]) }}" type="button" style="background-color: blue;margin-bottom: 20px;" >
                                        Download
                                    </a><br>
                                    <button class="btn btn-primary" data-dismiss="modal" type="button">
                                        <i class="fas fa-times mr-1"></i>
                                        Close Project
                                    </button><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                  @endforeach
                @endif

                </div>
            </div>
        </section>

@endsection