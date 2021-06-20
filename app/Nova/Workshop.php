<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
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
            Text::make('Name' ,'name'),
            Text::make('Type','type'),
            Text::make('Place','place'),
            Number::make('phone number' , 'phone_number'),
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
