@extends('layouts.app')

@section('content')
    <div class="container shadow p-4 rounded">
        <h2>Афиша</h2>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Пользователь</th>
                <th>Номер телефона</th>
                <th>Число билетов</th>
                <th>Адрес</th>
                <th>Дата проведения</th>
                <th>Количество билетов</th>
            </tr>
            </thead>
            @foreach ($orders as $order)
                <tr>
                    <!-- Название -->
                    <td>
                        <a href="{{ route('orders.show', ['order' => $order->id]) }}">{{ $order->title }}</a>
                        @if ($user->priviledge == 1)
                            <a href="{{route('orders.edit', compact('order'))}}" class="mx-1"><span class="fas fa-edit text-dark"></span></a>
                            <a href="" onclick="order.prorderDefault(); document.getElementById('delete-form-{{$order->id}}').submit()">
                                <span class="fas fa-trash text-dark"></span>
                            </a>
                            <form action="{{route('orders.destroy', compact('order'))}}" method="post" id="delete-form-{{$order->id}}" class="d-none">
                                @csrf
                                @method('delete')
                            </form>
                        @endif
                    </td>
                    <!-- Тип -->
                    <td>
                        {{$order->type}}
                    </td>
                    <!-- Место проведения -->
                    <td>
                        {{$order->place}}
                    </td>
                    <!-- Дата проведения -->
                    <td>
                        {{$order->date}}
                    </td>
                    <!-- Количество билетов -->
                    <td>
                        {{$order->ticketsCount}}
                    </td>
                </tr>
            @endforeach
        </table>
        @if ($user->priviledge == 1)
            <div class=" pb-2">
                <div class="col-12 pb-3">
                    <a href="{{route("orders.create")}}" class="btn btn-outline-dark"> Добавить мероприятие </a>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                {{$orders->links()}}
            </div>
        </div>
    </div>
@endsection
