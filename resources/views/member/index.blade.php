@extends('layouts.app')

@section('content')
<div class="container mod" id="mod">
<div class="card">
    <div class="card-header">
        Warning!
    </div>
    <div class="card-body">
        <p style="margin: 10px 0">Are you sure?</p>
        
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
               <div class="card-header">List of members</div>
               <div class="card-body">
                <div class="filter form-group author">
                    <form action="{{route('member.index')}}" method="get">
                 <label>Filter by reservoir:</label>
                 <select name="reservoir_id">
                     @foreach ($reservoirs as $reservoir)
                         <option value="{{$reservoir->id}}" @if($reservoir->id == $request->reservoir_id) selected @endif>{{$reservoir->title}}</option>
                     @endforeach
              </select>
                 <button type="submit" class="btn">Filter</button>
                 <a href="{{route('member.index')}}" class="btn clear">Clear</a>
             </div>
         </form>
                <ul>
                @foreach ($members as $member)
                <li class="list-item">
                <p class="list-item-name"><span class="highlighted-main-name">{{$member->name}} {{$member->surname}}</span>
                      <span style="display: block">Location: <span class="highlighted-name">{{$member->memberReservoir->title}}</span></p>
                  <a href="{{route('member.edit', [$member])}}" class="btn">EDIT</a>
                  <form method="POST" data-member-id={{$member->id}} action="{{route('member.destroy', [$member])}}">
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
