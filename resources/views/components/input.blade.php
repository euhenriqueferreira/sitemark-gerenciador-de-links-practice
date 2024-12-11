@props(['name', 'label'=>null])

<label class="form-control w-full">
    <div class="label">
        <span class="label-text text-sm text-white font-semibold">{{ $label }}</span>
    </div>
    <input name="{{ $name }}" {{ $attributes->class("input input-bordered bg-[#111] text-gray-200 text-sm h-10") }}>
    @error($name)
        <div class="label">
            <span class="label-text-alt">{{ $message }}</span>
        </div>
    @enderror
</label>