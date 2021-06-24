<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Avatar;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use PhpParser\Node\Expr\Cast\Double;

class Customer extends Resource
{
    public static $model = \App\Customer::class;
    public static $tableStyle = 'tight';
    public static $showColumnBorders = true;


    public static $title = 'first_name';

    public static $search = [
        'first_name',
    ];


    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),

            Text::make('First Name','first_name')->rules('required','max:50'),

            Text::make('Last Name','last_name')->rules('required','max:50'),

            Number::make('Phone number','phone_number')->rules('required' ,'min:4','max:13')
            ->creationRules('unique:workshops,phone_number')
            ->updateRules('unique:workshops,phone_number,{{resourceId}}'),

            Text::make('Address', 'address')->rules('required','max:50'),

            Boolean::make('Is verified!','is_verified'),

            Number::make('bills count' , 'bills_count'),

            BelongsTo::make('city name' , 'city' , 'App\Nova\City'),

            Avatar::make('image' , 'avatar'),
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
