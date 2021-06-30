<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Http\Requests\NovaRequest;

class HaulageCompany extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\HaulageCompany::class;
    public static $title = 'name';
    public static $showColumnBorders = true;
    public static $tableStyle = 'tight';
    public static $search = [
        'name',
    ];
    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),

            Text::make('Company Name','name')->rules('required','max:50'),

            Text::make('Address','address')->rules('required','max:50'),

            Number::make('Phone Number','phone_number')
            ->rules('required' ,'min:4','max:13')
            ->creationRules('unique:haulage_companies,phone_number')
            ->updateRules('unique:haulage_companies,phone_number,{{resourceId}}'),

            BelongsTo::make('City','city','App\Nova\City'),

           //HasMany::make('bills')

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
 function lenses(Request $request)
    {
        return [];
    }

    public function actions(Request $request)
    {
        return [];
    }
}
