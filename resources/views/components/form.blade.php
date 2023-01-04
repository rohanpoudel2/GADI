<form action="{{ $action ?? '#' }}" method="{{ $method ?? 'POST' }}">
    @csrf
    <div class="form-items">
        @foreach ($formFields as $formField)
            <div class="form-item">
                {!! $formField !!}
            </div>
        @endforeach
    </div>
    <button type="submit" class="submit-button">{{ $submitText ?? 'Submit' }}</button>
</form>
