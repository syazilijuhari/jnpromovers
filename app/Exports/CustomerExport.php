<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CustomerExport implements FromQuery,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    public function query()
    {
        return User::query()->where('role', 'customer');
    }

    public function headings(): array
    {
        // TODO: Implement headings() method.
        return ["ID", "Name", "Role", "Phone No", "Email", "Created At", "Updated At"];
    }

    public function map($customer): array
    {
        return [$customer->user_id, $customer->role, $customer->name, $customer->phone, $customer->email];
    }
}
