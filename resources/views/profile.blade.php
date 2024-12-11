<x-layout.app>
    <div class="max-w-screen-md mx-auto p-8">
        <h1 class="text-2xl text-white font-bold mb-10">Profile</h1>

        <x-alert-info></x-alert-info>

        <x-form :action="route('profile')" put enctype="multipart/form-data">
            <div class="flex items-center flex-col gap-2">
                @if($user->photo)
                    <x-img :src="'/storage/'.$user->photo" alt="Link Picture" class="w-32 h-32 rounded-lg"></x-img>
                @endif
                <x-file-input type="file" class="file-input file-input-bordered bg-transparent border-transparent h-10 w-48" name="photo" id="photo"></x-file-input>
            </div>
            <x-input type="text" name="name" id="name" placeholder="Name" :value="old('name', $user->name)" label="Name"></x-input>
            <x-input type="text" name="email" id="email" placeholder="E-mail" :value="old('email', $user->email)" label="E-mail"></x-input>
            <x-textarea type="text" name="description" id="description" placeholder="Bio" label="Bio">{{old('description', $user->description)}}</x-textarea>
            <div class="flex items-center justify-between">
                <x-anchor :href="route('dashboard')" class="bg-transparent text-white rounded-full text-md font-bold mt-20 hover:underline">
                    Cancel
                </x-anchor>
                <x-button type="submit" class=" bg-amber-600 rounded-full px-12 py-2 text-md font-bold mt-20">Update Profile</x-button>
            </div>
        </x-form>
    </div>

</x-layout.app>

