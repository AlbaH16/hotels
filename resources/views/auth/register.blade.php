@extends('layouts.app')

@section('content')
<form action="{{ route('register') }}" method="post">
    @csrf
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <input type="text" name="email" placeholder="email"><br>
    <input type="password" name="password" placeholder="password"><br>
    <input type="password" name="password_confirmation" placeholder="confirmacion"><br>

    <input type="radio" id="Mujer" name="gender" value="Mujer">
    <label for="Mujer">Mujer</label><br>
    <input type="radio" id="Hombre" name="gender" value="Hombre">
    <label for="Hombre">Hombre</label><br>
    <input type="radio" id="Otro" name="gender" value="Otro">
    <label for="Otro">Otro</label><br>

    <input type="date" name="birth_date"><br>

    <input type="radio" id="Soltero" name="relationship_status" value="Soltero">
    <label for="Soltero">Soltero</label><br>
    <input type="radio" id="En_pareja" name="relationship_status" value="En pareja">
    <label for="En_pareja">En pareja</label><br>
    <input type="radio" id="Es_complicado" name="relationship_status" value="Es complicado">
    <label for="Es_complicado">Es complicado</label><br>

    <button type="submit">Ok</button>
</form>
@endsection
