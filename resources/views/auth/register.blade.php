<x-layout.app>
    <x-auth.container title="Register">
        <x-form class="flex flex-col items-center" action="{{ route('register') }}" post>
            
            <x-input name="name" label="Name"  class="input input-bordered bg-[#111] text-gray-200 text-sm h-10" type="text"  id="name" value="{{ old('name') }}"/>
            <x-input name="email" label="E-mail" class="input input-bordered bg-[#111] text-gray-200 text-sm h-10" type="text"  id="email" value="{{ old('email') }}"/>
            <x-input class="input input-bordered bg-[#111] text-gray-200 text-sm h-10" type="password" name="password" id="password"  label="Password"/>

            <x-button type="submit" class=" bg-amber-600 rounded-full px-12 py-2 text-md font-bold mt-20">Register</x-button>
            <x-anchor href="{{ route('login') }}" class="font-normal text-white mt-12 text-sm hover:underline">Already have an account? Login</x-anchor>
        </x-form>
    </x-auth.container>
</x-layout.app>


