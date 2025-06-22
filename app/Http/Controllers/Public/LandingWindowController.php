<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\LandingWindow;

class LandingWindowController extends Controller
{
    public function welcome()
    {
        return $this->renderWindow('welcome', 'public.windows.welcome');
    }

    public function biography()
    {
        return $this->renderWindow('bio', 'public.windows.biography');
    }

    public function slavusworks()
    {
        return $this->renderWindow('slapusworks', 'public.windows.slavusworks');
    }

    public function contact()
    {
        return $this->renderWindow('contact', 'public.windows.contact');
    }

    private function renderWindow(string $type, string $view)
    {
        $window = LandingWindow::where('type', $type)->first();

        if (!$window) {
            abort(404, "Content not found");
        }

        return view($view, [
            'windows' => [
                [
                    'id' => $window->type,
                    'title' => $window->title,
                    'img' => $window->img,
                    'heading' => $window->heading,
                    'subheading' => $window->subheading,
                    'content' => $window->content,
                ]
            ]
        ]);
    }
}
