<form action="{{ $action ?? '#' }}" method="{{ $method ?? 'POST' }}" enctype="multipart/form-data">
    @csrf
    @if (isset($changeMethod))
        @if ($changeMethod == 'patch')
            @method('patch')
        @endif
    @endif
    <div class="form-items">
        @foreach ($formFields as $formField)
            <div class="form-item">
                {!! $formField !!}
            </div>
        @endforeach
    </div>
    <button type="submit" class="submit-button">{{ $submitText ?? 'Submit' }}</button>
</form>
