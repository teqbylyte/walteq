@props(['inputName'])
@error($inputName)
<div class="invalid-feedback">{{ $message }}</div>
@enderror
