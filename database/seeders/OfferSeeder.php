<?php

namespace Database\Seeders;

use App\Models\Funeral;
use App\Models\Offer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            Funeral::truncate();
            Offer::truncate();
        });

        Offer::insert(
            [
                [
                    'name' => 'Normal funeral',
                    'description' => "Our Normal Funeral package offers a compassionate and respectful farewell, including transfer of the deceased, private viewing, floral tributes, personalized memorial cards, a dignified procession, cemetery arrangements, and grief counseling. We tailor the service to reflect your loved one's unique life, providing a seamless experience that combines tradition and comfort",
                    'duration' => '01:30:00',
                    'price' => '1500'
                ],
                [
                    'name' => 'Elegant funeral',
                    'description' => "Our Elegant Funeral package creates an atmosphere of grace and sophistication, with exclusive venues, expert guidance, cosmetic preparation, exquisite floral arrangements, custom memorial stationery, luxurious transport, cemetery assistance, and grief counseling. Each detail is meticulously handled, allowing you to cherish your loved one's legacy in a setting of timeless elegance.",
                    'duration' => '01:30:00',
                    'price' => '2100'
                ],
                [
                    'name' => 'Cremation',
                    'description' => "Our Cremation package offers a compassionate and environmentally mindful approach, including private viewing, memorial stationery, eco-friendly cremation services, assistance with urn selection or scattering of ashes, and access to grief counseling. We prioritize sustainability while ensuring a dignified and personal farewell, supporting you through the bereavement journey.",
                    'duration' => '01:30:00',
                    'price' => '1100'
                ],
            ]
        );
    }
}
