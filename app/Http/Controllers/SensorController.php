<?php

namespace App\Http\Controllers;

use App\Http\Requests\HistoryRequest;
use App\Http\Requests\SensorRequest;
use App\Services\SensorService;

class SensorController extends Controller
{
    public function store(SensorRequest $request, SensorService $sensorService){
        $sensorService->storeSensor($request->validated());
        return response(['message' => 'Данные записаны'], 201);
    }
    public function history(HistoryRequest $request, SensorService  $sensorService){
        try {
            $history = $sensorService->getHistory(
                $request->sensor_id,
                $request->parameter,
                $request->from,
                $request->to
            );

            return response()->json([
                'sensor_id' => $request->sensor_id,
                'parameter' => $request->parameter,
                'history' => $history
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Ошибка при получении данных'], 500);
        }
    }
}
