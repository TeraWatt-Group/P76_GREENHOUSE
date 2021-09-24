<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\Settings;
use App\Models\Profiler;

class SettingsController extends Controller
{
    public function index()
    {
        return view('admin.settings.index');
    }

    public function profiler()
    {
        return view('admin.settings.profiler')
            ->withSelect(['true' => __('admin.on'), 'false' => __('admin.off')])
            ->withProfiler(config('settings.profiler') == '1' ? 'true' : 'false')
            ->withStat(Profiler::stat());
    }

    public function profiler_change(Request $request)
    {
        try {
            if($request->profiler === 'true') {
                Settings::store('profiler', true);
                \Artisan::call('env:set APP_DEBUG=true');
            } else {
                Settings::store('profiler', false);
                \Artisan::call('env:set APP_DEBUG=false');
            }

            return redirect()->back()->with('flash.banner', __('Success!'));
        } catch (\Throwable $e) {
            \Log::alert($e->getMessage());
            return redirect()->back()->with(['flash.bannerStyle' => 'danger', 'flash.banner' => $e->getMessage()]);
        }
    }

    public function maintenance_mode()
    {
        $data['current_ip'] = ipBehindProxy();

        $data['maintenances'] = [
            'true' => __('admin.on'),
            'false' => __('admin.off'),
        ];

        $data['maintenance'] = [
            'maintenance_mode' => \App::isDownForMaintenance() ? 'true' : 'false',
            'maintenance_message' => config('settings.maintenance_message'),
            'maintenance_ips' => config('settings.maintenance_ips'),
        ];

        return view('admin.settings.maintenance_mode', ['data' => $data]);
    }

    public function maintenance_mode_chenge(Request $request)
    {
        if ($request->maintenance_mode === 'true') {
            $command = 'down';
            $uuid = \Str::uuid();
            $command .= ' --secret=' . $uuid;

            \Artisan::call($command);

            return redirect('/' . $uuid)->with('flash.banner', __('Success!'));
        } elseif ($request->maintenance_mode === 'false') {
            $command = 'up';

            \Artisan::call($command);

            return redirect()->back()->with('flash.banner', __('Success!'));
        } else {
            $command = 'up';

            \Artisan::call($command);

            return redirect()->back()->with('flash.banner', __('Success!'));
        }
    }

    public function emails()
    {
        $data['engines'] = [
            'smtp' => 'SMTP',
        ];

        $data['emails'] = [
            'mail_engine' => config('settings.mail_engine') !== null ? config('settings.mail_engine') : env('MAIL_DRIVER'),
            'mail_server_name' => config('settings.mail_server_name') !== null ? config('settings.mail_server_name') : env('MAIL_HOST'),
            'mail_server_port' => config('settings.mail_server_port') !== null ? config('settings.mail_server_port') : env('MAIL_PORT'),
            'mail_server_login' => config('settings.mail_server_login') !== null ? config('settings.mail_server_login') : env('MAIL_USERNAME'),
            'mail_server_password' => config('settings.mail_server_password') !== null ? config('settings.mail_server_password') : env('MAIL_PASSWORD'),
            'mail_encription' => config('settings.mail_encription') !== null ? config('settings.mail_encription') : env('MAIL_ENCRYPTION'),
        ];

        // try {
        //     $transport = (new \Swift_SmtpTransport('mail.adm.tools', 465))
        //                        ->setUsername('b2b@rosava.com')
        //                        ->setPassword('FL42neAPd00o')
        //                        ->setEncryption('ssl');

        //     \Mail::setSwiftMailer(new \Swift_Mailer($transport));

        //     \Mail::send('emails.email', $data, function($message) use ($data) {
        //         $message->from('b2b@rosava.com');
        //         $message->to('andrey.zayets@hotmail.com')
        //         ->subject('test');
        //     });

        // } catch (\Swift_TransportException $e) {
        //     dd($e);
        // }

        // if (count(\Mail::failures()) > 0) {
        //     dd(\Mail::failures());
        // } else {
        //     dd('Great! Successfully send in your mail');
        // }

        // $data['emails'] = Settings::

        return view('admin.settings.emails', ['data' => $data]);
    }

    public function change_emails(Request $request)
    {
        $validatedData = $request->validate([
            'mail_engine' => ['required'],
            'mail_server_name' => ['required'],
            'mail_server_port' => ['required'],
            'mail_server_login' => ['required'],
            'mail_server_password' => ['required'],
            'mail_encription' => ['required'],
        ]);

        Settings::store('mail_engine', $request->mail_engine);
        Settings::store('mail_server_name', $request->mail_server_name);
        Settings::store('mail_server_port', $request->mail_server_port);
        Settings::store('mail_server_login', $request->mail_server_login);
        Settings::store('mail_server_password', $request->mail_server_password);
        Settings::store('mail_encription', $request->mail_encription);

        \Artisan::call('env:set MAIL_DRIVER=' . $request->mail_engine);
        \Artisan::call('env:set MAIL_HOST=' . $request->mail_server_name);
        \Artisan::call('env:set MAIL_PORT=' . $request->mail_server_port);
        \Artisan::call('env:set MAIL_USERNAME=' . $request->mail_server_login);
        \Artisan::call('env:set MAIL_PASSWORD=' . $request->mail_server_password);
        \Artisan::call('env:set MAIL_ENCRYPTION=' . $request->mail_encription);
        \Artisan::call('env:set MAIL_FROM_ADDRESS=' . $request->mail_server_login);
        \Artisan::call('env:set MAIL_FROM_NAME=' . '\'ROSAVA\'');

        return redirect()->back()->with('flash.banner', __('Success!'));
    }

    public function check_emails(Request $request)
    {
        try {
             $transport = new \Swift_SmtpTransport(config('settings.mail_server_name'), config('settings.mail_server_port'), 'ssl');
             $transport->setUsername(config('settings.mail_server_login'));
             $transport->setPassword(config('settings.mail_server_password'));
             $mailer = new \Swift_Mailer($transport);
             $mailer->getTransport()->start();
        }
        catch (\Swift_TransportException $e) {
           return redirect()->back()->with(['flash.bannerStyle' => 'danger', 'flash.banner' => $e->getMessage()]);
        }

        return redirect()->back()->with('flash.banner', __('Success!'));
    }
}
