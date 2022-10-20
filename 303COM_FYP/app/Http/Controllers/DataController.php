<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    // Credit Card vs Crypto Monthly Completed Transactions in Past 6 Months
    public function data1()
    {
        // $query = DB::table('payment_details')
        //     ->whereBetween('created_at', [\Carbon\Carbon::now()->subMonth(6), \Carbon\Carbon::now()->now()])
        //     ->where('payment_status', 1)
        //     ->select('payment_total', 'payment_currency', 'payment_method', 'created_at')
        //     ->get();

        // $data = array();
        // foreach ($query as $row) {
        //     $date = $row->created_at;
        //     $payment_price = 0;
        //         if ($row->payment_currency != "MYR") {
        //             $currency_rate = DB::table('asset')->where('asset_quote', $row->payment_currency)->value('asset_rate');
        //             $payment_price = round(($row->payment_total * $currency_rate), 2);
        //         } else {
        //             $payment_price = $row->payment_total;
        //         }

        //         $data[] = array(
        //             "payment_method" => $row->payment_method,
        //             "payment_currency" => $row->payment_currency,
        //             "payment_total" => $payment_price,
        //             "payment_date" => date('M', strtotime($date))
        //         );
        //     }

        $result = array();
        // Calculate the total completed credit card transaction for the past 6 months
        $data = DB::table('payment_details')
            ->where('payment_status', 1)
            ->where('payment_method', "Credit Card")
            ->select(
                DB::raw('sum(payment_total) as monthly_sales')
            )
            ->orderBy('created_at', 'desc')
            ->groupBy(DB::raw('month(created_at)'))
            ->take(6)
            ->get();

        foreach ($data as $row) {
            $result[] = array(
                "payment_method" => "Credit Card",
                "month_sales" => $row->monthly_sales
            );
        }

        // Calculate the total completed crypto transaction for the past 6 months
        $data = DB::table('payment_details')
            ->where('payment_status', 1)
            ->where('payment_method', "Crypto")
            ->select(DB::raw('sum(payment_total) as monthly_sales'))
            ->orderBy('created_at', 'desc')
            ->groupBy(DB::raw('month(created_at)'))
            ->take(6)
            ->get();

        foreach ($data as $row) {
            $result[] = array(
                "payment_method" => "Crypto",
                "month_sales" => $row->monthly_sales
            );
        }

        return view("data", compact('result'));
    }

    // Total Credit Card vs Crypto Payment Methods (Pie Chart)
    public function data2()
    {
        $result = array();

        $ccard_data = DB::table('payment_details')
            ->where('payment_status', 1)
            ->where('payment_method', 'Credit Card')
            ->sum('payment_total');

        $crypto_data = DB::table('payment_details')
            ->where('payment_status', 1)
            ->where('payment_method', 'Crypto')
            ->sum('payment_total');

        $grandTotal = $ccard_data + $crypto_data;
        $ccardPercent = ($ccard_data / $grandTotal) * 100;
        $cryptoPercent = ($crypto_data / $grandTotal) * 100;

        $result[] = array(
            "payment_method" => "Credit Card",
            "payment_total" => $ccard_data,
            "payment_percentage" => $ccardPercent
        );

        $result[] = array(
            "payment_method" => "Crypto",
            "payment_total" => $crypto_data,
            "payment_percentage" => $cryptoPercent
        );

        return view("data", compact('result'));
    }

    // Total Sales of Each Category (Bar Chart)
    public function data3()
    {
        $data = DB::table('category')
            ->where('category_status', 1)
            ->select('category_id', 'category_name', 'category_sale')
            ->orderBy('category_id', 'asc')
            ->get();

        $result = array();

        foreach ($data as $row) {
            $result[] = array(
                "category_id" => $row->category_id,
                "category_name" => $row->category_name,
                "category_sale" => $row->category_sale
            );
        }

        return view("data", compact('result'));
    }

    // Order Summary
    public function data4()
    {
        $order_status = ["Pending Payment", "Pending Shipment", "Shipped", "Completed", "Cancelled"];
        $result = array();

        for ($i = 0; $i < sizeof($order_status) ; $i++) {
            $data = DB::table('order')
            ->where('order_status', $order_status[$i])
            ->count();

            $result[] = array(
                "order_status" => $order_status[$i],
                "total" => $data,
            );
        }

        return view("data", compact('result'));
    }
}
