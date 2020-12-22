@extends('layouts.app')

@section('content')
<div class="container shadow p-4 rounded">
    <h2>Афиша</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Название</th>
            <th>Тип</th>
            <th>Место проведения</th>
            <th>Дата проведения</th>
            <th>Количество билетов</th>
        </tr>
        </thead>
        @foreach ($events as $event)
        <tr>
            <!-- Название -->
            <td>
                <a href="{{ route('events.show', ['event' => $event->id]) }}">{{ $event->title }}</a>
                @if ($user->priviledge == 1)
                <a href="{{route('events.edit', compact('event'))}}" class="mx-1"><span class="fas fa-edit text-dark"></span></a>
                @if ($event->orders->count() == 0)
                <a href="" onclick="event.preventDefault(); document.getElementById('delete-form-{{$event->id}}').submit()">
                    <span class="fas fa-trash text-dark"></span>
                </a>
                <form action="{{route('events.destroy', compact('event'))}}" method="post" id="delete-form-{{$event->id}}" class="d-none">
                    @csrf
                    @method('delete')
                </form>
                @endif
                    <a href="{{route("tickets.create", compact('event'))}}" >
                        <span class="fa fa-ticket text-dark"></span>
                    </a>
                @endif
            </td>
            <!-- Тип -->
            <td>
                {{$event->type}}
            </td>
            <!-- Место проведения -->
            <td>
                {{$event->place}}
            </td>
            <!-- Дата проведения -->
            <td>
                {{$event->date}}
            </td>
            <!-- Количество билетов -->
            <td>
                {{$event->tickets()->count()}}
            </td>
        </tr>
        @endforeach
    </table>
    @if ($user->priviledge == 1)
        <div class=" pb-2">
            <div class="col-12 pb-3">
                <a href="{{route("events.create")}}" class="btn btn-outline-dark"> Добавить мероприятие </a>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            {{$events->links()}}
        </div>
    </div>
</div>
@endsection
