<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Http\Requests\NovaRequest;
class Country extends Resource
{
    public static $model = \App\Country::class;
    public static $showColumnBorders = true;
    public static $tableStyle = 'tight';
    public static $title = 'long_name';

    public static $search = [
        'long_name',
    ];

    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),

            Text::make('Short Name','short_name')->rules('required','max:50'),

            Text::make(' Long Name','long_name')->rules('required','max:50'),

            HasMany::make('cities')
        ];
    }
    public static function label()
    {
        return __('Country');
    }
    public static function singularLabel()
    {
        return __('Country');
    }
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
