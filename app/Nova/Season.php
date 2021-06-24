<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\BelongsTo;

class Season extends Resource
{
    public static $model = \App\Season::class;
    public static $title = 'name';
    public static $search = [
        'name',
    ];
    public function fields(Request $request)
    {

        return [
            ID::make(__('ID'), 'id')->sortable(),
            Text::make('Name','name')->rules('required','max:50'),
            Number::make('Year','year'),
            BelongsTo::make('Company Name','brand','App\Nova\brand'),
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
