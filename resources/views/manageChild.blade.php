<ul>

@foreach($childs as $child)

	<li>
		<div class="row">
            <div class="col-6">{{ $child->title }}<input type="hidden" name="child-id" id="child-id" value="{{ $child->id }}">
				@if(count($child->childs))

			            @include('manageChild',['childs' => $child->childs])

			        @endif
			     </div>
				<div class="col-6 text-left">
					<p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-sm" data-title="Delete" data-toggle="modal" data-target="#confirmModal" id="updateButton1" name="updateButton1">x</button></p>
	            </div>
        </div>

	</li>

@endforeach

</ul>
