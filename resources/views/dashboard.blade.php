<x-layout.app>
    <div class="p-8 max-w-screen-lg mx-auto flex flex-col h-full">
        <div class="w-full flex justify-center mb-12 h-16">
            <x-img src="/storage/assets/logo.png" alt="Logo" class="mb-24 h-full object-scale-down"/>
        </div>

        <div class="flex items-center justify-between w-full mb-6">
            <h1 class="text-2xl text-white font-bold">Links</h1>

            <x-anchor :href="route('links.create')" class="flex items-center gap-2 py-2 px-4 bg-[#111] text-amber-600 rounded-full w-fit">
                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                Create a Link
            </x-anchor>
        </div>

        <x-alert-info></x-alert-info>

        <ul class="flex flex-col gap-3 flex-1">
            @foreach($links as $link)
                <li class="flex items-center gap-3">
                <x-link-card>
                    @unless($loop->first)
                        <x-form :action="route('links.up', $link)" patch>
                            <x-button type="submit" class="bg-[#111] p-2 rounded-md">
                                <x-svg.arrow-up></x-svg.arrow-up>
                            </x-button>
                        </x-form>
                    @else
                        <x-form :action="route('links.up', $link)" patch>
                            <x-button type="submit" disabled class="bg-[#111] p-2 rounded-md opacity-50">
                                <x-svg.arrow-up></x-svg.arrow-up>
                            </x-button>
                        </x-form>
                    @endunless
        
                    @unless($loop->last)
                        <x-form :action="route('links.down', $link)" patch>
                            <x-button type="submit" class="bg-[#111] p-2 rounded-md">
                                <x-svg.arrow-down></x-svg.arrow-down>
                            </x-button>
                        </x-form>
                    @else
                        <x-form :action="route('links.down', $link)" patch>
                            <x-button type="submit" disabled class="bg-[#111] p-2 rounded-md opacity-50">
                                <x-svg.arrow-down></x-svg.arrow-down>
                            </x-button>
                        </x-form>
                    @endunless

                    <div class="bg-[#111] rounded-xl flex items-center p-3 flex-1 gap-3">
                        @if($link->photo)
                            <x-img :src="'/storage/'.$link->photo" alt="Link Picture" class="w-12 h-12 rounded-xl bg-[#222]"></x-img>
                        @else
                            <div class="w-12 h-12 rounded-xl bg-[#222] flex items-center justify-center">
                                <x-svg.link></x-svg.link>
                            </div>
                        @endif
                            
                        <div class="flex flex-col gap-1 flex-1 jus">
                            <div class="flex items-center gap-2">
                                <h2 class="text-base text-white font-bold">{{ $link->name }}</h2>
                                <span class="px-2 py-px bg-amber-600 rounded-full text-xs font-bold">{{ $link->streaming }}</span>
                            </div>
                            <p class="text-xs text-gray-400">{{ $link->url }}</p>
                        </div>
                            
                        <x-anchor :href="route('links.edit', $link)" class="p-2 bg-[#222] rounded-lg">
                            <x-svg.edit></x-svg.edit>
                        </x-anchor>
                        
                        <x-form :action="route('links.delete', $link)" delete>
                            <x-button type="submit" class="p-2 bg-[#222] rounded-lg">
                                <x-svg.delete></x-svg.delete>
                            </x-button>
                        </x-form>
                    </div>
                </x-link-card>
            @endforeach
        </ul>
        

        <x-navbar>
            <x-anchor :href="route('dashboard')" class="w-10 h-10 rounded-full bg-amber-600 flex items-center justify-center">
                <x-svg.list-itens></x-svg.list-itens>
            </x-anchor>
            <x-anchor :href="route('profile')" class="w-10 h-10 rounded-full flex items-center justify-center">
                <x-svg.profile></x-svg.profile>
            </x-anchor>
            <x-anchor :href="route('logout')" class="w-10 h-10 rounded-full flex items-center justify-center">
                <x-svg.logout></x-svg.logout>
            </x-anchor>
        </x-navbar>
    </div>
</x-layout.app>
