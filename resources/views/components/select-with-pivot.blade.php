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
                callLivewireFunction_{{ $attributes['id'] }}();
            });
        });
        // let change_function = "{{ $changefunction }}";
        const change_function_{{ $attributes['id'] }} = "{{ $changefunction }}";
        console.log("definiendo lo del select pivot");
        console.log( change_function_{{ $attributes['id'] }} );

        function callLivewireFunction_{{ $attributes['id'] }}() {
            console.log("este es el call a probar ando:");
            console.log(change_function_{{ $attributes['id'] }});

            @this.call(change_function_{{ $attributes['id'] }}); // Llama a la función de Livewire
        }
    </script>
@endpush
