@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Create</div>
               <div class="card-body">
                <form method="POST" action="{{route('member.store')}}">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="member_name" value="{{old('member_name')}}">
                        <small class="form-text text-muted">Name of the member</small>
                      </div>
                      <div class="form-group">
                        <label>Surame</label>
                        <input type="text" class="form-control" name="member_surname" value="{{old('member_surname')}}">
                        <small class="form-text text-muted">Surname of the member</small>
                      </div>
                      <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" name="member_city" value="{{old('member_city')}}">
                        <small class="form-text text-muted">Residency of the member</small>
                      </div>
                      <div class="form-group">
                        <label>Experience</label>
                        <input type="number" class="form-control" name="member_experience" value="{{old('member_experience')}}">
                        <small class="form-text text-muted">Years of experience</small>
                      </div>
                      <div>
                      <div class="form-group">
                      <label>Joined</label>
                        <input type="number" class="form-control" name="member_year" value="{{old('member_year')}}">
                        <small class="form-text text-muted">Member since</small>
                      </div>
                      <div class="form-group author">
                        <label>Reservoir</label>
                      <select name="reservoir_id">
                      @foreach ($reservoirs as $reservoir)
                          <option value="{{$reservoir->id}}">{{$reservoir->title}}</option>
                      @endforeach
                     </select>
                      </div>
                      <div class="form-group">
                      <label>Notes</label> <textarea name="member_notes">{{old('member_notes')}}</textarea>
                      <small class="form-text text-muted">Any additional information</small>
                      </div>
                    @csrf
                    <button type="submit" class="btn large-btn">Create</button>
                 </form>
               </div>
           </div>
       </div>
   </div>
</div>

@endsection
