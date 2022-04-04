@extends('layouts.admin')
@section('title') Список источников новостей@endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список источников новостей</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.scources.create') }}" class="btn btn-sm btn-outline-secondary">Добавить категорию</a>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        @include('inc.messages')
        <table class="table table-bordered">
            <thead>
              <tr>
                  <th>#ID</th>
                  <th>Название</th>
                  <th>Ссылка</th>
                  <th>Опции</th>
              </tr>
            </thead>
            <tbody>
              @forelse($scources as $scource)
                  <tr>
                      <td>{{ $scource->id }}</td>
                      <td>{{ $scource->name }}</td>
                      <td>{{ $scource->url }}</td>                      
                      <td>
                          <a href="{{ route('admin.scources.edit', ['scource' => $scource->id]) }}">Ред.</a>
                          &nbsp;
                          <a href="javascript:;" style="color:red;">Удл.</a>
                      </td>
                  </tr>
              @empty
                  <tr><td colspan="4">Записей нет</td></tr>
              @endforelse
            </tbody>
        </table>
        {{ $scources->links() }}
    </div>
@endsection

@push('js')
    <script>//alert("Welcome")</script>
@endpush