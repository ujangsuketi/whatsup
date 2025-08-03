<?php

namespace Modules\Themes\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class Main extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {

        $doWeHaveIconType = request()->get('icon_type');
        if($doWeHaveIconType){
           if($doWeHaveIconType == 'hero'){
           
            $this->setEnvValue('ICON_TYPE', 'hero');
           }else{
            $this->setEnvValue('ICON_TYPE', 'nucleo');
           }
        }

        $doWeHaveTheme = request()->get('theme');
        if($doWeHaveTheme){
            $theme = json_decode(File::get(base_path('modules/Themes/Resources/themes/'.$doWeHaveTheme)), true);
            $css_content = $theme['css_content'];
            fwrite(fopen(base_path('public/byadmin/back.css'), 'w'), str_replace('tagscript', 'script', $css_content));

            
            
        }
      
        //Get all themes
        try {
            $themes = collect(File::files(base_path('modules/Themes/Resources/themes')))->map(function ($file) {
                return json_decode(File::get($file), true);
            });
        } catch (\Exception $e) {
            $themes = collect([]);
            Log::error('Error loading themes: ' . $e->getMessage());
        }

        //In themes, sort that way so the default theme is the first
        $themes = $themes->sortBy(function($theme) {
            return $theme['name'] === 'Default' ? -1 : 1;
        });

        //php artisan view:clear
        Artisan::call('view:clear');

        //php artisan config:clear
        Artisan::call('config:clear');

        //php artisan cache:clear
        Artisan::call('cache:clear');

        if($doWeHaveTheme){
            
            //Redirect back with success message
            return redirect()->back()->with('status', __('Theme :name set successfully. Refresh the page to see the changes. CTRL+R to reload.', ['name' => $theme['name']]));
            
        }

        return view('themes::index', compact('themes'));
    }

    public function reset(){
        //Reset the theme to the default
        fwrite(fopen(base_path('public/byadmin/back.css'), 'w'), str_replace('tagscript', 'script', ''));
        $this->setEnvValue('ICON_TYPE', 'nucleo');
        //php artisan view:clear
        Artisan::call('view:clear');

        //php artisan config:clear
        Artisan::call('config:clear');

        //php artisan cache:clear
        Artisan::call('cache:clear');

        //Return JSON response
        return response()->json(['status' => 'success', 'message' => __('Theme reset to default. Refresh the page to see the changes. CTRL+R to reload.')]);
    }
    

function setEnvValue($key, $value)
{
    $path = base_path('.env');

    if (File::exists($path)) {
        $envContent = File::get($path);
        $keyPattern = "/^{$key}=.*/m";

        if (preg_match($keyPattern, $envContent)) {
            // Replace existing key
            $envContent = preg_replace($keyPattern, "{$key}={$value}", $envContent);
        } else {
            // Add new key
            $envContent .= PHP_EOL . "{$key}={$value}";
        }

        File::put($path, $envContent);

        // Update the runtime environment
        config()->set($key, $value);
        putenv("{$key}={$value}");
    }
}


    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('themes::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('themes::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('themes::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
