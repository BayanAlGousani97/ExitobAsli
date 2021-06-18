<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest;
use App\ModelsWarehouse ;
use Laravel\Nova\Fields\Text;

class models_warehouse extends Resource
{

    public static $model = ModelsWarehouse::class;
    public static $showColumnBorders = true;
    public static $tableStyle = 'tight';

    public static $title = 'name';


    public static $search = [
        'id',
        'name',
        'type'
    ];


    public function fields(Request $request)
    {
        return [
            ID::make('ID', 'id')->sortable(),

            Text::make('Name', 'name')
            ->rules('required','max:100')
            ->creationRules('unique:models_warehouses,name'),

            Text::make('Type','type')->rules('required','max:100')
        ];
    }
    public static function label()
    {
        return __('Models Warehouse');
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
