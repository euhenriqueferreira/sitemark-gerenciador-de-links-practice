@props(['name', 'label'=>null])

<label class="form-control w-fit mt-3">
    <input name="{{ $name }}" {{ $attributes->class("input input-bordered bg-[#111] text-gray-200 text-sm h-10") }}>
</label>