<?php

namespace App\Nova;

use DateTime;
use Hamcrest\Type\IsDouble;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use PhpParser\Node\Expr\Cast\Double;

class RawMaterial extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\RawMaterial::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),

            Text::make('Name','name'),

            //BelongsToMany::make('RawMaterial'),

            BelongsTo::make('exporter name','exporter','App\Nova\Exporter'),

            //BelongsToMany::make('Color','values','App\Nova\OptionValue'),

            Text::make('Type','type'),

            Text::make('Code', 'code'),

            Select::make('Measruing Unit')->options([
                'METER' => 'Meter',
                'KILOGRAM' => 'kilogram',
                'GRAM' => 'gram',
            ]),

            Text::make('Grammage', 'grammage'),

            Number::make('Quantity', 'quantity'),

            //Currency::make('Price','price'),

            BelongsTo::make('Warehous name', 'raw_matrial_warehouse','App\Nova\RawMaterialWarehouse'),

        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
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

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
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