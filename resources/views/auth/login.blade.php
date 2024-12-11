<x-layout.app>
    <x-auth.container title="Login">
        <x-form class="flex flex-col items-center" action="{{ route('login') }}" post>

            <x-input name="email" label="E-mail" class="input input-bordered bg-[#111] text-gray-200 text-sm h-10" type="text"  id="email" value="{{ old('email') }}"/>
            <x-input class="input input-bordered bg-[#111] text-gray-200 text-sm h-10" type="password" name="password"  label="Password" id="password" />

            <x-button type="submit" class=" bg-amber-600 rounded-full px-12 py-2 text-md font-bold mt-20">Login</x-button>
            <x-anchor href="{{ route('register') }}" class="font-normal text-white mt-12 text-sm hover:underline">Do not have an account? Create an account</x-anchor>
        </x-form>
    </x-auth.container>
</x-layout.app>