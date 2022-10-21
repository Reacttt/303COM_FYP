<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    // Credit Card vs Crypto Monthly Completed Transactions in Past 6 Months
    public function data1()
    {
        $result = array();
        // Calculate the total completed credit card transaction for the past 6 months
        $data = DB::table('payment_details')
            ->where('payment_status', 1)
            ->where('payment_method', "Credit Card")
            ->whereBetween('created_at', [\Carbon\Carbon::now()->subMonth(6), \Carbon\Carbon::now()->now()])
            ->select(
                DB::raw('sum(payment_total_native) as monthly_sales')
            )
            ->orderBy('created_at', 'asc')
            ->groupBy(DB::raw('month(created_at)'))
            ->get();

        $counter = 0;
        foreach ($data as $row) {
            $result[] = array(
                "month" => date('M', strtotime(\Carbon\Carbon::now()->subMonth(5 - $counter))),
                "payment_method" => "Credit Card",
                "month_sales" => $row->monthly_sales
            );
            $counter++;
        }

        // Calculate the total completed crypto transaction for the past 6 months
        $data = DB::table('payment_details')
            ->where('payment_status', 1)
            ->where('payment_method', "Crypto")
            ->whereBetween('created_at', [\Carbon\Carbon::now()->subMonth(6), \Carbon\Carbon::now()->now()])
            ->select(DB::raw('sum(payment_total_native) as monthly_sales'))
            ->orderBy('created_at', 'asc')
            ->groupBy(DB::raw('month(created_at)'))
            ->get();

        $counter = 0;
        foreach ($data as $row) {
            $result[] = array(
                "month" => date('M', strtotime(\Carbon\Carbon::now()->subMonth(5 - $counter))),
                "payment_method" => "Crypto",
                "month_sales" => $row->monthly_sales
            );
            $counter++;
        }

        return view("data", compact('result'));
    }

    // Completed Order in Past 6 Months
    public function data2()
    {
        $result = array();

        $result = DB::table('order')
            ->where('order_status', "Completed")
            ->whereBetween('created_at', [\Carbon\Carbon::now()->subMonth(6), \Carbon\Carbon::now()->now()])
            ->select(DB::raw('count(order_id) as completed'))
            ->orderBy('created_at', 'asc')
            ->groupBy(DB::raw('month(created_at)'))
            ->get();

        // for ($i = 0; $i < 6; $i++) {

        //     $result[] = array(
        //         "month" => date('M', strtotime(\Carbon\Carbon::now()->subMonth(5 - $i))),
        //         "total" => $data[$i],
        //     );
        // }

        return view("data", compact('result'));
    }

    // Total Sales of Each Category
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

        for ($i = 0; $i < sizeof($order_status); $i++) {
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
