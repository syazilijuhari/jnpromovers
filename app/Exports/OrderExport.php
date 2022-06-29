<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrderExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;

    public function collection()
    {
        return Order::all();
    }

    public function headings(): array
    {
        // TODO: Implement headings() method.
        return ["ID", "Customer Name", "Email", "Phone No", "Package", "Booking Date & Time", "Latitude From", "Longitude From", "Latitude To", "Longitude To", "Address From", "Address To", "Transportation", "Extra Service", "Note", "Photo", "Price", "Created At", "Updated At"];
    }

    public function map($order) : array
    {
        return [$order->order_id, $order->name, $order->email, $order->phone, $order->package, $order->booking_datetime, $order->address_from, $order->address_to, $order->vehicle_type, $order->extra_service, $order->note, $order->price];
    }
}
