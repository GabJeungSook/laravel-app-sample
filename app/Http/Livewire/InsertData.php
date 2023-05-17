<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Filament\Forms;
use Illuminate\Contracts\View\View;
use App\Models\Information;
use Filament\Notifications\Notification;

class InsertData extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $address;

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\Card::make()
            ->schema([
                Forms\Components\TextInput::make('first_name')->required(),
                Forms\Components\TextInput::make('middle_name'),
                Forms\Components\TextInput::make('last_name')->required(),
                Forms\Components\TextInput::make('address')->required(),
            ])
        ];
    }

    public function save()
    {
        $this->validate();
        Information::create([
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'address' => $this->address,
        ]);

        Notification::make()
        ->title('Saved successfully')
        ->success()
        ->send();

        $this->reset();
    }

    public function render()
    {
        return view('livewire.insert-data');
    }
}
