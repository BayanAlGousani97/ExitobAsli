<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;

class Workshop extends Resource
{

    public static $model = \App\Workshop::class;
    public static $tableStyle = 'tight';
    public static $showColumnBorders = true;

    public static $title = 'id';

    public static $search = [
        'id',
    ];

    public function fields(Request $request)
    {
        return
        [
            ID::make(__('ID'), 'id')->sortable(),

            Text::make('Name','name')->rules('required','max:50'),

            Text::make('Type','type')->rules('required','max:50'),

            Select::make('Place')->options([
                'In Company' => 'in company',
                'Out Company' => 'out company',
            ])->rules('required'),

            Number::make('Phone Number','phone_number')
            ->rules('required' ,'min:4','max:13')
            ->creationRules('unique:workshops,phone_number')
            ->updateRules('unique:workshops,phone_number,{{resourceId}}'),

            Text::make('Address','address'),

            Boolean::make('Is Work!','is_work'),
        ];
    }


    public function cards(Request $request)
    {
        return [];
    }


    public function filters(Request $request)
    {
        return [];
    }

    public function lenses(Request $request)
    {
        return [];
    }


    public function actions(Request $request)
    {
        return [];
    }
}
