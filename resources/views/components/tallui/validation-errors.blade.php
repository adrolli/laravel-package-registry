@if ($errors->any())
    <div {{ $attributes }}>
        <h3 class="text-sm font-medium text-red-800">{{ __('Whoops! Something went wrong.') }}</h3>

        <div class="text-sm text-red-700">
            <ul class="list-none space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

