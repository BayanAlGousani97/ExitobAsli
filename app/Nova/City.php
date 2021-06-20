<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\BelongsTo;

class City extends Resource
{
    
    public static $model = \App\City::class;
    public static $showColumnBorders = true;
    public static $tableStyle = 'tight';

    public static $title = 'name';
    public static $search = [
        'name',
    ];
       public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),
             Text::make('Name','name')->rules('required','max:50'),
            BelongsTo::make('ShortName','country','App\Nova\Country'),  
        ];
    }
    public static function label()
    {
        return __('City');
    }
    public static function singularLabel()
    {
        return __('City');
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
