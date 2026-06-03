<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BotController extends Controller
{
    protected $apiUrl;

    public function __construct()
    {
        // Ensure this points to your active Python API service
        $this->apiUrl = env('PYTHON_API_URL', 'http://127.0.0.1:8001');
    }

    // Main Dashboard Loader
    public function index()
    {
        try {
            $response = Http::get($this->apiUrl . '/bots/list');
            $bots = $response->successful() ? json_decode($response->body()) : [];
        } catch (\Exception $e) {
            $bots = [];
        }

        $totalActiveBots = count($bots);
        $totalInteractions = 0;
        
        if (is_array($bots)) {
            foreach ($bots as $botItem) {
                $totalInteractions += $botItem->statistics->conversations ?? 0;
            }
        }

        $bot = !empty($bots) ? $bots[0] : (object) [
            'id' => 'new', 
            'name' => 'No Bots Found', 
            'description' => '', 
            'instructions' => ''
        ];

        return view('dashboard', compact('bots', 'bot', 'totalActiveBots', 'totalInteractions'));
    }

    // Knowledge Base Loader
    public function knowledgeBase($bot_id) 
    {
        $response = Http::get($this->apiUrl . '/bots/' . $bot_id);

        if ($response->successful()) {
            $bot = json_decode($response->body());
        } else {
            $bot = (object) ['id' => $bot_id, 'name' => 'Bot Not Found'];
        }

        return view('knowledge-base', compact('bot'));
    }

    // Bot Configuration
    public function edit($id)
    {
        if ($id === 'new') {
            $bot = (object) ['id' => 'new', 'name' => '', 'description' => '', 'instructions' => ''];
        } else {
            try {
                $response = Http::get($this->apiUrl . '/bots/' . $id);
                $bot = $response->successful() ? json_decode($response->body()) : (object) ['id' => $id, 'name' => 'Error', 'description' => '', 'instructions' => ''];
            } catch (\Exception $e) {
                $bot = (object) ['id' => $id, 'name' => 'Connection Error', 'description' => '', 'instructions' => ''];
            }
        }
        return view('bot-config', compact('bot'));
    }

    public function update(Request $request, $id)
    {
        $response = Http::withHeaders(['Content-Type' => 'application/json'])
                        ->post($this->apiUrl . '/bots/update/' . $id, $request->all());
        return response()->json($response->json());
    }

    public function destroy($id)
    {
        Http::delete($this->apiUrl . '/bots/' . $id);
        return redirect()->route('dashboard')->with('success', 'Bot successfully deleted.');
    }

    // Utility Views
    public function documentation() { return view('documentation'); }
    public function account() { return view('account'); }

    // Test Preview
    public function showPreview($bot_id)
    {
        return view('test-preview', compact('bot_id'));
    }
}