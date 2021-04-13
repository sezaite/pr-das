@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">List of reservoirs</div>
               <div class="card-body">
                <ul>
                @foreach ($reservoirs as $reservoir)
                <li class="list-item">
                <p class="list-item-name">
                    <span class="highlighted-main-name">{{$reservoir->title}}</span>
                    <span style="display: block">Size: 
                    <span class="highlighted-name">{{$reservoir->area}}.</span></span>
                </p>
                  <a href="{{route('reservoir.edit', [$reservoir])}}" class="btn">EDIT</a>
                  <form method="POST" action="{{route('reservoir.destroy', [$reservoir])}}">
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