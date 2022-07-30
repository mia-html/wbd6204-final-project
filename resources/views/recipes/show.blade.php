<x-layout>

    <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back</a>
    <div class="mx-4">
        <x-card class="p-10">
            <div class="flex flex-col items-center justify-center text-center">
                <img class="w-48 mr-6 mb-6" src="{{$recipe->dish ? asset('storage/' . $recipe->dish) : asset('/images/no-image.jpg')}}" alt=""/>
                <h3 class="text-2xl mb-2">{{$recipe->title}}</h3>
                <div class="text-xl font-bold mb-4">{{$recipe->owner}}</div>
                <x-recipe-tags :tagsCsv="$recipe->tags"/>
                <div class="text-lg my-4">
                    <i class="fa-solid fa-clock"></i> {{$recipe->duration}}</div>
                <div class="border border-gray-200 w-full mb-6"></div>
                <div>
                    <h3 class="text-xl font-bold mb-4">
                        The recipe:
                    </h3>
                    <div class="text-lg space-y-6">
                        {{$recipe->description}}
                        <a href="mailto:{{$recipe->email }}" class="block bg-greenish text-white mt-6 py-2 rounded-xl hover:opacity-80"><i class="fa-solid fa-envelope"></i> Contact recipe creator</a>
                    </div>
                </div>
            </div>
        </x-card>
    </div>
</x-layout>>
