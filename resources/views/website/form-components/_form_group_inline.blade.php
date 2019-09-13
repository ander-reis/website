<div class="form-group {{ $class }} {{$errors->has($field) ?' has-error' : ''}}">
    {{ $slot }}
    @include('website.form-components._help_block',['field' => $field])
</div>
