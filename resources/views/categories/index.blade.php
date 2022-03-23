@extends('layouts.main')
@section('header')
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Список категорий</h1>
        </div>
    </div>
@endsection
@section('content')
    @forelse($categoriesList as $categories)
       <div class="col">
         <div class="card shadow-sm">
             <img src="{{ $categories['image'] }}">

           <div class="card-body">
              <strong>
                  <a href=" {{ route('category.show', ['id' => $categories['id']]) }}">
                      {{ $categories['title'] }}
                  </a>
              </strong>
              <p class="card-text">
                  {!! $categories['description'] !!}
              </p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a href=" {{ route('category.show', ['id' => $categories['id']]) }}" class="btn btn-sm btn-outline-secondary">Подробнее</a>
                </div>
                  <small class="text-muted">Статус: <em>{{ $categories['status'] }}</em></small>
            </div>
        </div>
    </div>
</div>
    @empty
        <h2>Категорий нет</h2>
    @endforelse
@endsection