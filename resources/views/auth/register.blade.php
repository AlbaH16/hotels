@extends('layouts.app')

@section('content')
<div class="uk-container uk-container-xlarge">
    <div class="uk-child-width-2-2@s uk-child-width-3-3@l uk-text-center" uk-grid>
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
            <div>
                <h3 class="uk-h3 uk-text-secondary">Crear una cuenta</h3>
                <h4 class="uk-h4 uk-text-secondary">Registrate para obtener beneficios kinky</h4>
                <div class="uk-child-width-1-2@s uk-child-width-1-3@m uk-text-center" uk-grid>
                    <h5 class="uk-h5 uk-text-secondary"><span uk-icon="heart"></span>
                        <span class="uk-text-bold">Guarda</span> tus LoveHotels y Habitaciones favoritas.
                    </h5>
                    <h5 class="uk-h5 uk-text-secondary"><span uk-icon="mail"></span>
                        <span class="uk-text-bold">Recibe</span> el mejor contenido.
                    </h5>
                    <h5 class="uk-h5 uk-text-secondary"><span uk-icon="star"></span>
                        <span class="uk-text-bold">Califica</span> los Love Hotels y sus habitaciones.
                    </h5>
                </div>
                <div class="uk-card uk-card-default uk-card-body uk-text-secondary uk-border-rounded">
                    <div class="uk-child-width-1-1@s uk-child-width-1-2@l uk-text-left" uk-grid>
                        <div>
                            <h5 class="uk-h5 uk-text-bold">Correo Electrónico<sub>*</sub></h5>
                            <div class="uk-margin">
                                <input class="uk-input uk-border-rounded" type="text" name="email" placeholder="correo@ejemplo.com">
                            </div>
                            <h5 class="uk-h5 uk-text-bold">Contraseña<sub>*</sub></h5>
                            <div class="uk-margin">
                                <input class="uk-input uk-border-rounded" type="password" name="password" placeholder="Introduce tu contraseña">
                            </div>
                            <h5 class="uk-h5 uk-text-bold">Repite tu contraseña<sub>*</sub></h5>
                            <div class="uk-margin">
                                <input class="uk-input uk-border-rounded" type="password" name="password_confirmation" placeholder="correo@ejemplo.com">
                            </div>

                        </div>
                        <div>
                            <h5 class="uk-h5 uk-text-bold">Género<sub>*</sub></h5>
                            <div class="uk-button-group" data-uk-button-radio>
                                <label class="uk-button uk-button-primary uk-border-rounded">
                                    <input type="radio" name="gender" value="Mujer" style="display:none;"/>
                                    Hombre
                                </label>
                                <label class="uk-button uk-button-primary uk-border-rounded">
                                    <input type="radio" name="gender" value="Hombre" style="display:none;"/>
                                    Mujer
                                </label>
                                <label class="uk-button uk-button-primary uk-border-rounded">
                                    <input type="radio" name="gender" value="Otro" style="display:none;"/>
                                    Otro
                                </label>
                            </div>
                            <h5 class="uk-h5 uk-text-bold">Fecha de nacimiento<sub>*</sub></h5>
                            <input type="date" name="birth_date" class="uk-input uk-border-rounded">
                            <h5 class="uk-h5 uk-text-bold">Situación sentimental<sub>*</sub></h5>
                            <div class="uk-button-group" data-uk-button-radio>
                                <label class="uk-button uk-button-primary uk-border-rounded">
                                    <input type="radio" name="relationship_status" value="Soltero" style="display:none;"/>
                                    Soltero
                                </label>
                                <label class="uk-button uk-button-primary uk-border-rounded">
                                    <input type="radio" name="relationship_status" value="En pareja" style="display:none;"/>
                                    En pareja
                                </label>
                                <label class="uk-button uk-button-primary uk-border-rounded">
                                    <input type="radio" name="relationship_status" value="Es complicado" style="display:none;"/>
                                    Es complicado
                                </label>
                            </div>
                            <h6 class="uk-h6">Campos obligatorios <sub>*</sub></h6>
                            <button type="submit" class="uk-button uk-button-primary uk-border-rounded uk-width-1-1" ><span class="uk-text-bold">Crear Cuenta</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
