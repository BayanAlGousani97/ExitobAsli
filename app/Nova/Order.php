<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\DateTime;
use Pifpif\NovaTextCurrency\Currency;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Text;
use DigitalCreative\ConditionalContainer\ConditionalContainer;
use DigitalCreative\ConditionalContainer\HasConditionalContainer;

class Order extends Resource
{
    public static $model = \App\Order::class;
    use HasConditionalContainer;
    public static $tableStyle = 'tight';
    public static $showColumnBorders = true;
    public static $title = 'name';
    public static $search = [
        'name',
    ];
    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),
            Select::make('Status', 'status')
                  ->options([
                    'ORDERED' => 'ORDERED',
                    'PACKED' => 'PACKED',
                    'SHIPPED' => 'SHIPPED',
                  ]),
            ConditionalContainer::make([ 
                          DateTime::make('Ordered Date','order_date'),
                          Number::make('Ordered Quantity','ordering_quantity')->rules('required','max:50'),
                         Boolean::make('Packed!','packed'), ])
                                ->if('status = ORDERED'),
            
                                ConditionalContainer::make([Number::make(' Packed Quantity','packing_quantity')->rules('required','max:50'),
                                DateTime::make('Packed Date','packed_date'),
                                    Boolean::make('Haulage!','Haulage'),
                                    ])
                                   ->if('packed = true'),
            ConditionalContainer::make([Number::make(' Packed Quantity','packing_quantity')->rules('required','max:50'),
                             DateTime::make('Packed Date','packed_date'),
                                 Boolean::make('Haulage!','Haulage'), 
                                 BelongsTo::make('Customer Name','customer','App\Nova\Customer'),])
                                ->if('status = PACKED '),
                                ConditionalContainer::make([Number::make(' Packed Quantity','packing_quantity')->rules('required','max:50'),
                             ])
                                ->if('status = PACKED '),
                                ConditionalContainer::make([ Number::make(' Shipped Quantity','shipping_quantity')->rules('required','max:50'),
                                DateTime::make('Shipped Date','shipped_date'),
                                Currency::make('Price','price'),
                                BelongsTo::make('Customer Name','customer','App\Nova\Customer')
                                    ])
                                   ->if(' Haulage = true'),                             
            ConditionalContainer::make([  Number::make(' Shipped Quantity','shipping_quantity')->rules('required','max:50'),
                    DateTime::make('Shipped Date','shipped_date'),
                    Currency::make('Price','price'),
                    BelongsTo::make('Customer Name','customer','App\Nova\Customer')
                                    ])
                                   ->if('status = SHIPPED '),
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
