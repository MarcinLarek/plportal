@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row pt-5 pb-3">
    <h2>Zarządzanie przywilejami dla admina {{$admin->name}} {{$admin->surname}} ({{$admin->login}})</h2>
  </div>
  <div class="pb-1">
    <a href="{{route('admin.admins')}}" class="text-primary"> <u>Powrót</u> </a>
  </div>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Sekcja</th>
          <th>Możliwość zarządzania</th>
          <th>Zmień</th>
        </tr>
      </thead>
      <tbody>
        @foreach($sections as $section)
          <tr>
            <td>{{$section->section}}</td>
            @if($admin->ifmenages($section->id))
            <td class="table-success">Tak</td>
            @else
            <td class="table-danger">Nie</td>
            @endif
            <td> <a href="{{((route('admin.admins.storeprivileges', ['id' => $section->id])))}}">Przełącz</a> </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</div>
@endsection
