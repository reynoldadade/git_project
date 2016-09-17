@extends('layouts.master')

@section('content')
	
		@foreach($authors as $author)

		  <li class="list-group-item">{{ $author->name}} ({{$author->password}})</li>
		 
		@endforeach
		 </ul>
	</div>
@endsection