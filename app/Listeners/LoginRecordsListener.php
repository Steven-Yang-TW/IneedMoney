<?php

namespace App\Listeners;

use App\Events\UserLoginEvent;
use App\Http\Resources\ErrorResource;
use App\Repositories\UserLoginRecordsRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Jenssegers\Agent\Agent;
use Prettus\Validator\Exceptions\ValidatorException;

class LoginRecordsListener
{
    # 表 UserLoginRecords
    private $userLoginRecordsRepository;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(UserLoginRecordsRepository $userLoginRecordsRepository)
    {
        $this->userLoginRecordsRepository = $userLoginRecordsRepository;
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\UserLoginEvent  $event
     * @return ErrorResource|bool
     */
    public function handle(UserLoginEvent $event)
    {
        $info = $event->info;

        $agent = new Agent();
        $agent->setUserAgent($info['user_agent']);

        $device = '';
        $mobile = '';

        if ($agent->isDesktop()) {
            $device = 'pc';
        } elseif ($agent->isMobile()) {
            $device = 'mobile';
            $mobile = $agent->device();
        }

        $insert = [
            'user_id'     => $info['user_id'],
            'ip'          => $info['ip'],
            'url'         => $info['url'],
            'login_at'    => $info['login_at'],
            'auth_token'  => $info['auth_token'],
            'agent'       => $info['user_agent'] ?? null,
            'device'      => $device,
            'platform'    => $agent->platform() ?: '',
            'browser'     => $agent->browser() ?: '',
            'browser_ver' => $agent->version($agent->browser()) ?: '',
            'mobile'      => $mobile,
        ];

        try {
            $this->userLoginRecordsRepository->create($insert);

            return true;
        } catch (ValidatorException $e) {
            return new ErrorResource($e->getMessage());
        }
    }
}
