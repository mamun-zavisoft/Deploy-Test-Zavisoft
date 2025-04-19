<?php

namespace App\Imports;

use App\Models\Hub;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Log;

class HubsImport implements ToModel, WithHeadingRow
{
    private $rowCount = 0;

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        try {
            $this->rowCount++;

            // Skip rows with empty name
            if (empty($row['name'])) {
                return null;
            }
            // Generate custom hub ID if not provided
            $custom_hub_id = !empty($row['hub_id']) ? $row['hub_id'] : 'hub-' . $this->rowCount;

            // Check if hub with this name or custom_hub_id already exists
            $existingHub = Hub::where('name', $row['name'])
                ->orWhere('custom_hub_id', $custom_hub_id)
                ->first();

            if ($existingHub) {
                // Update existing hub
                $existingHub->update([
                    'name' => $row['name'],
                    'address' => $row['address'] ?? null,
                    'phone' => $row['phone'] ?? null,
                    'updated_at' => now(),
                ]);

                return $existingHub;
            }

            // Create new hub
            return new Hub([
                'name' => $row['name'],
                'custom_hub_id' => $custom_hub_id,
                'address' => $row['address'] ?? null,
                'phone' => $row['phone'] ?? null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } catch (\Exception $e) {
            Log::warning("Error processing hub row: " . json_encode($row));
            Log::warning($e->getMessage());
            return null;
        }
    }
}
