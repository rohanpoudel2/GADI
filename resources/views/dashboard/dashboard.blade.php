<x-app-layout>
    <div class="dashboard">
        This is dashboard
        @if (isset($error))
            {{ $error }}
        @endif
    </div>
</x-app-layout>
