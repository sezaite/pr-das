@extends('layouts.app')

@section('content')
{{-- <div class="container mod" id="mod" style="display: none">
<div class="card">
    <div class="card-header">
        Warning!
    </div>
    <div class="card-body">
        <p style="margin: 10px 0">
        
        </p>
        <div class="mod-btns">
            <form action="{{route('member.destroy')}}" name="member_id" method=
            "POST" class="destroy">
            @csrf
            <button type="submit" class="btn btn-delete">Delete</button>
            </form >

            <form action="">
                <button type="button" class="btn">Cancel</button>
            </form>
        </div>
    </div>
</div>
</div> --}}
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
              s
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
