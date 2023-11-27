<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrder;
use App\Http\Resources\Order as OrderResource;
use App\Models\Countries;
use App\Models\Offers;
use App\Models\Orders;
use App\Models\product;

class OrderController extends Controller
{
    public function index()
    {
        return OrderResource::collection(Orders::all());
    }

    public function calculate(CreateOrder $request)
    {
        $order = $request->validated();
        $subtotal = 0;
        $total_discount = 0;
        $total_shipping_fees = 0;
        $vat = 0;
        $discount = $shipping_discount = 0;
        $discount_array1 = $discount_array2 = [];
        $output = [];
        $number_of_items = count($order['products']);
        foreach ($order['products'] as $value) {
            $id = $value['id'];
            $qty = $value['quantity'];
            $product = product::find($id);
            $subtotal += $product->price * $qty;
            $country_id = $product->country_id;
            $country = Countries::find($country_id);
            $total_shipping_fees += $country->shipping_rate * ($product->weight * 10) * $qty;
            $vat += (0.14 * $product->price * $qty);
            $output['subtotal'] = round($subtotal, 2);
            $output['shipping fees'] = $total_shipping_fees;
            $output['VAT'] = round($vat, 4);
            $output[''] = $total_shipping_fees;
            $offer_items = Offers::where('status', 'valid')->where('item_id', $id)->first();
            if ($offer_items) {
                $is_min_number_pieces = ($offer_items->min_pieces_purchase != 0) ? true : false;
                if (!$is_min_number_pieces || ($is_min_number_pieces && $number_of_items >= $offer_items->min_pieces_purchase)) {
                    $discount += $product->price * ($offer_items->discount_value / 100);
                    $shipping_discount += ($offer_items->shipping_fees_discount > 0) ? $offer_items->shipping_fees_discount : 0;
                    // $discount_array1 =($offer_items->description).":".-$product->price * ($offer_items->discount_value / 100);
                    array_push($discount_array1, $offer_items->description.':  -$'.$product->price * ($offer_items->discount_value / 100));
                } elseif ($is_min_number_pieces && $offer_items->min_pieces_purchase_type == $product->category_id) {
                    $discount += $product->price * ($offer_items->discount_value / 100);
                    $shipping_discount += ($offer_items->shipping_fees_discount > 0) ? $offer_items->shipping_fees_discount : 0;
                    array_push($discount_array1, $offer_items->description.':    -$'.$product->price * ($offer_items->discount_value / 100));
                }
            }
        }
        $offer_shipping = Offers::where('item_id', 0)->where('min_pieces_purchase', '<=', $number_of_items)->where('min_pieces_purchase', '<>', 0)->first();
        if ($offer_shipping) {
            $shipping_discount += ($offer_shipping->shipping_fees_discount > 0) ? $offer_shipping->shipping_fees_discount : 0;
            array_push($discount_array1, $offer_shipping->description.':   -$'.$offer_shipping->shipping_fees_discount);
        }
        $output['Discount'] = $discount_array1;
        $output['total discount'] = $discount + $shipping_discount;
        $output['total'] = ($subtotal + $vat + $total_shipping_fees) - ($discount + $shipping_discount);

        return $output;
    }
}
