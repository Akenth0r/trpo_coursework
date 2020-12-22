@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>
                    {{$event->title}}
                </h4>
            </div>
            <div class="card-body">
                <h3>Описание</h3>
                <p>{{$event->description}}</p>
                <h3>Количество оставшихся билетов</h3>
                <p>{{$event->tickets()->where('status', '=', 'есть в наличии')->count()}}</p>
            </div>
            <!-- Active ticket table -->
            @if ($event->tickets()->where('status', '=', 'есть в наличии')->count() > 0)
            <h3>Доступные билеты</h3>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Ряд</th>
                    <th>Место</th>
                    <th>Цена</th>
                    <th>Тип</th>
                </tr>
                </thead>
                @foreach ($event->tickets()->where('status', '=', 'есть в наличии')->get() as $ticket)
                    <tr>
                        <!-- Ряд -->
                        <td>
                            {{ $ticket->row }}
                            @if (auth()->user()->priviledge == 1)
                                <a href="{{route('tickets.edit', compact('ticket'))}}" class="mx-1"><span class="fas fa-edit text-dark"></span></a>
                                <a href="" onclick="event.preventDefault(); document.getElementById('delete-form-{{$ticket->id}}').submit()">
                                    <span class="fas fa-trash text-dark"></span>
                                </a>
                                <form action="{{route('tickets.destroy', compact('ticket'))}}" method="post" id="delete-form-{{$ticket->id}}" class="d-none">
                                    @csrf
                                    @method('delete')
                                </form>
                            @endif
                        </td>
                        <!-- Место -->
                        <td>
                            {{$ticket->placeNum}}
                        </td>
                        <!-- Цена -->
                        <td>
                            {{$ticket->cost}}
                        </td>
                        <!-- Тип -->
                        <td>
                            {{$ticket->placeType}}
                        </td>
                    </tr>
                @endforeach
            </table>
            @endif


            <!-- Buttons -->
            @if (auth()->user()->priviledge == 0)
                @if ( $event->tickets->where('status', '=', 'есть в наличии')->count() > 0)
                <a class="btn btn-outline-dark" href="{{route("orders.create", ["user" => auth()->user(), "event" => $event])}}">
                    Сделать заказ
                @else
                    <h3> Нет доступных билетов </h3>
                @endif
            </a>
            @else
                <a class="btn btn-outline-dark" href="{{route("orders.index", ['event' => $event])}}">
                    Просмотреть заказы по этому мероприятию
                </a>
                <a class="btn btn-outline-dark" href="{{route("tickets.create", ['event' => $event])}}">
                    Добавить новый билет
                </a>
            @endif
        </div>
    </div>
@endsection
