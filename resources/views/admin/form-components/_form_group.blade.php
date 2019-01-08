<div class="form-group {{$errors->has($field) ?'has-error' : ''}}">
    {{ $slot }}
    @include('admin.form-components._help_block',['field' => $field])
</div>