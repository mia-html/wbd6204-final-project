<x-layout>
<x-card class="p-10 max-w-lg mx-auto mt-24">
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
            Your recipe
        </h2>
        <p class="mb-4">Share your favorite recipes!</p>
    </header>

    <form method="POST" action="/recipes" enctype="multipart/form-data">
        @csrf
        <div class="mb-6">
            <label for="owner" class="inline-block text-lg mb-2">Whose recipe is it?</label>
            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="owner" value="{{old('owner')}}"/>

            @error('owner')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="title" class="inline-block text-lg mb-2">Name of the dish</label>
            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title" placeholder="Greatest meal ever" value="{{old('title')}}"/>

            @error('title')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="duration" class="inline-block text-lg mb-2">How long does it take to make it?</label>
            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="duration" placeholder="45 minutes/3 hours/a couple of minutes..." value="{{old('duration')}}"/>

            @error('duration')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="email" class="inline-block text-lg mb-2">Contact Email</label>
            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="email" value="{{old('email')}}"/>

            @error('email')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="tags" class="inline-block text-lg mb-2">Tags (Comma Separated)</label>
            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags" placeholder="fast, low-budget, yummy" value="{{old('tags')}}"/>

            @error('tags')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="logo" class="inline-block text-lg mb-2">
                Photo of the dish
            </label>
            <input type="file" class="border border-gray-200 rounded p-2 w-full" name="dish"/>

            @error('dish')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>


        <div class="mb-6">
            <label for="description" class="inline-block text-lg mb-2">
                The recipe:
            </label>
            <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10" placeholder="Don't forget any details!">{{old('description')}}</textarea>

            @error('description')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <button
                class="bg-gray-400 text-white rounded py-2 px-4 hover:bg-greenish">
                Share the recipe
            </button>

            <a href="/" class="text-black ml-4"> Back </a>
        </div>
    </form>
</x-card>
</x-layout>
