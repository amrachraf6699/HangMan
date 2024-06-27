<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Word;
use Livewire\Component;


use Faker\Factory as FakerFactory;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Home extends Component
{
    use LivewireAlert;

    public $word;
    public $wordRecord;
    public $categories = [];
    public $category_id = 1;
    public $guess = '';
    public $correctGuesses = [];


    public function checkGuess()
    {

        if(!$this->word){
            $this->alert('error','Please start the game first',['position'=>'top']);
            return;
        }

        $validator = Validator::make(['guess' => $this->guess], [
            'guess' => 'required|alpha|size:1',
        ], [
            'guess.required' => 'Please enter a letter to guess',
            'guess.alpha' => 'Only alphabets are allowed',
            'guess.size' => 'Only one letter is allowed',
        ]);

        if ($validator->fails()) {
            $this->alert('error',$validator->errors()->first(),['position'=>'top']);
            $this->guess = '';
            return;
        }

        if (in_array(strtolower($this->guess), $this->correctGuesses)) {
            $this->alert('warning',"You've already guessed '{$this->guess}'. Try another letter!",['position'=>'top']);
            $this->guess = '';
            return;
        }

        if (stripos($this->word, $this->guess) !== false) {
            $this->correctGuesses[] = strtolower($this->guess);
            $this->alert('success',"Correct guess. The word contains '{$this->guess}'. Good job!",['position'=>'top']);
        } else {
            $this->alert('error',"Incorrect guess. The word does not contain '{$this->guess}'. Try again!",['position'=>'top']);
        }

        $this->allGuessed();

        $this->guess = '';
    }

    public function startGame()
    {
        $this->validate([
            'category_id' => 'required|exists:categories,id',
        ]);

        $category = Category::find($this->category_id);
        $this->wordRecord = $category->words->random();
        $this->word = $this->wordRecord->word;
        $this->correctGuesses = [];
        $this->alert('info','Game started. Good luck!',['position'=>'top']);
    }

    public function resetgame()
    {
        $this->word = '';
        $this->correctGuesses = [];
        $this->guess = '';
    }

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function allGuessed()
    {
        $wordLetters = str_split($this->word);
        foreach ($wordLetters as $letter) {
            if (!in_array(strtolower($letter), $this->correctGuesses)) {
                return false;
            }
        }

        $this->alert('success','Congratulations! You guessed the "'.$this->word.'" correctly . Share the game with your friends',[
            'position'=>'top',
            "imageUrl" => asset('qr.png'),
            'timer' => 7000,
            'icon' => null,
        ]);
        $this->wordRecord->solved_count++;
        $this->wordRecord->save();

        $this->resetgame();

    }

    public function render()
    {
        return view('livewire.home');
    }
}
