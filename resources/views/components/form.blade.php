<form action="{{ $action ?? '#' }}" method="{{ $method ?? 'POST' }}">
    @csrf
    <div class="form-items">
        @foreach ($formFields as $formField)
            <div class="form-item">
                <label for="{{ $formField['name'] }}">{{ $formField['label'] }}</label>
                <input type="{{ $formField['type'] }}" name="{{ $formField['name'] }}" id="{{ $formField['name'] }}"
                    value="{{ $formField['value'] }}">
            </div>
        @endforeach
    </div>
    <button type="submit" class="submit-button">{{ $submitText ?? 'Submit' }}</button>
</form>
