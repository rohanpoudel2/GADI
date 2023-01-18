<select name="brand-filter" id="brand-filter" name="brand-filter" onchange="window.location.href=this.value">
    @foreach ($brands as $brand)
        @if (request('brand'))
            @if (request('brand') == $brand->id)
                <option value="/shop/?brand={{ $brand->id }}" selected>{{ $brand->name }}</option>
            @else
                <option value="/shop/?brand={{ $brand->id }}">{{ $brand->name }}</option>
            @endif
        @else
            <option value="none" selected disabled hidden>Select a Brand</option>
            <option value="/shop/?brand={{ $brand->id }}">{{ $brand->name }}</option>
        @endif
    @endforeach
</select>
