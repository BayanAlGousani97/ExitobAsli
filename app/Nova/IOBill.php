<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Resource;
use SimpleSquid\Nova\Fields\AdvancedNumber\AdvancedNumber;

class IOBill extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model =\App\IOBill::class;
//    public static $displayInNavigation=false;

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


    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),
            BelongsTo::make('Exporter','exporter',Exporter::class)->showCreateRelationButton(),
            Date::make('Date','publish_date'),
            AdvancedNumber::make('Total Price','total_cost')->exceptOnForms()
                ->default(function ()
                {
                return $this->getFinalTotalPrice();
                }),
            HasMany::make('Details','enterIOBills',EnterIOBill::class)
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
