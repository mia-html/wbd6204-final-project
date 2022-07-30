<x-card>
    <div class="flex">
        <img class="hidden w-48 mr-6 md:block" src="{{$recipe->dish ? asset('storage/' . $recipe->dish) : asset('/images/no-image.jpg')}}" alt=""/>
        <div>
            <h3 class="text-2xl">
                <a href="/recipes/{{$recipe->id}}">{{$recipe->title}}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{$recipe->owner}}</div>
                <x-recipe-tags :tagsCsv="$recipe->tags"/>
            <div class="text-lg mt-4">
                <i class="fa-solid fa-clock"></i> {{$recipe->duration}}
            </div>
        </div>
    </div>
</x-card>

