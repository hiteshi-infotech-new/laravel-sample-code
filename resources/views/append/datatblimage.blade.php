@if($image)
<img id="preview" src="{{ ('product/'.$image) }}" alt="Preview" class="form-group" width="100" height="100">
@else
<img id="preview" src="https://via.placeholder.com/150" alt="Preview" class="form-group" width="100" height="100">
@endif