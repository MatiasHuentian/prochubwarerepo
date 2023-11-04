<div>
    <div wire:ignore class="w-full">
        <select class="select2 form-control" data-placeholder="{{ __('Select your option') }}" {{ $attributes }} >
            @if (!isset($attributes['multiple']))
                <option></option>
            @endif
            @foreach ($options as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener("livewire:load", () => {
            console.log("me cargó este otro");
            let el = $('#{{ $attributes['id'] }}')
            let buttonsId = '#{{ $attributes['id'] }}-btn-container'
            function initSelect() {
                // initButtons()
                el.select2({
                    placeholder: '{{ __('Select your option') }}',
                    allowClear: !el.attr('required'),
                    tags: true,
                    multiple:true
                })
            }

            initSelect()

            Livewire.hook('message.processed', (message, component) => {
                initSelect()
            });

            el.on('change', function(e) {
                let data = $(this).select2("val")
                if (data === "") {
                    data = null
                }
                @this.set('{{ $attributes['wire:model'] }}', data)
                callLivewireFunction();
            });
        });

        function callLivewireFunction() {
            console.log( ' {{ $changefunction ?? ""  }} ' )
            @this.call('{{ $changefunction ?? "" }}'); // Llama a la función de Livewire
        }
    </script>
@endpush
