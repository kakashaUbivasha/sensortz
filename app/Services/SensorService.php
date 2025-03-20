<?php

namespace App\Services;

use App\Models\Sensor;
use Illuminate\Support\Collection;
class SensorService
{
    public function getHistory(string $sensorId, string $parameter, ?string $from, ?string $to): Collection
    {
        $query = Sensor::where('sensor_id', $sensorId)
            ->where('parameter', $parameter);

        if ($from) {
            $query->where('created_at', '>=', $from);
        }
        if ($to) {
            $query->where('created_at', '<=', $to);
        }

        return $query->orderBy('created_at', 'asc')->get(['created_at as timestamp', 'value']);
    }
    public function storeSensor(array $data)
    {
        Sensor::create($data);
    }
}
