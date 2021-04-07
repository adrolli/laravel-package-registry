1) Was mast attributes->merge genau? ersetzt klassen?
2) if tui, then tui-classes?????
3) else tailwind defaults?
4) was machen die variablen hier? was sind @props?

<form
    method="POST"
    type="default"
    size="md"
    width="content"
    form=""
    action="{{ $action }}"
    @if ($form == 'inline')
       style="display:inline"
    @endif
    @if ($type == "default")
        class="bg-tui"
    @endif
    >

    @csrf
    @method($method)

    <div class="flex items-center justify-between mt-6">
        <button {!! $attributes->merge([
            'class' => 'bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 focus:outline-none focus:shadow-outline',
            'type' => 'submit'
        ]) !!}>
            {!! trim($slot) ?: __('Submit') !!}
        </button>
    </div>
</form>
