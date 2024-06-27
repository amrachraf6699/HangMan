<div class="max-w-md w-full bg-white p-6 rounded-md shadow-lg border-2 border-gray-300">

    <!-- Category Selection Card -->
    <div class="mb-6 bg-primary p-4 rounded-md shadow-sm text-white">
        <div class="mb-4">
            <label for="category" class="block text-sm font-semibold text-black">Select Category:</label>
            <select wire:model="category_id" id="category" name="category" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-info focus:border-transparent bg-gray-50 text-gray-800">
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <button wire:click.prevent="startGame" class="w-full px-4 py-2 bg-black text-white rounded-md hover:bg-success-dark focus:outline-none focus:ring-2 focus:ring-success focus:ring-opacity-50">Start Game</button>
    </div>

    <!-- Game Display Card -->
    <div class="mb-6 bg-gray-50 p-4 rounded-md shadow-sm">
        <h1 class="text-3xl font-bold mb-4 text-center text-primary">Word Guessing Game</h1>

        <div class="flex justify-center items-center">
            @foreach(str_split($word) as $letter)
                <div class="mx-2 text-4xl font-semibold text-gray-800">{{ in_array($letter, $correctGuesses) ? $letter : '_' }}</div>
            @endforeach
        </div>
    </div>

    <!-- Guess Input Card -->
    <div class="bg-gray-50 p-4 rounded-md shadow-sm">
        <form wire:submit.prevent="checkGuess">
            <div class="mb-4">
                <label for="guess" class="block text-sm font-semibold text-primary">Enter your guess:</label>
                <input wire:model="guess" type="text" id="guess" name="guess" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-info focus:border-transparent bg-white text-gray-800" autofocus>
            </div>

            <button type="submit" class="w-full px-4 py-2 bg-black text-white rounded-md hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-info focus:ring-opacity-50">Check Guess</button>
        </form>
    </div>
</div>
