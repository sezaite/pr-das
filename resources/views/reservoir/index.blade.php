@extends('layouts.app')

@section('content')
<div class="container mod" style="display: none" id="mod">
    <div class="card">
        <div class="card-header">
            Warning!
        </div>
        <div class="card-body">
            <p style="margin: 10px 0"></p>
                <div class="mod-btns">
                <button type="button" class="btn">Cancel</button>
                <button type="button" class="btn btn-delete">Delete</button>
                </div>
        </div>
    </div>
    </div>
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
                    <span class="highlighted-name">{{$reservoir->area}} m<sup class="highlighted-name">2</sup>.</span></span>
                </p>
                  <a href="" class="btn">EDIT</a>
                  <form method="POST" class = "book-deleted" action="{{route('reservoir.destroy', [$reservoir])}}">
                   @csrf
                   <button type="submit" class="btn btn-delete">DELETE</button>
                  </form></li>
                </ul>
                @endforeach
               </div>
           </div>
       </div>
   </div>
</div>
@endsection