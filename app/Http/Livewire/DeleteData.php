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

class DeleteData extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return Information::query();
    }
    protected function getTableActions(): array
    {
        return [
            Action::make('delete')
            ->label('Delete')
            ->button()
            ->color('danger')
            ->icon('heroicon-o-trash')
            ->action(function (Information $record, array $data): void {
                $record->delete();

                Notification::make()
                ->title('Deleted successfully')
                ->success()
                ->send();
            })->requiresConfirmation()
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
        return view('livewire.delete-data');
    }
}
