@props(['name', 'label'=>null])

<label class="form-control w-full">
    <div class="label">
        <span class="label-text text-sm text-white font-semibold">{{ $label }}</span>
    </div>
    <textarea name="{{ $name }}" {{ $attributes->class("textarea textarea-bordered bg-[#111] text-gray-200 text-sm h-20") }}>
        {{ $slot }}
    </textarea>
    @error($name)
        <div class="label">
            <span class="label-text-alt">{{ $message }}</span>
        </div>
    @enderror
</label>