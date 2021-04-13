@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">List of members</div>
               <div class="card-body">
                <ul>
                @foreach ($members as $member)
                <li class="list-item">
                <p class="list-item-name"> <span class="highlighted-main-name">{{$member->name}} {{$member->surname}}</span>
                      <span style="display: block">Member of <span class="highlighted-name">{{$member->memberReservoir->title}}</span>.</p>
                  <a href="{{route('member.edit', [$member])}}" class="btn">EDIT</a>
                  <form method="POST" action="{{route('member.destroy', [$member])}}">
                   @csrf
                   <button type="submit" class="btn">DELETE</button>
                  </form></li>
                </ul>
                @endforeach
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
