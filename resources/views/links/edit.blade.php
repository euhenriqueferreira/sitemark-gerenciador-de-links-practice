<x-layout.app>
    <div class="max-w-screen-md mx-auto p-8">
        <h1 class="text-2xl text-white font-bold mb-10">Edit Link</h1>

        <x-alert-info></x-alert-info>

        <x-form :action="route('links.edit', $link)" put id="form-edit" enctype="multipart/form-data">
            <div class="flex items-center flex-col gap-2">
                <x-img :src="'/storage/'.$link->photo" alt="Link Picture" class="w-32 h-32 rounded-lg"></x-img>
                <x-file-input type="file" class="file-input file-input-bordered bg-transparent border-transparent h-10 w-48" name="photo" id="photo"></x-file-input>
            </div>
            <x-input type="text" name="name" id="name" placeholder="Name" :value="old('name', $link->name)" label="Name"></x-input>
            <x-input type="text" name="streaming" id="streaming" placeholder="Streaming" :value="old('streaming', $link->streaming)" label="Streaming"></x-input>
            <x-input type="text" name="url" id="url" placeholder="URL" :value="old('url', $link->url)" label="URL"></x-input>
            <div class="flex items-center justify-between">
                <x-anchor :href="route('dashboard')" class="bg-transparent text-white rounded-full text-md font-bold mt-20 hover:underline">
                    Cancel
                </x-anchor>
                <x-button type="submit" form="form-edit" class=" bg-amber-600 rounded-full px-12 py-2 text-md font-bold mt-20">Edit Link</x-button>
            </div>
        </x-form>
    </div>

</x-layout.app>
