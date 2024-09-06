<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceOfferResource\Pages;
use App\Filament\Resources\ServiceOfferResource\RelationManagers;
use App\Models\ServiceOffer;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ServiceOfferResource extends Resource
{
    protected static ?string $model = ServiceOffer::class;

    protected static ?string $navigationIcon = 'heroicon-o-square-3-stack-3d';
    protected static ?string $navigationGroup = 'Service';
    protected static ?string $navigationLabel = 'Offers';

    protected static ?int $navigationSort = 3;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Radio::make('type')
                    ->required()
                    ->inline()
                    ->options([
                        'SO' => 'Service Offers',
                        'OF' => 'Offers',

                    ])->columnSpanFull(),
                Forms\Components\TextInput::make('name_en')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('name_ar')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('title_en')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('title_ar')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('desc_en')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('desc_ar')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('banner_en')
                    ->required(),
                Forms\Components\FileUpload::make('banner_ar')
                    ->required(),

                Repeater::make("serviceOfferImages")
                    ->relationship()
                    ->schema([
                        Forms\Components\TextInput::make('title_en')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('title_ar')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\FileUpload::make('img_en')
                            ->required(),
                        Forms\Components\FileUpload::make('img_ar')
                            ->required(),
                    ])->orderColumn('sort')
                    ->columnSpanFull()
                    ->collapsed()
                    ->columns([
                        "md" => 2
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name_en')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name_ar')
                    ->searchable(),
                Tables\Columns\TextColumn::make('title_en')
                    ->searchable(),
                Tables\Columns\TextColumn::make('title_ar')
                    ->searchable(),

                Tables\Columns\TextColumn::make('banner_en')
                    ->searchable(),
                Tables\Columns\TextColumn::make('banner_ar')
                    ->searchable(),

                Tables\Columns\ToggleColumn::make('is_active'),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListServiceOffers::route('/'),
            'create' => Pages\CreateServiceOffer::route('/create'),
            'edit' => Pages\EditServiceOffer::route('/{record}/edit'),
        ];
    }
}
