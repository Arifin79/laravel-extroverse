@extends('team.layout.main')

@section('content')

<div class="create-account">
    <div class="frame">
      <div class="text-wrapper">Team Members</div>
      <div class="group">
        <div class="overlap-group">
          <img class="account-wrapper" src="{{ URL::to('img/profile.jpeg') }}"/>
          <div class="div">Arifin Nurhidayah</div>
          <div class="text-wrapper-2">Developer</div>
          <a href="mailto:kucingmeong@gmail.com" target="_blank" rel="noopener noreferrer"><div class="text-wrapper-3">kucingmeong@gmail.com</div></a>
          <div class="text-wrapper-4">081293402849</div>
        </div>
      </div>
      <div class="text-wrapper-5">Extroverse</div>
    </div>
    <div class="text-wrapper-6">Team</div>
    </div>
</div>

@endsection
