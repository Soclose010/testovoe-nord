<label for="{{ $name }}">{{ $sortParams[$name] }}</label>
<select name="{{ $name }}" id="{{ $name }}" class="form-select" aria-label="Default select example">
    <option value="asc" {{ $value == 'asc' ? 'selected' : '' }}>asc</option>
    <option value="desc" {{ $value == 'desc' ? 'selected' : '' }}>desc</option>
    <option value="no" {{ $value == 'no' ? 'selected' : '' }}>no</option>
</select>
@error($name)
    <div class="alert alert-danger mt-2">{{ $message }}</div>
@enderror
