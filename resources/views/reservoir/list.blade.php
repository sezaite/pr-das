<ul>
    @foreach ($members as $member)
    <li class="list-item">
    <p class="list-item-name"><span class="highlighted-main-name">{{$member->name}} {{$member->surname}}</span>
          <span style="display: block">Location: <span class="highlighted-name">{{$member->memberReservoir->title}}</span></p>
      <a href="{{route('member.edit', [$member])}}" class="btn">EDIT</a>
      <form method="POST" data-delete-member data-member-id={{$member->id}} action="">
       @csrf
       <button type="submit" class="btn btn-delete">DELETE</button>
      </form></li>
    
    @endforeach
</ul>