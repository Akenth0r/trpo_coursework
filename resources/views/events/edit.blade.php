@extends('layouts.app')
@section('content')
    <div class="container card">
        <form action="{{route('events.update', ["event" => $event])}}" enctype="multipart/form-data" method="post">
            @csrf
            @method('patch')
            <div class="row card-header">
                <h3>Create new post</h3>
            </div>

            <div class="card-body">
                <!-- Title -->
                <div class="form-group row">
                    <div class="col-md-6 p-0">
                        <label for="title">Title</label>
                        <input type="text"
                               id="title"
                               class="form-control @error('title') is-invalid @enderror"
                               name="title"
                               value="{{$event->title}}"
                               autofocus>
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                        @enderror
                    </div>
                </div>

                <!-- type -->
                <div class="form-group row">
                    <div class="col-md-6 p-0">
                        <label class="form-check-label" for="type">Тип мероприятия</label>
                        <select name="type" id="type" class="form-control" >
                            <option value="концерт" @if($event->type == "концерт") selected @endif>концерт</option>
                            <option value="шоу" @if($event->type == "шоу") selected @endif>шоу</option>
                            <option value="спектакль" @if($event->type == "спектакль") selected @endif>спектакль</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 p-0">
                        <label for="description">Описание мероприятия</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control @error('description')
                            is-invalid @enderror">{{$event->description}}</textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 p-0">
                        <label for="place">place</label>
                        <input type="text"
                               id="place"
                               class="form-control @error('place') is-invalid @enderror"
                               name="place"
                               value="{{$event->place}}"
                               autofocus>
                        @error('place')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 p-0">
                        <label for="date">Дата и время проведения</label>
                        <input type="datetime-local"
                               id="date"
                               class="form-control @error('date') is-invalid @enderror"
                               name="date"
                               value="{{$event->date->format("Y-m-d\TH:i")}}"
                               autofocus>
                        @error('date')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 p-0">
                        <label for="ticketsCount">Число билетов</label>
                        <input type="number"
                               id="ticketsCount"
                               class="form-control @error('ticketsCount') is-invalid @enderror"
                               name="ticketsCount"
                               value="{{$event->ticketsCount}}"
                               autofocus>
                        @error('ticketsCount')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                        @enderror
                    </div>
                </div>

                <!-- Submit -->
                <div class="row pt-2">
                    <button class="btn btn-primary" type="submit" >Изменить</button>
                </div>
            </div>
        </form>
    </div>
@endsection
