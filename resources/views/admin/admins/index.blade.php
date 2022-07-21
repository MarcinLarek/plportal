@extends('layouts.app')
@section('content')
<div class="container">
  <h4>Administratorzy</h4>
  <hr />
  @if(session()->has('successalert'))
  <div class="alert alert-success">
    <h1>Zmiany zostały zapisane</h1>
  </div>
  @endif
  <a href="{{route('admin.admins.create')}}" class="text-primary" >Dodaj administratora</a>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Id</th>
          <th>Login</th>
          <th>Imię i nazwisko</th>
          <th>Email</th>
          <th>Super Admin</th>
          <th>Data rejestracji</th>
          <th>Przywileje</th>
          <th>Opcje</th>
        </tr>
      </thead>
      @if($admins->isNotEmpty())
      <tbody>
        <?php $i = 1; ?>
        @foreach($admins as $admin)
        <tr>
          <td>{{ $admin->id }}</td>
          <td>{{ $admin->login }}</td>
          <td>{{ $admin->name}} {{$admin->surname}}</td>
          <td>{{ $admin->email }}</td>
          @if($admin->global_privileges == 1)
          <td class="table-success">Tak</td>
          @else
          <td class="table-danger">Nie</td>
          @endif
          <td>{{ $admin->created_at }}</td>
          <td>
            <a href="{{ route('admin.admins.editprivileges', ['id' => $admin->id]) }}" class="text-primary">
              Edytuj
            </a>
          </td>
          <td>
            <a href="{{ route('admin.admins.edit', ['id' => $admin->id]) }}" class="text-primary">
              Edytuj
            </a>
          </td>
        </tr>
        @endforeach
      </tbody>
      @else
      <tr>
        <td colspan="5">Brak danych do wyświetlenia</td>
      </tr>
      @endif
    </table>
  </div>
</div>
@endsection
