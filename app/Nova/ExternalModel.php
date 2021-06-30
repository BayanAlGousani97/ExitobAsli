<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\HasMany;
use Pifpif\NovaTextCurrency\Currency;

class ExternalModel extends Resource
{

    public static $model = \App\ExternalModel::class;
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

            Text::make('Model Name','name')->rules('required','max:50'),

            Number::make('Quantity','quantity')->rules('required','max:50'),

           DateTime::make('Purchase Date','purchase_date')->rules('required','max:50'),

           Currency::make('Single Cost','single_cost')->rules('required','max:50'),

           Currency::make('Total Cost','total_cost')->rules('required','max:50'),

           BelongsTo::make('Company Name','brand','App\Nova\brand'),

           BelongsTo::make('Models Warehouse','models_warehouse','App\Nova\ModelsWarehouse'),

          // HasMany::make('serial_clothes')
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
