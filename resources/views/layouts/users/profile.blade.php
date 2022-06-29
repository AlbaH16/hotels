@extends('layouts.app')

@section('content')
<UserProfileComponent user_id="{{ $user_id  }}" user_email={{ $user_email }} />
@endsection
