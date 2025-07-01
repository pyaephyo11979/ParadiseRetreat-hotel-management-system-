<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;
use Tighten\Ziggy\Ziggy;

use App\Models\Room;
use App\Models\User;
use App\Models\Booking;
use App\Models\Table;
use App\Models\course;
use Illuminate\Support\Facades\Cache;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        $sharedData =[
            ...parent::share($request),
            'auth' => [
                'user' => $request->user(),
            ],
            'ziggy' => fn () => [
                ...(new Ziggy)->toArray(),
                'location' => $request->url(),
            ],
        ];
        if ($request->user()?->access == true) {
            $sharedData["auth"]["permissions"]=
            Cache::remember("permissions_".$request->user()->role_id,now()->addHours(),function() use ($request) {
                return [
                    'room'=>[
                        'view' => $request->user()?->can('viewAny', Room::class),
                        'create' => $request->user()?->can('create', Room::class),
                        'update' => $request->user()?->can('update', Room::class),
                        'delete' => $request->user()?->can('delete', Room::class),
                    ],
                    'booking'=>[
                        'view' => $request->user()?->can('viewAny', Booking::class),
                        'create' => $request->user()?->can('create', Booking::class),
                        'update' => $request->user()?->can('update', Booking::class),
                        'delete' => $request->user()?->can('delete', Booking::class),
                    ],
                    'table'=>[
                        'view' => $request->user()?->can('viewAny', Table::class),
                        'create' => $request->user()?->can('create', Table::class),
                        'update' => $request->user()?->can('update', Table::class),
                        'delete' => $request->user()?->can('delete', Table::class),
                    ],
                    'course'=>[
                        'view' => $request->user()?->can('viewAny', course::class),
                        'create' => $request->user()?->can('create', course::class),
                        'update' => $request->user()?->can('update', course::class),
                        'delete' => $request->user()?->can('delete', course::class),
                    ],
                    "user"=>[
                        'view' => $request->user()?->can('viewAny', User::class),
                        'create' => $request->user()?->can('create', User::class),
                        'update' => $request->user()?->can('update', User::class),
                        'delete' => $request->user()?->can('delete', User::class),
                    ],
                ];
            });
        }
        return $sharedData;
    }
}
