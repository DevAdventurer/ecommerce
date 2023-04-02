<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use OpenAI\Laravel\Facades\OpenAI;

class DashboardController extends Controller
{
    public function index(Request $request)
    {


        $sizes = ['S', 'M', 'L'];
        $colors = ['Red', 'Green', 'Blue'];




        $collection = collect($sizes);
 
        $matrix = $collection->crossJoin($colors);
         
        return $matrix->all();


        // foreach($sizes as $size){
        //     foreach($colors as $color){
        //         echo "<p>" . $size . ':' . $color . "</p>";
        //     }
        // }

        return "<br>ok";
        return view('admin.dashboard');
    }
   
    public function chatGPT(Request $request){

        // $title = 'shopify ecommerce';

        // $result = OpenAI::completions()->create([
        //     "model" => "text-davinci-003",
        //     "temperature" => 0.7,
        //     "top_p" => 1,
        //     "frequency_penalty" => 0,
        //     "presence_penalty" => 0,
        //     'max_tokens' => 600,
        //     'prompt' => sprintf('Write article about: %s', 'Mobile App Development short description'),
        // ]);


//         $result = OpenAI::completions()->create([
//     'model' => 'text-davinci-003',
//     'prompt' => 'Mobile App Development short description',
// ]);

//return $result['choices'][0]['text'];

    //     //$client = OpenAI::client(env('OPENAI_API_KEY'));
        
    //     $result = $client->completions()->create([
    //         "model" => "text-davinci-003",
    //         "temperature" => 0.7,
    //         "top_p" => 1,
    //         "frequency_penalty" => 0,
    //         "presence_penalty" => 0,
    //         'max_tokens' => 600,
    //         'prompt' => sprintf('Write article about: %s', $title),
    //     ]);

    // return $content = trim($result['choices'][0]['text']);

        return view('admin.dashboard');
    }

    
    
}
