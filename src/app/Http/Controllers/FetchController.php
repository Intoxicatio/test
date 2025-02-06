<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Order;
use App\Models\Income;
use App\Models\Sale;
use App\Models\Stock;



class FetchController extends Controller
{
    public function submit(Request $request)
    {
        $type = $request->type;
        $validTypes = ['orders', 'incomes', 'sales', 'stocks'];

        $buildedUrl = $request->url . "/api/$type?" . http_build_query([
            'dateFrom' => $request ->dateFrom,
            'dateTo' => $request->dateTo,
            'page' => $request->page,
            'limit' => $request->limit,
            'key' => $request->key
        ]);

        if (in_array($type,$validTypes))
        {
            return $this->$type($buildedUrl);
        } else {
            return print_r("$type - is wrong type");
        }
    }
    public function orders($httpUrl)
    {
        $response = Http::get($httpUrl);
        if ($response->successful()) {
            $responseData = $response->json();
            $orders = $responseData['data'];
        } else {
            return print_r('Error! Orders were not fetched' . "\n");
        }

        foreach ($orders as $orderData) {
            Order::create(
                [
                    'nm_id' => $orderData['nm_id'],
                    'g_number' => $orderData['g_number'],
                    'date' => $orderData['date'],
                    'last_change_date' => $orderData['last_change_date'],
                    'supplier_article' => $orderData['supplier_article'],
                    'tech_size' => $orderData['tech_size'],
                    'barcode' => $orderData['barcode'],
                    'total_price' => $orderData['total_price'],
                    'discount_percent' => $orderData['discount_percent'],
                    'warehouse_name' => $orderData['warehouse_name'],
                    'oblast' => $orderData['oblast'],
                    'income_id' => $orderData['income_id'],
                    'odid' => $orderData['odid'],
                    'subject' => $orderData['subject'],
                    'category' => $orderData['category'],
                    'brand' => $orderData['brand'],
                    'is_cancel' => $orderData['is_cancel'],
                    'cancel_dt' => $orderData['cancel_dt'],
                ]
            );
        }
        return print_r('Success! Orders were fetched and saved to the database' . "\n");
    }
    public function incomes($httpUrl)
    {
        $response = Http::get($httpUrl);
        if ($response->successful()) {
            $responseData = $response->json();
            $incomes = $responseData['data'];
        } else {
            return print_r('Error! Incomes were not fetched' . "\n");
        }

        foreach ($incomes as $incomeData) {
            Income::create(
                [
                    'nm_id' => $incomeData['nm_id'],
                    'number' => $incomeData['number'],
                    'date' => $incomeData['date'],
                    'last_change_date' => $incomeData['last_change_date'],
                    'supplier_article' => $incomeData['supplier_article'],
                    'tech_size' => $incomeData['tech_size'],
                    'barcode' => $incomeData['barcode'],
                    'quantity' => $incomeData['quantity'],
                    'total_price' => $incomeData['total_price'],
                    'date_close' => $incomeData['date_close'],
                    'warehouse_name' => $incomeData['warehouse_name'],
                    'income_id' => $incomeData['income_id'],
                ]
            );
        }
        return print_r('Success! Incomes were fetched and saved to the database' . "\n");
    }
    public function sales($httpUrl)
    {
        $response = Http::get($httpUrl);
        if ($response->successful()) {
            $responseData = $response->json();
            $sales = $responseData['data'];
        } else {
            return print_r('Error! Sales were not fetched' . "\n");
        }

        foreach ($sales as $saleData) {
            Sale::create(
                [
                    'nm_id' => $saleData['nm_id'],
                    'date' => $saleData['date'],
                    'last_change_date' => $saleData['last_change_date'],
                    'supplier_article' => $saleData['supplier_article'],
                    'tech_size' => $saleData['tech_size'],
                    'barcode' => $saleData['barcode'],
                    'total_price' => $saleData['total_price'],
                    'discount_percent' => $saleData['discount_percent'],
                    'is_supply' => $saleData['is_supply'],
                    'is_realization' => $saleData['is_realization'],
                    'promo_code_discount' => $saleData['promo_code_discount'],
                    'warehouse_name' => $saleData['warehouse_name'],
                    'country_name' => $saleData['country_name'],
                    'oblast_okrug_name' => $saleData['oblast_okrug_name'],
                    'region_name' => $saleData['region_name'],
                    'income_id' => $saleData['income_id'],
                    'sale_id' => $saleData['sale_id'],
                    'odid' => $saleData['odid'],
                    'spp' => $saleData['spp'],
                    'for_pay' => $saleData['for_pay'],
                    'finished_price' => $saleData['finished_price'],
                    'price_with_disc' => $saleData['price_with_disc'],
                    'g_number' => $saleData['g_number'],
                    'subject' => $saleData['subject'],
                    'category' => $saleData['category'],
                    'brand' => $saleData['brand'],
                    'is_storno' => $saleData['is_storno'],
                ]
            );
        }
        return print_r('Success! Sales were fetched and saved to the database' . "\n");
    }
    public function stocks($httpUrl)
    {
        $response = Http::get($httpUrl);
        if ($response->successful()) {
            $responseData = $response->json();
            $stocks = $responseData['data'];
        } else {
            return print_r('Error! Stocks were not fetched' . "\n");
        }

        foreach ($stocks as $stockData) {
            Stock::create(
                [
                    'nm_id' => $stockData['nm_id'],
                    'date' => $stockData['date'],
                    'last_change_date' => $stockData['last_change_date'],
                    'supplier_article' => $stockData['supplier_article'],
                    'tech_size' => $stockData['tech_size'],
                    'barcode' => $stockData['barcode'],
                    'quantity' => $stockData['quantity'],
                    'is_supply' => $stockData['is_supply'],
                    'is_realization' => $stockData['is_realization'],
                    'quantity_full' => $stockData['quantity_full'],
                    'warehouse_name' => $stockData['warehouse_name'],
                    'in_way_to_client' => $stockData['in_way_to_client'],
                    'in_way_from_client' => $stockData['in_way_from_client'],
                    'subject' => $stockData['subject'],
                    'category' => $stockData['category'],
                    'brand' => $stockData['brand'],
                    'sc_code' => $stockData['sc_code'],
                    'price' => $stockData['price'],
                    'discount' => $stockData['discount'],
                ]
            );
        }
        return print_r('Success! Stocks were fetched and saved to the database' . "\n");
    }
}
