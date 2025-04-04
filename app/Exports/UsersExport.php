<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return User::where('role', 'user')
                 ->select('id', 'name', 'email', 'phone_number', 'created_at')
                 ->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Email',
            'Phone Number',
            'Registration Date'
        ];
    }

    public function map($user): array
    {
        return [
            $user->id,
            $user->name,
            $user->email,
            $user->phone_number ?? 'N/A',
            $user->created_at->format('Y-m-d H:i:s')
        ];
    }


    public function reservations(User $user)
{
    $reservations = $user->reservations()
                        ->with(['field' => function($query) {
                            $query->select('id', 'name', 'sport_type');
                        }])
                        ->select('id', 'field_id', 'start_time', 'end_time', 'total_hours', 'total_price', 'status')
                        ->orderBy('date', 'desc')
                        ->get();
    
    return response()->json($reservations);
}
}