<?php

namespace App\Http\Livewire;

use Filament\Tables;
use Filament\Forms;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\Action;
use Livewire\Component;
use App\Models\Information;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\TextColumn;

class UpdateData extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return Information::query();
    }

    protected function getTableActions(): array
    {
        return [
            Action::make('edit')
            ->label('Update')
            ->button()
            ->color('success')
            ->icon('heroicon-o-pencil')
            ->mountUsing(fn (Forms\ComponentContainer $form, Information $record) => $form->fill([
                'first_name' => $record->first_name,
                'middle_name' => $record->middle_name,
                'last_name' => $record->last_name,
                'address' => $record->address,
            ]))
            ->action(function (Information $record, array $data): void {
                $record->first_name = $data['first_name'];
                $record->middle_name = $data['middle_name'];
                $record->last_name = $data['last_name'];
                $record->address = $data['address'];
                $record->save();

                Notification::make()
                ->title('Updated successfully')
                ->success()
                ->send();
            })
            ->form([
                Forms\Components\TextInput::make('first_name')->required(),
                Forms\Components\TextInput::make('middle_name'),
                Forms\Components\TextInput::make('last_name')->required(),
                Forms\Components\TextInput::make('address')->required(),
            ])
        ];
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('first_name'),
            TextColumn::make('middle_name'),
            TextColumn::make('last_name'),
            TextColumn::make('address'),
        ];
    }

    public function render()
    {
        return view('livewire.update-data');
    }
}
