@extends('layouts.app')
@section('content')
    <div class="container card">
        <form action="{{route('tickets.store')}}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="row card-header">
                <h3>Create new post</h3>
            </div>

            <div class="card-body">
                <!-- row -->
                <div class="form-group row">
                    <div class="col-md-6 p-0">
                        <label for="row">Ряд</label>
                        <input type="number"
                               id="row"
                               class="form-control @error('row') is-invalid @enderror"
                               name="row"
                               value="{{old('row')}}"
                               autofocus>
                        @error('row')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                        @enderror
                    </div>
                </div>
                    <!-- placeNum -->
                 <div class="form-group row">
                    <div class="col-md-6 p-0">
                        <label for="placeNum">Номер</label>
                        <input type="number"
                               id="placeNum"
                               class="form-control @error('placeNum') is-invalid @enderror"
                               name="placeNum"
                               value="{{old('placeNum')}}"
                               autofocus>
                        @error('placeNum')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                        @enderror
                    </div>
                </div>

                <!-- status -->
                <div class="form-group row">
                    <div class="col-md-6 p-0">
                        <label class="form-check-label" for="status">Статус</label>
                        <select name="status" id="status" class="form-control" >
                            <option value="есть в наличии" selected>есть в наличии</option>
                            <option value="забронирован">забронирован</option>
                            <option value="продан">продан</option>
                            <option value="передан для реализации">передан для реализации</option>
                        </select>
                    </div>
                </div>

                <!-- place type -->
                <div class="form-group row">
                    <div class="col-md-6 p-0">
                        <label class="form-check-label" for="placeType">Тип места</label>
                        <select name="placeType" id="placeType" class="form-control" >
                            <option value="партер" selected>партер</option>
                            <option value="балкон">балкон</option>
                            <option value="ложа">ложа</option>
                            <option value="бельэтаж">бельэтаж</option>
                            <option value="vip">VIP</option>
                        </select>
                    </div>
                </div>

                <!-- cost -->
                <div class="form-group row">
                    <div class="col-md-6 p-0">
                        <label for="cost">Стоимость</label>
                        <input type="text"
                               id="cost"
                               class="form-control @error('cost') is-invalid @enderror"
                               name="cost"
                               value="{{old('cost')}}"
                               autofocus>
                        @error('cost')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                        @enderror
                    </div>
                </div>

                <input name="event_id" type="hidden" value="{{$event->id}}">
                <input name="order_id" type="hidden" value="{{$order->id ?? null}}">

                <!-- Submit -->
                <div class="row pt-2">
                    <button class="btn btn-primary" type="submit" >Create new post</button>
                </div>
            </div>
        </form>
    </div>
@endsection
