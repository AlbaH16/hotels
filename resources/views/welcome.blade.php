@extends('layouts.app')

@section('content')
<ExampleComponent userid="{{ Auth::id() }}" />
@endsection
