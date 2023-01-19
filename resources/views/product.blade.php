<x-layout>
    @section('page-title')
        {{ $car->model }}
    @endsection
    @include('components.bigproduct', ['car' => $car])
</x-layout>
