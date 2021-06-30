<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;

class ModelsWarehouse extends Resource
{

    public static $model = \App\ModelsWarehouse::class;
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
            ->rules('required','max:50')
            ->creationRules('unique:models_warehouses,name')
            ->updateRules('unique:models_warehouses,name,{{resourceId}}'),

            Text::make('Type','type')->rules('required','max:50'),


///////////////////////problem in  HasMany::make('external_models'),
           //HasMany::make('external_models'),
           // HasMany::make('models')
        ];
    }
    public static function label()
    {
        return __('Models Warehouse');
    }
    public static function singularLabel()
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
