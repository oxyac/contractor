<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InvoiceResource\Pages;
use App\Filament\Resources\InvoiceResource\RelationManagers;
use App\Models\Contract;
use App\Models\Invoice;
use App\Models\Location;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Blade;

class InvoiceResource extends Resource
{
    protected static ?string $model = Invoice::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'My space';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Invoice Details')
                    ->columns(2)
                    ->schema([
                        Forms\Components\Select::make('contract_id')
                            ->relationship('contract', 'toEntity.name')
                            ->getOptionLabelFromRecordUsing(function (Contract $record) {
                                return "Contract from " . $record->fromEntity?->name . " to " . $record->toEntity?->name . " on the due date " . $record->contract_due_date;
                            })
                            ->label('Contract')
                            ->required()
                            ->searchable()
                            ->preload()
                        ->columnSpanFull(),
                        Forms\Components\DatePicker::make('due_date')
                            ->label('Due Date')
                            ->required()
                        ->columnSpanFull(),
                        Forms\Components\DatePicker::make('created_at')
                            ->label('Created at')
                            ->default(now()) ->columnSpanFull(),
                        Forms\Components\Textarea::make('product_description')
                            ->label('Product Description')
                            ->required()
                            ->live(),
                        Forms\Components\TextInput::make('product_quantity')
                            ->label('Product Quantity')
                            ->required()
                            ->live()
                            ->afterStateUpdated(fn (Set $set, Get $get, ?string $state) => $set('total', is_numeric($get('product_quantity')) && is_numeric( $get('product_price')) ? $get('product_quantity') * $get('product_price') : 0)),
                        Forms\Components\TextInput::make('product_price')
                            ->label('Product Price')
                            ->numeric()
                            ->required()
                            ->live()
                            ->afterStateUpdated(fn (Set $set, Get $get, ?string $state) => $set('total', is_numeric($get('product_quantity')) && is_numeric( $get('product_price')) ? $get('product_quantity') * $get('product_price') : 0)),
                        Forms\Components\TextInput::make('total')
                            ->label('Total')
                            ->disabled()
                            ->numeric()
                    ])->columns(3),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('contract.toEntity.name')
                    ->label('Payee')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('due_date')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('product_description')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('product_quantity')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('product_price')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('total')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('pdf')
                    ->label('PDF')
                    ->color('success')
                    ->icon('heroicon-o-arrow-down-on-square')
                    ->action(function (Invoice $record) {
                        return response()->streamDownload(function () use ($record) {
                            echo Pdf::loadHtml(
                                Blade::render('pdf', ['invoice' => $record])
                            )->stream();
                        }, $record->id . '.pdf');
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])->modifyQueryUsing(
                function (Builder $query) {
                    $query->where('legal_entity_id', auth()->user()->legal_entity_id);
                }
            );
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInvoices::route('/'),
            'create' => Pages\CreateInvoice::route('/create'),
            'edit' => Pages\EditInvoice::route('/{record}/edit'),
        ];
    }
}
