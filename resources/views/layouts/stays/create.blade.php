@extends('layouts.app')

@section('content')
<CreateStayComponent user_id="{{ Auth::id() }}" />
@endsection
